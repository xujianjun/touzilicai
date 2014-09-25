<?php
use Phalcon\Tag;
use Phalcon\Mvc\View;

class StaticController extends ControllerBase
{
	public function initialize() {
		parent::initialize();
	}
    public function contentAction(){
    	$this->_initPageData(array('breadcrumb', 'content--static', 'cidian', 'lilv', 'panel--hot'));
    }
    public function sitemapAction(){
    	$this->view->disableLevel(View::LEVEL_LAYOUT);
    	$this->_initPageData(array('sitemap'));
    }
    public function notfoundAction(){
    	$this->view->disableLevel(View::LEVEL_LAYOUT);
    	$this->_initPageData(array('notfound'));
    }
}
