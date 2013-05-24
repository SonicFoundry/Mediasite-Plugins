<?php

    /**
     * Proxy classes for Mediasite External Data Access Service (Edas)
     * These proxy classes were generated based on the Mediasite 6.0 EDAS WSDL definition.
     * PHP Version 5.3
     *
     * @copyright  Copyright (c) 2013, Sonic Foundry
     * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
     * @version    6.1.7
     * @package    SonicFoundry.Mediasite.Edas.PHPProxy
     * @subpackage Functions
     * @author     Cori Schlegel <coris@sonicfoundry.com>
     *             This software is provided "AS IS" without a warranty of any kind.
     * @since      6.1.1
     */
    class TypeMapFunctions
    {
        /*  Namespaces from Mediasite WSDL */
        static $tns = "http://www.SonicFoundry.com/Mediasite/Services60/Messages";
        static $q5 = "http://schemas.microsoft.com/2003/10/Serialization/Arrays";
        static $i = "http://www.w3.org/2001/XMLSchema-instance";

        static function hoistDatesWatchedList( $list ) {
            return self::hoistArrayOfType($list, 'dateTime');
        }

        static function hoistArrayOfIdNameTotalPair( $array ) {
            return self::hoistArrayOfType($array, 'ActiveConnection');
        }

        static function hoistArrayOfPresentationUsage( $array ) {
            return self::hoistArrayOfType($array, 'ActiveConnection');
        }

        static function hoistArrayOfActiveConnection( $array ) {
            return self::hoistArrayOfType($array, 'ActiveConnection');
        }

        static function hoistArrayOfFolderDetails( $array ) {
            return self::hoistArrayOfType($array, 'FolderDetails');
        }

        static function hoistArrayOfPresentationDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'PresentationDetails');
        }

        static function hoistArrayOfUserProfileMappings( $obj ) {
            return self::hoistArrayOfType($obj, 'UserProfileMapping');
        }

        static function hoistCreateMediasiteKeyValueResponseId( $obj ) {
            return self::hoistType($obj, "Id");
        }

        static function hoistArrayOfPresentationTemplateDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'PresentationTemplateDetails');
        }

        static function hoistArrayOfString( $obj ) {
            return self::hoistArrayOfType($obj, 'string', self::$q5);
        }

        static function hoistArrayOfMediasiteKeyValue( $obj ) {
            return self::hoistArrayOfType($obj, 'MediasiteKeyValue');
        }

        static function hoistArrayOfContentEncodingSettingDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'ContentEncodingSettingDetails');
        }

        static function hoistArrayOfMediasiteTimeZone( $obj ) {
            return self::hoistArrayOfType($obj, 'MediasiteTimeZone');
        }

        static function hoistArrayOfScheduleDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'ScheduleDetails');
        }

        static function hoistArrayOfScheduleRecurrenceDetails( $obj ) {
            print( "hoisting ArrayOfScheduleRecurrenceDetails\n" );

            return self::hoistArrayOfType($obj, 'ScheduleRecurrenceDetails');
        }

        static function hoistArrayOfCatalogShare( $obj ) {
            return self::hoistArrayOfType($obj, 'CatalogShare');
        }

        static function hoistScheduleRecurrenceDetails( $obj ) {
            return self::hoistType($obj, 'RecurrenceList');
        }

        static function hoistArrayOfMediasiteRoleDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'MediasiteRoleDetails');
        }

        static function hoistArrayOfChapterDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'ChapterDetails');
        }

        static function hoistArrayOfPresenterDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'PresenterDetails');
        }

        static function hoistArrayOfContentServerDetails( $obj ) {
            //TODO: to hoist content server endpoints to the ServerConnection level, I'm going to have to manhandle some
            //    xml here and add them back to the Content Server.
            $contentServers = self::hoistArrayOfType($obj, 'ContentServerDetails');

            return $contentServers;
        }

        static function hoistArrayOfContentServerEndpoint( $obj ) {
            return self::hoistArrayOfType($obj, 'ContentServerEndpoint');
        }

        static function hoistArrayOfPlayerDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'PlayerDetails');
        }

        static function hoistArrayOfResourcePermissionEntry( $obj ) {
            return self::hoistArrayOfType($obj, 'ResourcePermissionEntry');
        }

        static function hoistArrayOfResourcePermissions( $obj ) {
            return self::hoistArrayOfType($obj, 'ResourcePermissions');
        }

        static function hoistArrayOfSlideDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'SlideDetails');
        }

        static function hoistArrayOfArrayOfPresentationTemplateDetails( $obj ) {
            return self::hoistArrayOfType($obj, 'ArrayOfPresentationTemplateDetails');
        }

        /**
         * Hoists objects out of Arrayof* types into php arrays
         *
         * @param      $obj
         * @param      $innerType
         * @param null $ns
         *
         * @return array
         */
        protected static function hoistArrayOfType( $obj, $innerType, $ns = null ) {
            if ( is_null($ns) ) {
                $ns = self::$tns;
            }

            $sxe      = simplexml_load_string($obj, null, LIBXML_NOBLANKS | LIBXML_NOENT, $ns);
            $ar       = Array();
            $xmlArray = $sxe->children($ns);
            foreach ( $xmlArray->$innerType as $key => $val ) {

                //  remove nodes where the nil attribute is true; otherwise they end up in the output as empty stdClass objects
                $nodesToUnset = array();
                foreach ( $val as $name => $el ) {
                    $iatts = $el->attributes(self::$i);
                    if ( $iatts['nil'] ) {
                        array_push($nodesToUnset, $name);
                    }
                }
                foreach ( $nodesToUnset as $node ) {
                    unset( $val->$node );
                }

                if ( $innerType == 'string' ) {
                    $ar[] = (string)$val;
                } else {
                    $ar[] = self::objectToObject($val, $innerType);
                }
            }

            return $ar;
        }

        /**
         * @param      $obj
         * @param      $innerType
         * @param null $ns
         *
         * @return mixed
         */
        protected static function hoistType( $obj, $innerType, $ns = null ) {
            if ( is_null($ns) ) {
                $ns = self::$tns;
            }
            $sxe = simplexml_load_string($obj);
            $xml = $sxe->children($ns);

            return self::objectify($xml);
        }

        /**
         * @param $val
         *
         * @return mixed
         */
        protected static function objectify( $val ) {
            return json_decode(json_encode($val));
        }

        /**
         * Translates a stdClass Object to the specified type
         *
         * @param $instance
         * @param $className
         *
         * @return mixed
         */
        static function objectToObject( $instance, $className ) {
            $newInstance = ( json_decode(json_encode($instance)) );

            return unserialize(sprintf(
                'O:%d:"%s"%s',
                strlen($className),
                $className,
                strstr(strstr(serialize($newInstance), '"'), ':')
            ));
        }

    }