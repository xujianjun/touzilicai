<?php


use Phalcon\Mvc\View;

class WidgetController extends ControllerBase
{
	public function initialize() {
		$this->_demo = true;
		parent::initialize();
	}

	public function indexAction(){
		$widget = $this->dispatcher->getParam('widget');
//		echo 'widget:'.$widget.'<br>';
		list($view, $block) = explode('--', $widget);
		$viewData = $this->_initPageData($widget);
//		echo '<pre>';print_r($viewData);echo '</pre>';
		if ($block){
			$viewData = $viewData[$view][$block];
		}
		echo $this->view->getRender('widget', $view, $viewData);
	}

}
