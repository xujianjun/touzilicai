<?php
use Phalcon\Tag;

class IndexController extends ControllerBase
{
	public function initialize() {
		Tag::setTitle('首页');
		parent::initialize();

		$this->_initPageData(array(
								'slider--home','panel--wealth_product','cidian',
								'panel--internet_licai','panel--internet_p2p','panel--internet_bank','panel--internet_fund','lilv',
								'navTab--school_stock_fund','navTab--school_forex_bank','panel--school_insurance','navTab--school_spot_futures','panel--school_metal','panel--school_gold','tool',
								'navTab--trade_basic_tech','panel--trade_master','listGroup--wealth_plan'
							));
	}
    public function indexAction(){}
}
