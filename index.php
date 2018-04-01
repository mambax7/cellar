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

use XoopsModules\Cellar;

$GLOBALS['xoopsOption']['template_main'] = 'cellar_index.tpl';
require_once __DIR__ . '/header.php';
require_once XOOPS_ROOT_PATH . '/header.php';
require_once __DIR__ . '/include/config.php';
// Define Stylesheet
/** @var \xos_opal_Theme $xoTheme */
$xoTheme->addStylesheet($stylesheet);
// keywords
$utility::meta_keywords($helper->getConfig('keywords'));
// description
$utility::meta_description(MD_CELLAR_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', CELLAR_URL . '/index.php');
$GLOBALS['xoopsTpl']->assign('cellar_url', CELLAR_URL);
$GLOBALS['xoopsTpl']->assign('adv', $helper->getConfig('advertise'));
//
$GLOBALS['xoopsTpl']->assign('bookmarks', $helper->getConfig('bookmarks'));
$GLOBALS['xoopsTpl']->assign('fbcomments', $helper->getConfig('fbcomments'));
//
$GLOBALS['xoopsTpl']->assign('admin', CELLAR_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
require_once XOOPS_ROOT_PATH . '/footer.php';
