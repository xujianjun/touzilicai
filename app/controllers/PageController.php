<?php
use Phalcon\Tag;
use Phalcon\Mvc\View;

class PageController extends ControllerBase
{
    public function xtHomeAction(){
    	$this->view->disableLevel(View::LEVEL_LAYOUT);
    	$this->_initPageData(array(
								'slider--school','dailyword',
								'navTab--stockSchool_basic_method','panel--stockSchool_trade','hangqing',
								'panel--fundSchool_basic','navTab--fundSchool_open_close','panel--fundSchool_money','panel--fundSchool_trade',
								'panel--forexSchool_basic','panel--forexSchool_trade',
								'panel--metalSchool_basic','panel--metalSchool_trade',
								'panel--otherSchool_bank','panel--otherSchool_insurance','navTab--otherSchool_spot_futures','panel--otherSchool_gold',
							));
    }
    public function xtListAction(){
    	$this->view->disableLevel(View::LEVEL_LAYOUT);
    	$this->_initPageData(array(
								'breadcrumb','list--node',
								'xtSidebars','panel--hot'
							));
    }
    public function xtSingleAction(){
    	$this->view->disableLevel(View::LEVEL_LAYOUT);
    	$this->_initPageData(array(
								'breadcrumb','nodetag','content--node','siblings--node','panel--relation',
								'xtSidebars','panel--hot'
							));
    }

    public function listAction(){
    	$this->_initPageData(array(
								'list_header','breadcrumb','list--node',
								'cidian','panel--hot', 'lilv'
							));
    }
    public function singleAction(){
    	$this->_initPageData(array(
								'breadcrumb','nodetag','content--node','siblings--node','panel--relation',
								'cidian','panel--hot', 'lilv'
							));
    }

	public function tagListAction(){
		$this->_initPageData(array(
								'taglist_header','taglist',
								'cidian','panel--hot', 'lilv'
							));
	}
    public function tagSingleAction(){
    	$this->_initPageData(array(
								'breadcrumb','content--tag','siblings--tag','list--tagnode',
								'cidian','panel--hot', 'lilv'
							));
    }

    public function searchAction(){
    	$this->_initPageData(array(
								'search_header','list--search',
								'cidian','panel--hot', 'lilv'
							));
    }
}
