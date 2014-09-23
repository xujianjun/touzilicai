<?php
use Phalcon\Tag;

class StaticController extends ControllerBase
{
	public function initialize() {
		parent::initialize();
		$this->_initPageData(array('cidian', 'lilv', 'listGroup--wealth_plan'));
	}
    public function aboutAction(){
    	$this->_initPageTitle('static-about');
    }
    public function contactAction(){
    	$this->_initPageTitle('static-contact');
    }
    public function mianzeAction(){
    	$this->_initPageTitle('static-mianze');
    }
    public function sitemapAction(){
    	$this->_initPageTitle('static-sitemap');
    }
}
