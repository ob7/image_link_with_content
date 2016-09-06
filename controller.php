<?php
namespace Concrete\Package\ImageLinkWithContent;
use Package;
use BlockType;

class Controller extends Package
{
    protected $pkgHandle = 'image_link_with_content';
    protected $appVersionRequired = '5.7.5.1';
    protected $pkgVersion = '1.0';

    public function getPackageName()
    {
        return t('Image Link With Content');
    }

    public function getPackageDescription()
    {
        return t('Displays an image with title, text, and custom link title all within a link');
    }

    public function install()
    {
        $pkg = parent::install();
        $bt = BlockType::getByHandle('image_link_with_content');
        if (!is_object($bt)) {
            $bt = BlockType::installBlockType('image_link_with_content', $pkg);
        }
    }
}

?>
