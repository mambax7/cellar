<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Module: cellar
 *
 * @category        Module
 * @package         cellar
 * @author          XOOPS Development Team <name@site.com> - <https://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

use Xmf\Request;

//Index
define('AM_CELLAR_STATISTICS', 'Cellar statistics');
define('AM_CELLAR_THEREARE_WINE', "There are <span class='bold'>%s</span> Wine in the database");
//Buttons
define('AM_CELLAR_ADD_WINE', 'Add new Wine');
define('AM_CELLAR_WINE_LIST', 'List of Wine');
//General
define('AM_CELLAR_FORMOK', 'Registered successfull');
define('AM_CELLAR_FORMDELOK', 'Deleted successfull');
define('AM_CELLAR_FORMSUREDEL', "Are you sure to Delete: <span class='bold red'>%s</span></b>");
define('AM_CELLAR_FORMSURERENEW', "Are you sure to Renew: <span class='bold red'>%s</span></b>");
define('AM_CELLAR_FORMUPLOAD', 'Upload');
define('AM_CELLAR_FORMIMAGE_PATH', 'File presents in %s');
define('AM_CELLAR_FORM_ACTION', 'Action');
define('AM_CELLAR_SELECT', 'Select action for selected item(s)');
define('AM_CELLAR_SELECTED_DELETE', 'Delete selected item(s)');
define('AM_CELLAR_SELECTED_ACTIVATE', 'Activate selected item(s)');
define('AM_CELLAR_SELECTED_DEACTIVATE', 'De-activate selected item(s)');
define('AM_CELLAR_SELECTED_ERROR', 'You selected nothing to delete');
define('AM_CELLAR_CLONED_OK', 'Record cloned successfully');
define('AM_CELLAR_CLONED_FAILED', 'Cloning of the record has failed');

// Wine
define('AM_CELLAR_WINE_ADD', 'Add a wine');
define('AM_CELLAR_WINE_EDIT', 'Edit wine');
define('AM_CELLAR_WINE_DELETE', 'Delete wine');
define('AM_CELLAR_WINE_ID', 'ID');
define('AM_CELLAR_WINE_NAME', 'Name');
define('AM_CELLAR_WINE_YEAR', 'Year');
define('AM_CELLAR_WINE_GRAPES', 'Grapes');
define('AM_CELLAR_WINE_COUNTRY', 'Country');
define('AM_CELLAR_WINE_REGION', 'Region');
define('AM_CELLAR_WINE_DESCRIPTION', 'Description');
define('AM_CELLAR_WINE_PICTURE', 'Picture');
//Blocks.php
//Permissions
define('AM_CELLAR_PERMISSIONS_GLOBAL', 'Global permissions');
define('AM_CELLAR_PERMISSIONS_GLOBAL_DESC', 'Only users in the group that you select may global this');
define('AM_CELLAR_PERMISSIONS_GLOBAL_4', 'Rate from user');
define('AM_CELLAR_PERMISSIONS_GLOBAL_8', 'Submit from user side');
define('AM_CELLAR_PERMISSIONS_GLOBAL_16', 'Auto approve');
define('AM_CELLAR_PERMISSIONS_APPROVE', 'Permissions to approve');
define('AM_CELLAR_PERMISSIONS_APPROVE_DESC', 'Only users in the group that you select may approve this');
define('AM_CELLAR_PERMISSIONS_VIEW', 'Permissions to view');
define('AM_CELLAR_PERMISSIONS_VIEW_DESC', 'Only users in the group that you select may view this');
define('AM_CELLAR_PERMISSIONS_SUBMIT', 'Permissions to submit');
define('AM_CELLAR_PERMISSIONS_SUBMIT_DESC', 'Only users in the group that you select may submit this');
define('AM_CELLAR_PERMISSIONS_GPERMUPDATED', 'Permissions have been changed successfully');
define('AM_CELLAR_PERMISSIONS_NOPERMSSET', 'Permission cannot be set: No wine created yet! Please create a wine first.');

//Errors
define('AM_CELLAR_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
define('AM_CELLAR_UPGRADEFAILED1', "Update failed - couldn't add new fields");
define('AM_CELLAR_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
define('AM_CELLAR_ERROR_COLUMN', 'Could not create column in database : %s');
define('AM_CELLAR_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
define('AM_CELLAR_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
define('AM_CELLAR_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');
//directories
define('AM_CELLAR_AVAILABLE', "<span style='color : green;'>Available. </span>");
define('AM_CELLAR_NOTAVAILABLE', "<span style='color : red;'>is not available. </span>");
define('AM_CELLAR_NOTWRITABLE', "<span style='color : red;'>" . ' should have permission ( %1$d ), but it has ( %2$d )' . '</span>');
define('AM_CELLAR_CREATETHEDIR', 'Create it');
define('AM_CELLAR_SETMPERM', 'Set the permission');
define('AM_CELLAR_DIRCREATED', 'The directory has been created');
define('AM_CELLAR_DIRNOTCREATED', 'The directory can not be created');
define('AM_CELLAR_PERMSET', 'The permission has been set');
define('AM_CELLAR_PERMNOTSET', 'The permission can not be set');
define('AM_CELLAR_VIDEO_EXPIREWARNING', 'The publishing date is after expiration date!!!');
//Sample Data
define('AM_CELLAR_ADD_SAMPLEDATA', 'Import Sample Data (will delete ALL current data)');
define('AM_CELLAR_SAMPLEDATA_SUCCESS', 'Sample Date uploaded successfully');

//Error NoFrameworks
define('_AM_ERROR_NOFRAMEWORKS', 'Error: You don&#39;t use the Frameworks \'admin module\'. Please install this Frameworks');
define('AM_CELLAR_MAINTAINEDBY', 'is maintained by the');
