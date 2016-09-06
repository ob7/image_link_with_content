<?php 
namespace Concrete\Package\ImageLinkWithContent\Block\ImageLinkWithContent;

use Concrete\Core\Block\BlockController;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Asset;
use AssetList;
use Core;

class Controller extends BlockController
{
    protected $btTable = 'btImageLinkWithContent';
    protected $btInterfaceWidth = '800';
    protected $btInterfaceHeight = '600';
    protected $btWrapperClass = 'ccm-ui';
    protected $btDefaultSet = 'multimedia';

    public function getBlockTypeName()
    {
        return t('Image Link With Content');
    }

    public function getBlockTypeDescription()
    {
        return t('Display an image, title, content, and link title all within a link');
    }

    public function add()
    {
        $this->set('bf', null);
    }

    public function edit()
    {
        $bf = null;
        if ($this->getFileID() > 0) {
            $bf = $this->getFileObject();
        }
        $this->set('bf', $bf);
    }

    public function view()
    {
        $this->set('c', Page::getCurrentPage()); //for checking if in edit mode

        $linkToC = Page::getByID($this->internalLinkCID); //get link object
        if (is_object($linkToC) && !$linkToC->isError()) { //if exists store link in var
            $linkUrl = $linkToC->getCollectionLink();
            $this->set('linkUrl', $linkUrl);
        }

        $bID = $this->bID; //used for applying styles to individual blocks so multiple blocks on same page dont conflict with one another
        $al = AssetList::getInstance(); // for registering inline css instead of injecting via view
        // Background Color Style
        $backgroundColor = $this->backgroundColor;
        if ($backgroundColor) {
            $al->register('css-inline', 'imagelinkstylesbg', '.image-link-with-content-'.$bID.':before { background-color:' .$backgroundColor.' };');
            $this->requireAsset('css-inline', 'imagelinkstylesbg');
        }
        // Main Background Color Style
        $mainBackgroundColor = $this->mainBackgroundColor;
        if ($mainBackgroundColor) {
            $al->register('css-inline', 'imagelinkstylesmbg', '.image-link-with-content-'.$bID.' { background-color:' .$mainBackgroundColor.' !important };');
            $this->requireAsset('css-inline', 'imagelinkstylesmbg');
        }
        // Title Color Style
        $titleColor = $this->titleColor;
        if ($titleColor) {
            $al->register('css-inline', 'imagelinkstylestc', '.image-link-with-content-'.$bID.' h2 { color:' .$titleColor.' !important };');
            $this->requireAsset('css-inline', 'imagelinkstylestc');
        }
        // Main Content Color Style
        $mainContentColor = $this->mainContentColor;
        if ($mainContentColor) {
            $al->register('css-inline', 'imagelinkstylesmcc', '.image-link-with-content-'.$bID.' p { color:' .$mainContentColor.' !important };');
            $this->requireAsset('css-inline', 'imagelinkstylesmcc');
        }
        // Background Image Style
        $f = File::getByID($this->fID);
        $this->set('f', $f);
        if (is_object($f) && $f->getFileID()) {
            $ih = Core::make('helper/image');
            $thumb = $ih->getThumbnail($f, 500, 500, true);
            $al->register('css-inline', 'imagelinkstylesimage', '.image-link-with-content-'.$bID.' { background-image: url("' .$thumb->src.'"); };');
            $this->requireAsset('css-inline', 'imagelinkstylesimage');
        }

    }

    public function save($data)
    {
        parent::save($data);
    }


    /**
     * @return int
     */
    public function getFileID()
    {
        return $this->fID;
    }

    /**
     * @return int
     */
    public function getFileObject()
    {
        return File::getByID($this->fID);
    }

}
