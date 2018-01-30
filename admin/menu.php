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

include __DIR__ . '/../preloads/autoloader.php';

$helper = Cellar\Helper::getInstance();

// get path to icons
$pathIcon32    = \Xmf\Module\Admin::menuIconPath('');
$pathModIcon32 = $helper->getModule()->getInfo('modicons32');
$adminObject   = \Xmf\Module\Admin::getInstance();

$adminmenu[] = [
    'title' => MI_CELLAR_ADMENU1,
    'link'  => 'admin/index.php',
    'icon'  => "{$pathIcon32}/home.png"
];

$adminmenu[] = [
    'title' => MI_CELLAR_ADMENU2,
    'link'  => 'admin/wine.php',
    'icon'  => "{$pathIcon32}/index.png"
];

//$adminmenu[] = [
//    'title' => MI_CELLAR_ADMENU3,
//    'link'  => 'admin/permissions.php',
//    'icon'  => "{$pathIcon32}/permissions.png"
//];

$adminmenu[] = [
    'title' => MI_CELLAR_ADMENU4,
    'link'  => 'admin/about.php',
    'icon'  => "{$pathIcon32}/about.png"
];
