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
$moduleDirName = basename(__DIR__);

$modversion = [
    'version'             => 1.0,
    'module_status'       => 'Beta 1',
    'release_date'        => '2018/01/19',
    'name'                => MI_CELLAR_NAME,
    'description'         => MI_CELLAR_DESC,
    'release'             => '2018-01-18',
    'author'              => 'XOOPS Development Team',
    'author_mail'         => 'name@site.com',
    'author_website_url'  => 'https://xoops.org',
    'author_website_name' => 'XOOPS Project',
    'credits'             => 'XOOPS Development Team',
    //    'license' => 'GPL 2.0 or later',
    'help'                => 'page=help',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',

    'release_info' => 'release_info',
    'release_file' => XOOPS_URL . "/modules/{$moduleDirName}/docs/release_info file",

    'manual'              => 'Installation.txt',
    'manual_file'         => XOOPS_URL . "/modules/{$moduleDirName}/docs/link to manual file",
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.5'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => $moduleDirName,
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    //About
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    // Admin system menu
    'system_menu'         => 1,
    // Admin things
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // Menu
    'hasMain'             => 1,
    // Scripts to run upon installation or update
    'onInstall'           => 'include/oninstall.php',
    'onUpdate'            => 'include/onupdate.php',
    'onUninstall'         => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'             => ['mysql' => 'sql/mysql.sql'],
    // ------------------- Tables ----------------------------
    'tables'              => [
        $moduleDirName . '_' . 'wine',
    ],
];
// ------------------- Search -----------------------------//
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'cellar_search';
//  ------------------- Comments -----------------------------//
$modversion['hasComments']          = 1;
$modversion['comments']['itemName'] = 'com_id';
$modversion['comments']['pageName'] = 'comments.php';
// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'cellar_com_approve';
$modversion['comments']['callback']['update']  = 'cellar_com_update';
//  ------------------- Templates -----------------------------//
$modversion['templates'][] = ['file' => 'cellar_header.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'cellar_index.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'cellar_wine.tpl', 'description' => ''];

$modversion['templates'][] = ['file' => 'cellar_wine_list.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'cellar_footer.tpl', 'description' => ''];

$modversion['templates'][] = ['file' => 'admin/cellar_admin_about.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'admin/cellar_admin_help.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'admin/cellar_admin_wine.tpl', 'description' => ''];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => MI_CELLAR_OVERVIEW, 'link' => 'page=help'],
    ['name' => MI_CELLAR_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => MI_CELLAR_LICENSE, 'link' => 'page=license'],
    ['name' => MI_CELLAR_SUPPORT, 'link' => 'page=support'],

    //    ['name' => MI_CELLAR_HELP1, 'link' => 'page=help1'],
    //    ['name' => MI_CELLAR_HELP2, 'link' => 'page=help2']
    //    ['name' => MI_CELLAR_HELP3, 'link' => 'page=help3'],
    //    ['name' => MI_CELLAR_HELP4, 'link' => 'page=help4'],
    //    ['name' => MI_CELLAR_HOWTO, 'link' => 'page=__howto'],
    //    ['name' => MI_CELLAR_REQUIREMENTS, 'link' => 'page=__requirements'],
    //    ['name' => MI_CELLAR_CREDITS, 'link' => 'page=__credits'],

];

// ------------------- Blocks -----------------------------//
$modversion['blocks'][] = [
    'file'        => 'wine.php',
    'name'        => MI_CELLAR_WINE_BLOCK,
    'description' => '',
    'show_func'   => 'showCellarWine',
    'edit_func'   => 'editCellarWine',
    'options'     => '|5|25|0',
    'template'    => 'cellar_wine_block.tpl'
];

// ------------------- Config Options -----------------------------//
xoops_load('xoopseditorhandler');
$editorHandler          = \XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'cellarEditorAdmin',
    'title'       => 'MI_CELLAR_EDITOR_ADMIN',
    'description' => 'MI_CELLAR_EDITOR_DESC_ADMIN',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'tinymce'
];

$modversion['config'][] = [
    'name'        => 'cellarEditorUser',
    'title'       => 'MI_CELLAR_EDITOR_USER',
    'description' => 'MI_CELLAR_EDITOR_DESC_USER',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'dhtmltextarea'
];

// -------------- Get groups --------------
/** @var XoopsMemberHandler $memberHandler */
$memberHandler = xoops_getHandler('member');
$xoopsGroups   = $memberHandler->getGroupList();
foreach ($xoopsGroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = [
    'name'        => 'groups',
    'title'       => 'MI_CELLAR_GROUPS',
    'description' => 'MI_CELLAR_GROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $groups,
    'default'     => $groups
];

// -------------- Get Admin groups --------------
$admin_groups = [];
$criteria = new \CriteriaCompo ();
$criteria->add(new \Criteria ('group_type', 'Admin'));
/** @var XoopsMemberHandler $memberHandler */
$memberHandler    = xoops_getHandler('member');
foreach ($memberHandler->getGroupList($criteria) as $key => $adminGroup) {
    $admin_groups[$adminGroup] = $key;
}
$modversion['config'][] = [
    'name'        => 'admin_groups',
    'title'       => 'MI_CELLAR_ADMINGROUPS',
    'description' => 'MI_CELLAR_ADMINGROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $admin_groups,
    'default'     => $admin_groups
];

$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => 'MI_CELLAR_KEYWORDS',
    'description' => 'MI_CELLAR_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'cellar,wine'
];

// --------------Uploads : maxsize of image --------------
$modversion['config'][] = [
    'name'        => 'maxsize',
    'title'       => 'MI_CELLAR_MAXSIZE',
    'description' => 'MI_CELLAR_MAXSIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 5000000
];

// --------------Uploads : mimetypes of image --------------
$modversion['config'][] = [
    'name'        => 'mimetypes',
    'title'       => 'MI_CELLAR_MIMETYPES',
    'description' => 'MI_CELLAR_MIMETYPES_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => [
        'bmp'   => 'image/bmp',
        'gif'   => 'image/gif',
        'pjpeg' => 'image/pjpeg',
        'jpeg'  => 'image/jpeg',
        'jpg'   => 'image/jpg',
        'jpe'   => 'image/jpe',
        'png'   => 'image/png'
    ]
];

$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => 'MI_CELLAR_ADMINPAGER',
    'description' => 'MI_CELLAR_ADMINPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'userpager',
    'title'       => 'MI_CELLAR_USERPAGER',
    'description' => 'MI_CELLAR_USERPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'advertise',
    'title'       => 'MI_CELLAR_ADVERTISE',
    'description' => 'MI_CELLAR_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
];

$modversion['config'][] = [
    'name'        => 'bookmarks',
    'title'       => 'MI_CELLAR_BOOKMARKS',
    'description' => 'MI_CELLAR_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'fbcomments',
    'title'       => 'MI_CELLAR_FBCOMMENTS',
    'description' => 'MI_CELLAR_FBCOMMENTS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

// -------------- Notifications cellar --------------
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'cellar_notify_iteminfo';

$modversion['notification']['category'][] = [
    'name'           => 'global',
    'title'          => MI_CELLAR_GLOBAL_NOTIFY,
    'description'    => MI_CELLAR_GLOBAL_NOTIFY_DESC,
    'subscribe_from' => ['index.php', 'viewcat.php', 'singlefile.php']
];

$modversion['notification']['category'][] = [
    'name'           => 'category',
    'title'          => MI_CELLAR_CATEGORY_NOTIFY,
    'description'    => MI_CELLAR_CATEGORY_NOTIFY_DESC,
    'subscribe_from' => ['viewcat.php', 'singlefile.php'],
    'item_name'      => 'cid',
    'allow_bookmark' => 1
];

$modversion['notification']['category'][] = [
    'name'           => 'file',
    'title'          => MI_CELLAR_FILE_NOTIFY,
    'description'    => MI_CELLAR_FILE_NOTIFY_DESC,
    'subscribe_from' => 'singlefile.php',
    'item_name'      => 'lid',
    'allow_bookmark' => 1
];

$modversion['notification']['event'][] = [
    'name'          => 'new_category',
    'category'      => 'global',
    'title'         => MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY,
    'caption'       => MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY_DESC,
    'mail_template' => 'global_newcategory_notify',
    'mail_subject'  => MI_CELLAR_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_modify',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY,
    'caption'       => MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY_DESC,
    'mail_template' => 'global_filemodify_notify',
    'mail_subject'  => MI_CELLAR_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_broken',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY,
    'caption'       => MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY_DESC,
    'mail_template' => 'global_filebroken_notify',
    'mail_subject'  => MI_CELLAR_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_submit',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY,
    'caption'       => MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'global_filesubmit_notify',
    'mail_subject'  => MI_CELLAR_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'new_file',
    'category'      => 'global',
    'title'         => MI_CELLAR_GLOBAL_NEWFILE_NOTIFY,
    'caption'       => MI_CELLAR_GLOBAL_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_GLOBAL_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'global_newfile_notify',
    'mail_subject'  => MI_CELLAR_GLOBAL_NEWFILE_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_submit',
    'category'      => 'category',
    'admin_only'    => 1,
    'title'         => MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY,
    'caption'       => MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'category_filesubmit_notify',
    'mail_subject'  => MI_CELLAR_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'new_file',
    'category'      => 'category',
    'title'         => MI_CELLAR_CATEGORY_NEWFILE_NOTIFY,
    'caption'       => MI_CELLAR_CATEGORY_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_CATEGORY_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'category_newfile_notify',
    'mail_subject'  => MI_CELLAR_CATEGORY_NEWFILE_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'approve',
    'category'      => 'file',
    'admin_only'    => 1,
    'title'         => MI_CELLAR_FILE_APPROVE_NOTIFY,
    'caption'       => MI_CELLAR_FILE_APPROVE_NOTIFY_CAPTION,
    'description'   => MI_CELLAR_FILE_APPROVE_NOTIFY_DESC,
    'mail_template' => 'file_approve_notify',
    'mail_subject'  => MI_CELLAR_FILE_APPROVE_NOTIFY_SUBJECT
];
