<?php
use Phalcon\Tag;

class IndexController extends ControllerBase
{
	public function initialize() {
		parent::initialize();

		$this->_initPageData(array(
								'slider--home','panel--hot','cidian',
								'panel--internet_licai','panel--internet_p2p','navTab--internet_bank_fund','panel--internet_insurance',
								'navTab--school_stock_fund','navTab--school_forex_bank','panel--school_insurance','navTab--school_spot_futures','panel--school_metal','panel--school_gold','tool',
								'navTab--trade_basic_tech','panel--trade_master',
								'lilv','panel2--wealth_story','panel2--wealth_plan',
							));
	}
    public function indexAction(){
    }
}
