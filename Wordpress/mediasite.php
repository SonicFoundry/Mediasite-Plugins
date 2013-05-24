<?php
/*
Plugin Name: Mediasite
Description: Mediasite for Wordpress allows you to easily embed video into your Wordpress pages.  It allows for HTML5 video playback (and all other valid parameters) and allows for displaying secured content.
Author: Justin Helgerson
Version: 1.0
Author URI: http://www.sonicfoundry.com
Plugin URI: http://wordpress.org/extend/plugins/mediasite/

This plugin is released under version 3 of the GPL:
http://www.opensource.org/licenses/gpl-3.0.html

Happy Mediasiting! <3
*/

if (extension_loaded('soap')) {
	require_once('api/edasproxy_client.php');
} else {
	//Need to somehow gracefully alert the user to this missing requirement...
}

//Start a session so that we can store the ticket.
function init_sessions() {
	if (!session_id()) {
		session_start();
	}
}
add_action('init', 'init_sessions');

function mediasite_get_attribute($mediasiteMarkup, $attributeName) {
	$attributeRegex = '/' . $attributeName . '=["]+(\S+)["]+/i';
	
	if (preg_match($attributeRegex, $mediasiteMarkup, $attributeMatch)) {
		return $attributeMatch[1];
	}
	
	return null;
}

function mediasite_get_server_index($server) {
	$pluginOptions = get_option('mediasite_options');

	$key = array_search($server, $pluginOptions);

	if (preg_match('/server([0-9])/i', $key, $matches)) {
		return $matches[1];
	}
	
	return 0;
}

function mediasite_get_username_by_index($index) {
	$pluginOptions = get_option('mediasite_options');
	
	return $pluginOptions['username' . $index . '_template'];
}

function mediasite_get_password_by_index($index) {
	$pluginOptions = get_option('mediasite_options');

	return $pluginOptions['password' . $index . '_template'];
}

function mediasite_build_iframe($server, $id, $width, $height, $parameters) {
	$hasParameterBeenAdded = false;
	
	$iframeMarkup = '<iframe frameborder="0" src="' . $server . '/Mediasite/Play/' . $id;
	
	if (count($parameters) > 0) {
		$queryParameterKeys = array_keys($parameters);
		
		foreach($queryParameterKeys as $key) {
			if (!$hasParameterBeenAdded) {
				$iframeMarkup = $iframeMarkup . '?' . $key . '=' . $parameters[$key];
				$hasParameterBeenAdded = true;
			} else {
				$iframeMarkup = $iframeMarkup . '&' . $key . '=' . $parameters[$key];
			}
		}
	}
	
	if (strlen($_SERVER["QUERY_STRING"]) > 0) {
		if (!$hasParameterBeenAdded) {
			$iframeMarkup = $iframeMarkup . '?' . $_SERVER["QUERY_STRING"];
		} else {
			$iframeMarkup = $iframeMarkup . '&' . $_SERVER["QUERY_STRING"];
		}
	}
	
	$iframeMarkup = $iframeMarkup . '"';
	
	if ($width != null) {
		$iframeMarkup = $iframeMarkup . ' width="' . $width . '"';
	}
	
	if ($height != null) {
		$iframeMarkup = $iframeMarkup . ' height="' . $height . '"';
	}
	
	$iframeMarkup = $iframeMarkup . '></iframe>';
	
	return $iframeMarkup;
}

function mediasite_generate_markup($mediasiteMarkup) {
	$embedParameters = array();
	
	//Load the Mediasite options
	$pluginOptions = get_option('mediasite_options');
	
	//Get the specified id.
	$id = mediasite_get_attribute($mediasiteMarkup, 'id');
	//Get the specified server.
	$server = mediasite_get_attribute($mediasiteMarkup, 'server');
	//Figure out which set of fields we should look at.
	$serverFieldIndex = mediasite_get_server_index($server);
	
	//Check to see if an id and server was specified; if not, there's really no point in doing anything.
	if ($id != null && $server != null && $serverFieldIndex > 0) {
		$auth = mediasite_get_attribute($mediasiteMarkup, 'auth');
		
		if ($auth != null && $auth === 'true') {
			global $current_user;

			//Load the global object of user information
			get_currentuserinfo();
			
			$client = new ExternalAccessClient($server . '/Mediasite/Services60/EdasSixOneSeven.svc?WSDL');
			
			if (!isset($_SESSION['MediasiteAPITicket_' . $server])) {
				$loginResponse = $client->Login(
												mediasite_get_username_by_index($serverFieldIndex),
												mediasite_decrypt(mediasite_get_password_by_index($serverFieldIndex))
				);
				$ticket = $loginResponse->UserTicket;
				$_SESSION['MediasiteAPITicket_' . $server] = $ticket;
			} else {
				$client->Ticket = $_SESSION['MediasiteAPITicket_' . $server];
			}
			
			$authTicketResponse = $client->CreateAuthTicket(null, 60, $id, $current_user->user_email);
			$authTicket = $authTicketResponse->AuthTicketId;
			
			$embedParameters['authTicket'] = $authTicket;
		}
		
		$player = mediasite_get_attribute($mediasiteMarkup, 'player');
		
		if ($player != null) {
			$embedParameters['player'] = $player;
		}
		
		$width = mediasite_get_attribute($mediasiteMarkup, 'width');
		$height = mediasite_get_attribute($mediasiteMarkup, 'height');
		
		return mediasite_build_iframe($server, $id, $width, $height, $embedParameters);
	}
	
	//Just return the original text if there wasn't enough data to work with.
	return $mediasiteMarkup;
}

function mediasite_markup_replace ($text) {
	$embedMarkup;
	$markupRegex = '/\[mediasite .*\]/i';
	
	//Check to see if there is any special Mediasite markup (i.e. [mediasite id="..." ...])
	if (preg_match($markupRegex, $text, $markupMatches)) {
		$mediasiteMarkup = $markupMatches[0];
		
		$iframeMarkup = mediasite_generate_markup($mediasiteMarkup);
			
		//Replace the special markup in the original text with our beautiful iframe.
		$text = str_replace($mediasiteMarkup, $iframeMarkup, $text);
	}
	
	return $text;
}
add_filter('the_content', 'mediasite_markup_replace');

//Register menu item.
function mediasite_admin_menu_setup(){
	add_submenu_page(
		'options-general.php',
		'Mediasite Settings',
		'Mediasite',
		'manage_options',
		'mediasite',
		'mediasite_admin_page_screen'
	);
}
add_action('admin_menu', 'mediasite_admin_menu_setup');

//Display page content
function mediasite_admin_page_screen() {
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	}
	
	global $submenu;
	
	//Access page settings 
	$page_data = array();
	
	foreach($submenu['options-general.php'] as $i => $menu_item) {
		if($submenu['options-general.php'][$i][2] == 'mediasite') {
			$page_data = $submenu['options-general.php'][$i];
		}
	}
	
	//Output
	?>
	<div class="wrap">
		<?php screen_icon();?>
		<h2><?php echo $page_data[3];?></h2>
		<form id="mediasite_options" action="options.php" method="post">
			<?php
			settings_fields('mediasite_options');
			do_settings_sections('mediasite'); 
			submit_button('Save options', 'primary', 'mediasite_options_submit');
			?>
		</form>
	</div>
<?php
}

//Display settings link on plugin screen.
function mediasite_settings_link($actions, $file) {
	if(false !== strpos($file, 'mediasite')) {
		$actions['settings'] = '<a href="options-general.php?page=mediasite">Settings</a>';
	}
	
	return $actions;
}
add_filter('plugin_action_links', 'mediasite_settings_link', 2, 2);

//Register settings.
function mediasite_settings_init(){
	register_setting(
		'mediasite_options',
		'mediasite_options',
		'mediasite_options_validate'
	);

	add_settings_section(
		'mediasite_api1',
		'Mediasite API Configuration - Server #1',
		'mediasite_api1',
		'mediasite'
	);
	
	add_settings_section(
		'mediasite_api2',
		'<br><br>Mediasite API Configuration - Server #2',
		'mediasite_api2',
		'mediasite'
	);

	add_settings_field(
		'mediasite_server1_template',
		'Server',
		'mediasite_server1_field',
		'mediasite',
		'mediasite_api1'
	);
	
	add_settings_field(
		'mediasite_username1_template',
		'Username',
		'mediasite_username1_field',
		'mediasite',
		'mediasite_api1'
	);
	
	add_settings_field(
		'mediasite_password1_template',
		'Password',
		'mediasite_password1_field',
		'mediasite',
		'mediasite_api1'
	);
	
	add_settings_field(
		'mediasite_server2_template',
		'Server',
		'mediasite_server2_field',
		'mediasite',
		'mediasite_api2'
	);
	
	add_settings_field(
		'mediasite_username2_template',
		'Username',
		'mediasite_username2_field',
		'mediasite',
		'mediasite_api2'
	);
	
	add_settings_field(
		'mediasite_password2_template',
		'Password',
		'mediasite_password2_field',
		'mediasite',
		'mediasite_api2'
	);
}
add_action('admin_init', 'mediasite_settings_init');

//Validate input.
function mediasite_options_validate($input){
	global $allowedposttags, $allowedrichhtml;
	
	$arrayKeys = array_keys($input);
	
	foreach($arrayKeys as $fieldName) {
		if (strpos($fieldName, 'server') === 0) {
			$input[$fieldName] = rtrim($input[$fieldName], '//');
		}

		if (strpos($fieldName, 'password') === 0) {
			$input[$fieldName] = openssl_encrypt($input[$fieldName], 'aes-128-cbc', AUTH_SALT);
		}
	}
	
	return $input;
}

//Description.
function mediasite_api1(){
	echo "Enter the server endpoint and optionally the user credentials.";
}

function mediasite_api2(){
	echo "Enter the server endpoint and optionally the user credentials.";
}

//Display existing output.
function mediasite_server1_field() {
	$options = get_option('mediasite_options');
	$server = (isset($options['server1_template'])) ? $options['server1_template'] : '';
	
	?>
 	<input type="text" id="server1_template" name="mediasite_options[server1_template]" value="<?php echo $server;?>" style="width: 250px"> (e.g. http://sofo.mediasite.com)
<?php
}

function mediasite_username1_field() {
	$options = get_option('mediasite_options');
	$username = (isset($options['username1_template'])) ? $options['username1_template'] : '';

	?>
 	<input type="text" id="username1_template" name="mediasite_options[username1_template]" value="<?php echo $username;?>" style="width: 250px">
<?php
}

function mediasite_password1_field() {
	$options = get_option('mediasite_options');
	$password = (isset($options['password1_template'])) ? mediasite_decrypt($options['password1_template']) : '';

	?>
 	<input type="password" id="password1_template" name="mediasite_options[password1_template]" value="<?php echo $password;?>" style="width: 250px"> (aes-128-cbc encrypted)
<?php
}

function mediasite_server2_field() {
	$options = get_option('mediasite_options');
	$server = (isset($options['server2_template'])) ? $options['server2_template'] : '';

	?>
 	<input type="text" id="server2_template" name="mediasite_options[server2_template]" value="<?php echo $server;?>" style="width: 250px">
<?php
}

function mediasite_username2_field() {
	$options = get_option('mediasite_options');
	$username = (isset($options['username2_template'])) ? $options['username2_template'] : '';

	?>
 	<input type="text" id="username2_template" name="mediasite_options[username2_template]" value="<?php echo $username;?>" style="width: 250px">
<?php
}

function mediasite_password2_field() {
	$options = get_option('mediasite_options');
	$password = (isset($options['password2_template'])) ? mediasite_decrypt($options['password2_template']) : '';

	?>
 	<input type="password" id="password2_template" name="mediasite_options[password2_template]" value="<?php echo $password;?>" style="width: 250px">
<?php
}

function mediasite_decrypt($password) {
	return openssl_decrypt($password, 'aes-128-cbc', AUTH_SALT);
}
?>