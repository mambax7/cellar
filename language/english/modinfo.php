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
// Admin
define('MI_CELLAR_NAME', 'Cellar');
define('MI_CELLAR_DESC', 'This module is for doing following...');
//Menu
define('MI_CELLAR_ADMENU1', 'Home');
define('MI_CELLAR_ADMENU2', 'Wine');
define('MI_CELLAR_ADMENU3', 'Permissions');
define('MI_CELLAR_ADMENU4', 'About');
//Blocks
define('MI_CELLAR_WINE_BLOCK', 'Wine block');
//Config
define('MI_CELLAR_EDITOR_ADMIN', 'Editor: Admin');
define('MI_CELLAR_EDITOR_ADMIN_DESC', 'Select the Editor to use by the Admin');
define('MI_CELLAR_EDITOR_USER', 'Editor: User');
define('MI_CELLAR_EDITOR_USER_DESC', 'Select the Editor to use by the User');
define('MI_CELLAR_KEYWORDS', 'Keywords');
define('MI_CELLAR_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
define('MI_CELLAR_ADMINPAGER', 'Admin: records / page');
define('MI_CELLAR_ADMINPAGER_DESC', 'Admin: # of records shown per page');
define('MI_CELLAR_USERPAGER', 'User: records / page');
define('MI_CELLAR_USERPAGER_DESC', 'User: # of records shown per page');
define('MI_CELLAR_MAXSIZE', 'Max size');
define('MI_CELLAR_MAXSIZE_DESC', 'Set a number of max size uploads file in byte');
define('MI_CELLAR_MIMETYPES', 'Mime Types');
define('MI_CELLAR_MIMETYPES_DESC', 'Set the mime types selected');
define('MI_CELLAR_IDPAYPAL', 'Paypal ID');
define('MI_CELLAR_IDPAYPAL_DESC', 'Insert here your PayPal ID for donactions.');
define('MI_CELLAR_ADVERTISE', 'Advertisement Code');
define('MI_CELLAR_ADVERTISE_DESC', 'Insert here the advertisement code');
define('MI_CELLAR_BOOKMARKS', 'Social Bookmarks');
define('MI_CELLAR_BOOKMARKS_DESC', 'Show Social Bookmarks in the form');
define('MI_CELLAR_FBCOMMENTS', 'Facebook comments');
define('MI_CELLAR_FBCOMMENTS_DESC', 'Allow Facebook comments in the form');
// Notifications
define('MI_CELLAR_GLOBAL_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_FILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_FILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_GLOBAL_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_CATEGORY_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_CELLAR_FILE_APPROVE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_CELLAR_FILE_APPROVE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_CELLAR_FILE_APPROVE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_CELLAR_FILE_APPROVE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');

// Help
define('MI_CELLAR_DIRNAME', basename(dirname(dirname(__DIR__))));
define('MI_CELLAR_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('MI_CELLAR_BACK_2_ADMIN', 'Back to Administration of ');
define('MI_CELLAR_OVERVIEW', 'Overview');
// The name of this module
//define('MI_CELLAR_NAME', 'YYYYY Module Name');

//define('MI_CELLAR_HELP_DIR', __DIR__);

//help multi-page
define('MI_CELLAR_DISCLAIMER', 'Disclaimer');
define('MI_CELLAR_LICENSE', 'License');
define('MI_CELLAR_SUPPORT', 'Support');
//define('MI_CELLAR_REQUIREMENTS', 'Requirements');
//define('MI_CELLAR_CREDITS', 'Credits');
//define('MI_CELLAR_HOWTO', 'How To');
//define('MI_CELLAR_UPDATE', 'Update');
//define('MI_CELLAR_INSTALL', 'Install');
//define('MI_CELLAR_HISTORY', 'History');
//define('MI_CELLAR_HELP1', 'YYYYY');
//define('MI_CELLAR_HELP2', 'YYYYY');
//define('MI_CELLAR_HELP3', 'YYYYY');
//define('MI_CELLAR_HELP4', 'YYYYY');
//define('MI_CELLAR_HELP5', 'YYYYY');
//define('MI_CELLAR_HELP6', 'YYYYY');

// Permissions Groups
define('MI_CELLAR_GROUPS', 'Groups access');
define('MI_CELLAR_GROUPS_DESC', 'Select general access permission for groups.');
define('MI_CELLAR_ADMINGROUPS', 'Admin Group Permissions');
define('MI_CELLAR_ADMINGROUPS_DESC', 'Which groups have access to tools and permissions page');
