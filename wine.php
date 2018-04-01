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
use XoopsModules\Cellar;

$GLOBALS['xoopsOption']['template_main'] = 'cellar_wine_list.tpl';
require_once __DIR__ . '/header.php';
$start = Request::getInt('start', 0);
// Define Stylesheet

/** @var \xos_opal_Theme $xoTheme */
$xoTheme->addStylesheet($stylesheet);

$db = \XoopsDatabaseFactory::getDatabaseConnection();

// Get Handler
/** @var \XoopsPersistableObjectHandler $wineHandler */
$wineHandler = new Cellar\WineHandler($db);

$winePaginationLimit = $helper->getConfig('userpager');

$criteria = new \CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($winePaginationLimit);
$criteria->setStart($start);

$wineCount = $wineHandler->getCount($criteria);
$wineArray = $wineHandler->getAll($criteria);

$op = Request::getCmd('op', '');
$id = Request::getInt('id', 0, 'GET');

switch ($op) {
    case 'view':
        //        viewItem();
        $GLOBALS['xoopsOption']['template_main'] = 'cellar_wine.tpl';
        $winePaginationLimit                     = 1;
        $myid                                    = $id;
        //id
        $wineObject = $wineHandler->get($myid);

        $criteria = new \CriteriaCompo();
        $criteria->setSort('id');
        $criteria->setOrder('DESC');
        $criteria->setLimit($winePaginationLimit);
        $criteria->setStart($start);
        $wine['id']          = $wineObject->getVar('id');
        $wine['name']        = $wineObject->getVar('name');
        $wine['year']        = $wineObject->getVar('year');
        $wine['grapes']      = $wineObject->getVar('grapes');
        $wine['country']     = $wineObject->getVar('country');
        $wine['region']      = $wineObject->getVar('region');
        $wine['description'] = strip_tags($wineObject->getVar('description'));
        $wine['picture']     = $wineObject->getVar('picture');

        //       $GLOBALS['xoopsTpl']->append('wine', $wine);
        $keywords[] = $wineObject->getVar('id');

        $GLOBALS['xoopsTpl']->assign('wine', $wine);
        $start = $id;

        // Display Navigation
        if ($wineCount > $winePaginationLimit) {

            $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', CELLAR_URL . '/wine.php');
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
            $pagenav = new \XoopsPageNav($wineCount, $winePaginationLimit, $start, 'op=view&id');
            $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
        }

        break;
    case 'list':
    default:
        //        viewall();
        $GLOBALS['xoopsOption']['template_main'] = 'cellar_wine_list.tpl';
        //    require_once __DIR__ . '/header.php';

        if ($wineCount > 0) {
            foreach (array_keys($wineArray) as $i) {
                $wine['id']          = $wineArray[$i]->getVar('id');
                $wine['name']        = $wineArray[$i]->getVar('name');
                $wine['year']        = $wineArray[$i]->getVar('year');
                $wine['grapes']      = $wineArray[$i]->getVar('grapes');
                $wine['country']     = $wineArray[$i]->getVar('country');
                $wine['region']      = $wineArray[$i]->getVar('region');
                $wine['description'] = strip_tags($wineArray[$i]->getVar('description'));
                $wine['picture']     = $wineArray[$i]->getVar('picture');
                $GLOBALS['xoopsTpl']->append('wine', $wine);
                $keywords[] = $wineArray[$i]->getVar('id');
                unset($wine);
            }
            // Display Navigation
            if ($wineCount > $winePaginationLimit) {
                $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', CELLAR_URL . '/wine.php');
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($wineCount, $winePaginationLimit, $start, 'start');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        }
}

//keywords
if (isset($keywords)) {
    $utility::meta_keywords($helper->getConfig('keywords') . ', ' . implode(', ', $keywords));
}
//description
$utility::meta_description(MD_CELLAR_WINE_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', CELLAR_URL . '/wine.php');
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
