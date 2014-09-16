<?php
use Phalcon\Tag;

class StaticController extends ControllerBase
{
	public function initialize() {
		parent::initialize();
		$this->_initPageData(array('cidian', 'lilv', 'listGroup--wealth_plan'));
	}
    public function aboutAction(){
    	Tag::setTitle('关于我们');
    }
    public function contactAction(){
    	Tag::setTitle('联系我们');
    }
    public function mianzeAction(){
    	Tag::setTitle('免责条款');
    }
    public function sitemapAction(){
    	Tag::setTitle('网站地图');
    }
}
