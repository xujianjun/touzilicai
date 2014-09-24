<?php
use Phalcon\Tag;

class StaticController extends ControllerBase
{
	public function initialize() {
		parent::initialize();
		$this->_initPageData(array('breadcrumb', 'content--static', 'cidian', 'lilv', 'panel--hot'));
	}
    public function contentAction(){
    }
    public function sitemapAction(){
    	$this->_initPageData(array('sitemap'));
    }
}
