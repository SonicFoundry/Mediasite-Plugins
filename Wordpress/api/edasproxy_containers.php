<?php

    /**
     * Proxy classes for Mediasite External Data Access Service (Edas)
     * These proxy classes were generated based on the Mediasite 6.0 EDAS WSDL definition.
     * These classes are required to wrap the request messages for interaction with the Edas SOAP service
     * PHP Version 5.3
     *
     * @copyright  Copyright (c) 2013, Sonic Foundry
     * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
     * @version    6.1.7
     * @package    SonicFoundry.Mediasite.Edas.PHPProxy
     * @subpackage Containers
     * @see        edasproxy.php
     * @author     Cori Schlegel <coris@sonicfoundry.com>
     *             This software is provided "AS IS" without a warranty of any kind.

     */

    /**
     * All container classes extend EdasContainer, which implements the only required members
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
    @abstract
     * @since   6.0
     */
    abstract class EdasContainer
    {

        /**
         * @var mixed class-specific request object
         */
        public $request;

        /**
         * @param $request
         */
        function __construct( $request ) {
            $this->request = $request;
        }

    }

    /**
     * Generated data proxy class for struct CreateRole
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreateRole extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct UpdateRole
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class UpdateRole extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryTotalViews
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryTotalViews extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryDatesWatched
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryDatesWatched extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPlatformUsage
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPlatformUsage extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryTotalViewsById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryTotalViewsById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPresentationUsage
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPresentationUsage extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryServerUsage
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryServerUsage extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryActiveConnections
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryActiveConnections extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryActivePresentations
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryActivePresentations extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryActivePresentationConnections
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryActivePresentationConnections extends EdasContainer
    {

    }

    /**
     * Proxy class for struct CreateAuthTicket
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreateAuthTicket extends EdasContainer
    {

    }

    /**
     * Proxy class for struct CreateSubFolder
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreateSubFolder extends EdasContainer
    {

    }

    /**
     * Proxy class for struct CreateSubFolder
     */

    /**
     * Generated data proxy class for struct CreateIdentityTicket
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreateIdentityTicket extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreatePresentationFromTemplate
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreatePresentationFromTemplate extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreatePresentationFromSchedule
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreatePresentationFromSchedule extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreatePresentationLike
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreatePresentationLike extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreatePresentationPoll
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreatePresentationPoll extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreateScheduleFromTemplate
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreateScheduleFromTemplate extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct GetVersion
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class GetVersion extends EdasContainer
    {

    }

    /**
     * Proxy class for struct Login
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class Login extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct Logout
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class Logout extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryAuthTicketProperties
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryAuthTicketProperties extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryCatalogShares
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryCatalogShares extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryChapterPoints
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryChapterPoints extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryClientIpAddress
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryClientIpAddress extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryContentServersByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryContentServersByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryFoldersById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryFoldersById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryFoldersWithPresentations
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryFoldersWithPresentations extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryIdentityTicketProperties
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryIdentityTicketProperties extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryContentEncodingSettingsById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryContentEncodingSettingsById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryContentEncodingSettingsByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryContentEncodingSettingsByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPlayers
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPlayers extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPresentationsById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPresentationsById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPresentationsByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPresentationsByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPresentationTemplatesByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPresentationTemplatesByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPresentersByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPresentersByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryPresentersById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryPresentersById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryResourcePermissionList
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryResourcePermissionList extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryResourcePermissions
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryResourcePermissions extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QuerySchedulesByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QuerySchedulesByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QuerySiteProperties
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QuerySiteProperties extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QuerySlides
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QuerySlides extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QuerySubFolderDetails
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QuerySubFolderDetails extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryTimeZonesByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryTimeZonesByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct RemoveAuthTicket
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class RemoveAuthTicket extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct RemoveIdentityTicket
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class RemoveIdentityTicket extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct Test
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class Test extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct Search
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class Search extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct UpdateSchedule
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class UpdateSchedule extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct UpdatePresentationDetails
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class UpdatePresentationDetails extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryRolesById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryRolesById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryRolesByCriteria
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryRolesByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteRole
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeleteRole extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteCatalog
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeleteCatalog extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteSchedule
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeleteSchedule extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeletePresentation
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeletePresentation extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeletePlayer
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeletePlayer extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeletePresentationTemplate
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeletePresentationTemplate extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeletePodcast
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeletePodcast extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteMediaImportProject
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeleteMediaImportProject extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteContentEnciodingSettings
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeleteContentEncodingSettings extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteContentServer
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class DeleteContentServer extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct DeleteFolder
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class DeleteFolder extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryCatalogsById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class QueryCatalogsById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreateCatalogFromFolder
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreateCatalogFromFolder extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreatePlayerLike
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class CreatePlayerLike extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct UpdateResourcePermissions
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class UpdateResourcePermissions extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreateUserProfiles
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class CreateUserProfiles extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreateUserProfilesFromEmails
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class CreateUserProfilesFromEmails extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryUserProfilesById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class QueryUserProfilesById extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryUserProfilesByEmailAddress
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class QueryUserProfilesByCriteria extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct UpdateUserProfiles
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class UpdateUserProfiles extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CheckJobStatus
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class CheckJobStatus extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct AddTagToMediasiteObject
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class AddTagToMediasiteObject extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryTagsByMediasiteId
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class QueryTagsByMediasiteId extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct QueryTagsByMediasiteId
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.0
     */
    class RemoveTagFromMediasiteObject extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreateTemplateLike
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class CreateTemplateLike extends EdasContainer
    {

    }

    /**
     * Generated data proxy class for struct CreateMediasiteKeyValue
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class CreateMediasiteKeyValue extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct QueryMediasiteKeyValuesById
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class QueryMediasiteKeyValuesById extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct QueryMediasiteKeyValuesByIdAndKey
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class QueryMediasiteKeyValuesByIdAndKey extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct QueryMediasiteKeyValuesByKeyValue
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class QueryMediasiteKeyValuesByKeyValue extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct DeleteMediasiteKeyValueByIdAndKey
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class DeleteMediasiteKeyValueByIdAndKey extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct DeleteMediasiteKeyValueByKeyValue
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class DeleteMediasiteKeyValueByKeyValue extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct UpdateMediasiteKeyValueByIdsAndKey
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class UpdateMediasiteKeyValueByIdsAndKey extends EdasContainer
    {
    }

    /**
     * Generated data proxy class for struct UpdatePlayer
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.1
     */
    class UpdatePlayer extends EdasContainer
    {
    }

    /**
     * Data proxy class for struct RefreshReportData
     *
     * @package SonicFoundry.Mediasite.Edas.PHPProxy
     * @since   6.1.7
     */
    class RefreshReportData extends EdasContainer
    {
    }
