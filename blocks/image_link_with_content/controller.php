<?php 
namespace Concrete\Package\ImageLinkWithContent\Block\ImageLinkWithContent;

use Concrete\Core\Block\BlockController;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;

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
        // Check for a valid File in the view
        $f = File::getByID($this->fID);
        $this->set('f', $f);
        $this->set('c', Page::getCurrentPage());

        $linkToC = Page::getByID($this->internalLinkCID);
        if (is_object($linkToC) && !$linkToC->isError()) {
            $linkUrl = $linkToC->getCollectionLink();
        }
        $this->set('linkUrl', $linkUrl);
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
