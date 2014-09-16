<?php
use Phalcon\Tag;

use Phalcon\Mvc\View;

class CalcController extends ControllerBase
{
	public function initialize() {
		Tag::setTitle('理财工具');
		parent::initialize();
		$this->_initPageData(array('cidian', 'lilv', 'listGroup--wealth_plan'));
	}

	public function indexAction(){}

	public function singleAction(){
		$calcId = $this->dispatcher->getParam('calcId', 'int');

		$this->view->start();
		$this->view->render("calc", 'calc'.$calcId);
		$this->view->finish();
		echo $this->view->getContent();
		exit();
	}

}
