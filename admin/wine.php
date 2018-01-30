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

use Xmf\Module\Admin;
use Xmf\Database\Tables;
use Xmf\Debug;
use Xmf\Module\Helper;
use Xmf\Module\Helper\Permission;
use Xmf\Request;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
//It recovered the value of argument op in URL$
$op    = Request::getString('op', 'list');
$order = Request::getString('order', 'desc');
$sort  = Request::getString('sort', '');

$adminObject->displayNavigation(basename(__FILE__));
/** @var Permission $permHelper */
$permHelper = new \Xmf\Module\Helper\Permission();
$uploadDir  = XOOPS_UPLOAD_PATH . '/cellar/images/';
$uploadUrl  = XOOPS_UPLOAD_URL . '/cellar/images/';

switch ($op) {
    case 'list':
    default:
        $adminObject->addItemButton(AM_CELLAR_ADD_WINE, 'wine.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start               = Request::getInt('start', 0);
        $winePaginationLimit = $helper->getConfig('userpager');

        $criteria = new \CriteriaCompo();
        $criteria->setSort('id ASC, id');
        $criteria->setOrder('ASC');
        $criteria->setLimit($winePaginationLimit);
        $criteria->setStart($start);
        $wineTempRows  = $wineHandler->getCount();
        $wineTempArray = $wineHandler->getAll($criteria);/*
//
// 
                    <th class='center width5'>".AM_CELLAR_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($wineTempRows > $winePaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new \XoopsPageNav($wineTempRows, $winePaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('wineRows', $wineTempRows);
        $wineArray = [];

        //    $fields = explode('|', id:int:11::NOT NULL::primary:ID|name:varchar:45::NOT NULL:::Name|year:varchar:45::NOT NULL:::Year|grapes:varchar:45::NOT NULL:::Grapes|country:varchar:45::NOT NULL:::Country|region:varchar:45::NOT NULL:::Region|description:text:0::NOT NULL:::Description|picture:varchar:256::NOT NULL:::Picture);
        //    $fieldsCount    = count($fields);

        $criteria = new \CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($winePaginationLimit);
        $criteria->setStart($start);

        $wineCount     = $wineHandler->getCount($criteria);
        $wineTempArray = $wineHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($wineCount > 0) {
            foreach (array_keys($wineTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $selectorid = $utility::selectSorting(AM_CELLAR_WINE_ID, 'id');
                $GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
                $wineArray['id'] = $wineTempArray[$i]->getVar('id');

                $selectorname = $utility::selectSorting(AM_CELLAR_WINE_NAME, 'name');
                $GLOBALS['xoopsTpl']->assign('selectorname', $selectorname);
                $wineArray['name'] = $wineTempArray[$i]->getVar('name');

                $selectoryear = $utility::selectSorting(AM_CELLAR_WINE_YEAR, 'year');
                $GLOBALS['xoopsTpl']->assign('selectoryear', $selectoryear);
                $wineArray['year'] = $wineTempArray[$i]->getVar('year');

                $selectorgrapes = $utility::selectSorting(AM_CELLAR_WINE_GRAPES, 'grapes');
                $GLOBALS['xoopsTpl']->assign('selectorgrapes', $selectorgrapes);
                $wineArray['grapes'] = $wineTempArray[$i]->getVar('grapes');

                $selectorcountry = $utility::selectSorting(AM_CELLAR_WINE_COUNTRY, 'country');
                $GLOBALS['xoopsTpl']->assign('selectorcountry', $selectorcountry);
                $wineArray['country'] = $wineTempArray[$i]->getVar('country');

                $selectorregion = $utility::selectSorting(AM_CELLAR_WINE_REGION, 'region');
                $GLOBALS['xoopsTpl']->assign('selectorregion', $selectorregion);
                $wineArray['region'] = $wineTempArray[$i]->getVar('region');

                $selectordescription = $utility::selectSorting(AM_CELLAR_WINE_DESCRIPTION, 'description');
                $GLOBALS['xoopsTpl']->assign('selectordescription', $selectordescription);
                $wineArray['description'] = strip_tags($wineTempArray[$i]->getVar('description'));

                $selectorpicture = $utility::selectSorting(AM_CELLAR_WINE_PICTURE, 'picture');
                $GLOBALS['xoopsTpl']->assign('selectorpicture', $selectorpicture);
                $wineArray['picture']     = "<img src='" . $uploadUrl . $wineTempArray[$i]->getVar('picture') . "' name='" . 'name' . "' id=" . 'id' . " alt='' style='max-width:100px'>";
                $wineArray['edit_delete'] = "<a href='wine.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='wine.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='wine.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('wineArrays', $wineArray);
                unset($wineArray);
            }
            unset($wineTempArray);
            // Display Navigation
            if ($wineCount > $winePaginationLimit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($wineCount, $winePaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            //                     echo "<td class='center width5'>

            //                    <a href='wine.php?op=edit&id=".$i."'><img src=".$pathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
            //                    <a href='wine.php?op=delete&id=".$i."'><img src=".$pathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
            //                    </td>";

            //                echo "</tr>";

            //            }

            //            echo "</table><br><br>";

            //        } else {

            //            echo "<table width='100%' cellspacing='1' class='outer'>

            //                    <tr>

            //                     <th class='center width5'>".AM_CELLAR_FORM_ACTION."XXX</th>
            //                    </tr><tr><td class='errorMsg' colspan='9'>There are noXXX wine</td></tr>";
            //            echo "</table><br><br>";

            //-------------------------------------------

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/cellar_admin_wine.tpl');
        }

        break;

    case 'new':
        $adminObject->addItemButton(AM_CELLAR_WINE_LIST, 'wine.php', 'list');
        echo $adminObject->displayButton('left');

        $wineObject = $wineHandler->create();
        $form       = $wineObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('wine.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
            $wineObject = $wineHandler->get(Request::getInt('id', 0));
        } else {
            $wineObject = $wineHandler->create();
        }
        // Form save fields
        $wineObject->setVar('name', Request::getVar('name', ''));
        $wineObject->setVar('year', Request::getVar('year', ''));
        $wineObject->setVar('grapes', Request::getVar('grapes', ''));
        $wineObject->setVar('country', Request::getVar('country', ''));
        $wineObject->setVar('region', Request::getVar('region', ''));
        $wineObject->setVar('description', Request::getVar('description', ''));

        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploadDir = XOOPS_UPLOAD_PATH . '/cellar/images/';
        $uploader  = new \XoopsMediaUploader($uploadDir, xoops_getModuleOption('mimetypes', 'cellar'), xoops_getModuleOption('maxsize', 'cellar'), null, null);
        if ($uploader->fetchMedia(Request::getArray('xoops_upload_file', '', 'POST')[0])) {

            //$extension = preg_replace( '/^.+\.([^.]+)$/sU' , '' , $_FILES['attachedfile']['name']);
            //$imgName = str_replace(' ', '', $_POST['']).'.'.$extension;

            $uploader->setPrefix('picture_');
            $uploader->fetchMedia(Request::getArray('xoops_upload_file', '', 'POST')[0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $wineObject->setVar('picture', $uploader->getSavedFileName());
            }
        } else {
            $wineObject->setVar('picture', Request::getVar('picture', ''));
        }

        if ($wineHandler->insert($wineObject)) {
            redirect_header('wine.php?op=list', 2, AM_CELLAR_FORMOK);
        }

        echo $wineObject->getHtmlErrors();
        $form = $wineObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_CELLAR_ADD_WINE, 'wine.php?op=new', 'add');
        $adminObject->addItemButton(AM_CELLAR_WINE_LIST, 'wine.php', 'list');
        echo $adminObject->displayButton('left');
        $wineObject = $wineHandler->get(Request::getString('id', ''));
        $form       = $wineObject->getForm();
        $form->display();
        break;

    case 'delete':
        $wineObject = $wineHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('wine.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($wineHandler->delete($wineObject)) {
                redirect_header('wine.php', 3, AM_CELLAR_FORMDELOK);
            } else {
                echo $wineObject->getHtmlErrors();
            }
        } else {
            xoops_confirm(['ok' => 1, 'id' => Request::getString('id', ''), 'op' => 'delete'], Request::getUrl('REQUEST_URI', '', 'SERVER'), sprintf(AM_CELLAR_FORMSUREDEL, $wineObject->getVar('id')));
        }
        break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if ($utility::cloneRecord('cellar_wine', 'id', $id_field)) {
            redirect_header('wine.php', 3, AM_CELLAR_CLONED_OK);
        } else {
            redirect_header('wine.php', 3, AM_CELLAR_CLONED_FAILED);
        }

        break;
}
require_once __DIR__ . '/admin_footer.php';
