<?php

namespace XoopsModules\Cellar;

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
use XoopsModules\Cellar\Common;

/**
 * Class Utility
 */
class Utility
{
    use Common\VersionChecks; //checkVerXoops, checkVerPhp Traits

    use Common\ServerStats; // getServerStats Trait

    use Common\FilesManagement; // Files Management Trait

    //--------------- Custom module methods -----------------------------

    /**
     * @param $text
     * @param $form_sort
     * @return string
     */
    public static function selectSorting($text, $form_sort)
    {
        global $start, $order,  $sort;
//        global $file_cat, $xoopsModule;

        $moduleDirName = basename(dirname(__DIR__));

        //        if (false !== ($helper = Xmf\Module\Helper::getHelper($moduleDirName))) {
        //        } else {
        //            $helper = Xmf\Module\Helper::getHelper('system');
        //        }
        $helper = Cellar\Helper::getInstance();

        $pathModIcon16 = XOOPS_URL . '/modules/' . $moduleDirName . '/' . $helper->getModule()->getInfo('modicons16');

        $select_view = '<form name="form_switch" id="form_switch" action="' . Request::getString('REQUEST_URI', '', 'SERVER') . '" method="post"><span style="font-weight: bold;">' . $text . '</span>';
        //$sorts =  $sort ==  'asc' ? 'desc' : 'asc';
        if ($form_sort === $sort) {
            $sel1 = 'asc' === $order ? 'selasc.png' : 'asc.png';
            $sel2 = 'desc' === $order ? 'seldesc.png' : 'desc.png';
        } else {
            $sel1 = 'asc.png';
            $sel2 = 'desc.png';
        }
        $select_view .= '  <a href="' . Request::getString('PHP_SELF', '', 'SERVER') . '?start=' . $start . '&sort=' . $form_sort . '&order=asc" /><img src="' . $pathModIcon16 . '/' . $sel1 . '" title="ASC" alt="ASC"></a>';
        $select_view .= '<a href="' . Request::getString('PHP_SELF', '', 'SERVER') . '?start=' . $start . '&sort=' . $form_sort . '&order=desc" /><img src="' . $pathModIcon16 . '/' . $sel2 . '" title="DESC" alt="DESC"></a>';
        $select_view .= '</form>';

        return $select_view;
    }

    /***************Blocks***************/
    /**
     * @param array $cats
     * @return string
     */
    public static function block_addCatSelect($cats)
    {
//        $cat_sql = '';
        $cat_sql = '(' . current($cats);
        array_shift($cats);
        foreach ($cats as $cat) {
            $cat_sql .= ',' . $cat;
        }
        $cat_sql .= ')';

        return $cat_sql;
    }

    /**
     * @param $content
     */
    public static function meta_keywords($content)
    {
        /** @var \xos_opal_Theme $xoTheme */
        /** @var \XoopsTpl $xoopsTpl */
        global $xoopsTpl, $xoTheme;
        $myts    = \MyTextSanitizer::getInstance();
        $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
        if (null !== $xoTheme && is_object($xoTheme)) {
            $xoTheme->addMeta('meta', 'keywords', strip_tags($content));
        } else {    // Compatibility for old Xoops versions
                 $xoopsTpl->assign('xoops_meta_keywords', strip_tags($content));
        }
    }

    /**
     * @param $content
     */
    public static function meta_description($content)
    {
        /** @var \xos_opal_Theme $xoTheme */
        /** @var \XoopsTpl $xoopsTpl */
        global $xoopsTpl, $xoTheme;
        $myts    = \MyTextSanitizer::getInstance();
        $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
        if (null !== $xoTheme && is_object($xoTheme)) {
            $xoTheme->addMeta('meta', 'description', strip_tags($content));
        } else {    // Compatibility for old Xoops versions
            $xoopsTpl->assign('xoops_meta_description', strip_tags($content));
        }
    }

    /**
     * @param $tableName
     * @param $columnName
     *
     * @return array
     * @throws \UnexpectedValueException
     */
    public static function enumerate($tableName, $columnName)
    {
        $table = $GLOBALS['xoopsDB']->prefix($tableName);

        //    $result = $GLOBALS['xoopsDB']->query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
        //        WHERE TABLE_NAME = '" . $table . "' AND COLUMN_NAME = '" . $columnName . "'")
        //    || exit ($GLOBALS['xoopsDB']->error());

        $sql    = 'SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "' . $table . '" AND COLUMN_NAME = "' . $columnName . '"';
        $result = $GLOBALS['xoopsDB']->query($sql);
        if (!$result) {
            throw new \UnexpectedValueException('Empty MySQL query: ' . $GLOBALS['xoopsDB']->error());
        }

        $row      = $GLOBALS['xoopsDB']->fetchBoth($result);
        $enumList = explode(',', str_replace("'", '', substr($row['COLUMN_TYPE'], 5, -6)));
        return $enumList;
    }

    /**
     * @param array|string $tableName
     * @param int          $id_field
     * @param int          $id
     *
     * @return mixed
     * @throws \UnexpectedValueException
     */
    public static function cloneRecord($tableName, $id_field, $id)
    {
//        $new_id = false;
        $table  = $GLOBALS['xoopsDB']->prefix($tableName);
        // copy content of the record you wish to clone 

        if (!$tempTable = $GLOBALS['xoopsDB']->fetchArray($GLOBALS['xoopsDB']->query("SELECT * FROM $table WHERE $id_field='$id' "), MYSQLI_ASSOC)) {
            throw new \UnexpectedValueException('Empty MySQL query: ' . $GLOBALS['xoopsDB']->error());
        }

        // set the auto-incremented id's value to blank.
        unset($tempTable[$id_field]);
        // insert cloned copy of the original  record 
        if (!$GLOBALS['xoopsDB']->queryF("INSERT INTO $table (" . implode(', ', array_keys($tempTable)) . ") VALUES ('" . implode("', '", array_values($tempTable)) . "')")) {
            throw new \UnexpectedValueException('Empty MySQL query: ' . $GLOBALS['xoopsDB']->error());
        }

        $new_id = $GLOBALS['xoopsDB']->getInsertId();

        return $new_id;
    }
}
