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

//require_once dirname(__DIR__) . '/class/utility.php';
/**
 * @param $options
 *
 * @return array
 */
function showCellarWine($options)
{
    // require_once dirname(__DIR__) . '/class/wine.php';
    $moduleDirName = basename(dirname(__DIR__));
    //$myts = \MyTextSanitizer::getInstance();

    $block     = [];
    $blockType = $options[0];
    $wineCount = $options[1];
    //$titleLenght = $options[2];

    /** @var XoopsPersistableObjectHandler $wineHandler */
    $wineHandler = new Cellar\WineHandler($GLOBALS['xoopsDB']);
    $criteria    = new \CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    if ($blockType) {
        $criteria->add(new Criteria('id', 0, '!='));
        $criteria->setSort('id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($wineCount);
    $wineArray = $wineHandler->getAll($criteria);
    foreach (array_keys($wineArray) as $i) {
    }

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function editCellarWine($options)
{
    require_once dirname(__DIR__) . '/class/wine.php';
    $moduleDirName = basename(dirname(__DIR__));

    $form = MB_CELLAR_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='" . $options[0] . "' />";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' type='text' />&nbsp;<br>";
    $form .= MB_CELLAR_TITLELENGTH . " : <input name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' type='text' /><br><br>";

    /** @var XoopsPersistableObjectHandler $'. wine . 'Handler */
    $wineHandler = new Cellar\WineHandler($GLOBALS['xoopsDB']);

    $criteria = new \CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new \Criteria('id', 0, '!='));
    $criteria->setSort('id');
    $criteria->setOrder('ASC');
    $wineArray = $wineHandler->getAll($criteria);
    $form      .= MB_CELLAR_CATTODISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form      .= "<option value='0' " . (false === in_array(0, $options) ? '' : "selected='selected'") . '>' . MB_CELLAR_ALLCAT . '</option>';
    foreach (array_keys($wineArray) as $i) {
        $id   = $wineArray[$i]->getVar('id');
        $form .= "<option value='" . $id . "' " . (false === in_array($id, $options) ? '' : "selected='selected'") . '>' . $wineArray[$i]->getVar('id') . '</option>';
    }
    $form .= '</select>';

    return $form;
}
