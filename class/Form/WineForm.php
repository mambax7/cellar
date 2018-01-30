<?php namespace XoopsModules\Cellar\Form;

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

require_once __DIR__ . '/../../include/common.php';

$moduleDirName = basename(dirname(dirname(__DIR__)));
$helper        = Cellar\Helper::getInstance();
$permHelper    = new \Xmf\Module\Helper\Permission();

xoops_load('XoopsFormLoader');

/**
 * Class WineForm
 */
class WineForm extends \XoopsThemeForm
{
    public $targetObject;

    /**
     * Constructor
     *
     * @param $target
     */
    public function __construct($target)
    {
        global $helper;
        $this->targetObject = $target;

        $title = $this->targetObject->isNew() ? sprintf(AM_CELLAR_WINE_ADD) : sprintf(AM_CELLAR_WINE_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'), 'post', true);
        $this->setExtra('enctype="multipart/form-data"');

        //include ID field, it's needed so the module knows if it is a new form or an edited form

        $hidden = new \XoopsFormHidden('id', $this->targetObject->getVar('id'));
        $this->addElement($hidden);
        unset($hidden);

        // Id
        $this->addElement(new \XoopsFormLabel(AM_CELLAR_WINE_ID, $this->targetObject->getVar('id'), 'id'));
        // Name
        $this->addElement(new \XoopsFormText(AM_CELLAR_WINE_NAME, 'name', 50, 255, $this->targetObject->getVar('name')), false);
        // Year
        $this->addElement(new \XoopsFormText(AM_CELLAR_WINE_YEAR, 'year', 50, 255, $this->targetObject->getVar('year')), false);
        // Grapes
        $this->addElement(new \XoopsFormText(AM_CELLAR_WINE_GRAPES, 'grapes', 50, 255, $this->targetObject->getVar('grapes')), false);
        // Country
        $country = new \XoopsFormSelectCountry(AM_CELLAR_WINE_COUNTRY, 'country', $this->targetObject->getVar('country'));
        //           $optionsArray = Cellar\Utility::enumerate('cellar_wine', 'country');
        //            if ( ! is_array($optionsArray)) {
        //            throw new \RuntimeException($optionsArray . ' must be an array.');
        //            }
        //           foreach($optionsArray as $enum) {
        //               $country->addOption($enum, (defined($enum) ? constant($enum) : $enum));
        //           }
        $this->addElement($country, false);
        // Region
        $this->addElement(new \XoopsFormText(AM_CELLAR_WINE_REGION, 'region', 50, 255, $this->targetObject->getVar('region')), false);
        // Description
        $this->addElement(new \XoopsFormTextArea(AM_CELLAR_WINE_DESCRIPTION, 'description', $this->targetObject->getVar('description'), 4, 47), false);
        // Picture
        $picture = $this->targetObject->getVar('picture') ?: 'blank.png';

        $uploadDir   = '/uploads/cellar/images/';
        $imgtray     = new \XoopsFormElementTray(AM_CELLAR_WINE_PICTURE, '<br>');
        $imgpath     = sprintf(AM_CELLAR_FORMIMAGE_PATH, $uploadDir);
        $imageselect = new \XoopsFormSelect($imgpath, 'picture', $picture);
        $imageArray  = \XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . $uploadDir);
        foreach ($imageArray as $image) {
            $imageselect->addOption("$image", $image);
        }
        $imageselect->setExtra("onchange='showImgSelected(\"image_picture\", \"picture\", \"" . $uploadDir . '", "", "' . XOOPS_URL . "\")'");
        $imgtray->addElement($imageselect);
        $imgtray->addElement(new \XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $uploadDir . '/' . $picture . "' name='image_picture' id='image_picture' alt='' />"));
        $fileseltray = new \XoopsFormElementTray('', '<br>');
        $fileseltray->addElement(new \XoopsFormFile(AM_CELLAR_FORMUPLOAD, 'picture', xoops_getModuleOption('maxsize')));
        $fileseltray->addElement(new \XoopsFormLabel(''));
        $imgtray->addElement($fileseltray);
        $this->addElement($imgtray);

        $this->addElement(new \XoopsFormHidden('op', 'save'));
        $this->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
