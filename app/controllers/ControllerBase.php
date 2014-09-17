<?php

/**
 * 页面公共变量：
 * 		siteConfig,
 * 		params[aid,article,tid,tag,cid,category],
 * 		menus
 */

use Phalcon\Tag;

class ControllerBase extends Phalcon\Mvc\Controller {
	public $_demo = false;

	public $tlObj;
	public $pagerObj;
	public $pathObj;

	public $_siteConfig;
	public $_params;
	public $_menus;

	public function initialize() {
		$this->view->setTemplateAfter('main');
		Tag::appendTitle(' - 财途网');

		$this->_initLibrary();
		$this->_initSiteConfig();
		$this->_initParams();
		$this->_initMenu();
//		$this->view->setVar("server", $_SERVER);
	}

	public function _initLibrary(){
		$this->tlObj = new Tl();
		$this->pagerObj = new Pager();
		//$this->pathObj = new Path();
	}

	public function _initSiteConfig(){
		$siteConfig = array();
		$siteConfigOri = SiteConfig::find()->toArray();
		foreach ($siteConfigOri as $key=>$value){
			$value['data'] = json_decode($value['data'], true);
			if ($value['type']=='mainMenu'){
				foreach ($value['data'] as $key2=>$value2){
					if ($value2['link']=='/'){
						if($_SERVER['REQUEST_URI']==$value2['link']){
							$value['data'][$key2]['current'] = true;
						}
					} elseif (strpos($_SERVER['REQUEST_URI'], $value2['link'])===0){
						$value['data'][$key2]['current'] = true;
					}
				}
			}

			$siteConfig[$value['type']] = $value;
		}

		//

		$siteConfig['nodeCfg'] = array('data' => array(
											'menuRootNid' => 6975,
											'mainMenuRootNid' => 2,
											'secMenuRootNid' => 6977,
											'recommendNodeNum' => 6,
											'articleRootNid' => 2,
										));

		$siteConfig['widgetCfg'] = array('data' => array(
											'cidianCloudNum' => 20,
											'tagNodesNum' => 20,
											'listItemPer' => 20,
											'blockNum' => 6,
										));
		$siteConfig['blockCfg'] = array('data' => array(
											'slider_home' => array(array('nid'=>29, 'title'=>'投资案例')),
											'slider_school' => array(array('nid'=>9, 'title'=>'财经学堂')),
											//'listGroup_wealth_plan' => array(array('nid'=>30, 'title'=>'理财规划')),
											'navTab_school_stock_fund' => array(array('nid'=>17, 'title'=>'股票学堂'), array('nid'=>18, 'title'=>'基金学堂')),
											'navTab_school_forex_bank' => array(array('nid'=>19, 'title'=>'外汇学堂'), array('nid'=>20, 'title'=>'银行学堂')),
											'navTab_school_spot_futures' => array(array('nid'=>22, 'title'=>'现货学堂'), array('nid'=>23, 'title'=>'期货学堂')),
											//'navTab_trade_basic_tech' => array(array('nid'=>26, 'title'=>'基本面分析'), array('nid'=>27, 'title'=>'技术面分析')),
											//'panel_wealth_product' => array(array('nid'=>8, 'title'=>'互联网金融')),
											'panel_internet_licai' => array(array('nid'=>13, 'title'=>'互联网理财')),
											'panel_internet_p2p' => array(array('nid'=>14, 'title'=>'p2p网贷')),
											'panel_internet_bank' => array(array('nid'=>15, 'title'=>'银行理财')),
											'panel_internet_fund' => array(array('nid'=>16, 'title'=>'基金理财')),
											'panel_internet_insurance' => array(array('nid'=>66, 'title'=>'保险理财')),
											'panel_school_insurance' => array(array('nid'=>21, 'title'=>'保险学堂')),
											'panel_school_metal' => array(array('nid'=>24, 'title'=>'贵金属学堂')),
											'panel_school_gold' => array(array('nid'=>25, 'title'=>'黄金学堂')),
											'panel_trade_basic' => array(array('nid'=>26, 'title'=>'基本面分析')),
											'panel_trade_tech' => array(array('nid'=>27, 'title'=>'技术面分析')),
											'panel_trade_master' => array(array('nid'=>28, 'title'=>'大师攻略')),

											'panel_wealth_story' => array(array('nid'=>29, 'title'=>'投资案例')),
											'panel_wealth_plan' => array(array('nid'=>30, 'title'=>'理财规划')),
											'panel_wealth_product' => array(array('nid'=>31, 'title'=>'产品评测')),


											'navTab_stockSchool_basic_method' => array(array('nid'=>34, 'title'=>'基础知识'), array('nid'=>36, 'title'=>'操盘攻略')),
											'panel_stockSchool_trade' => array(array('nid'=>35, 'title'=>'交易指南')),
											'panel_fundSchool_basic' => array(array('nid'=>37, 'title'=>'基金入门')),
											'navTab_fundSchool_open_close' => array(array('nid'=>38, 'title'=>'开放式基金'), array('nid'=>39, 'title'=>'封闭式基金')),
											'panel_fundSchool_money' => array(array('nid'=>40, 'title'=>'货币基金')),
											'panel_fundSchool_trade' => array(array('nid'=>41, 'title'=>'基金技巧')),
											'panel_forexSchool_basic' => array(array('nid'=>42, 'title'=>'外汇入门')),
											'panel_forexSchool_trade' => array(array('nid'=>43, 'title'=>'炒汇技巧')),
											'panel_metalSchool_basic' => array(array('nid'=>56, 'title'=>'基础知识')),
											'panel_metalSchool_trade' => array(array('nid'=>58, 'title'=>'投资技巧')),
											'panel_otherSchool_bank' => array(array('nid'=>20, 'title'=>'银行学堂')),
											'panel_otherSchool_insurance' => array(array('nid'=>21, 'title'=>'保险学堂')),
											'navTab_otherSchool_spot_futures' => array(array('nid'=>22, 'title'=>'现货学堂'), array('nid'=>23, 'title'=>'期货学堂')),
											'panel_otherSchool_gold' => array(array('nid'=>25, 'title'=>'黄金学堂')),
										));

		$this->_siteConfig = $siteConfig;
//		echo '<pre>';print_r($siteConfig);echo '</pre>';
		$this->view->setVar("siteConfig", $siteConfig);
	}
	public function _initParams(){
		$params = array();
		if ($this->_demo){
			$params['nid'] = 6866;
			$params['tid'] = 1;
			$params['p'] = $params['p'] ? $params['p'] : 1;
			$params['tagPrefix'] = 'a';

			$params['search_keyword'] = '';
		} else {
			$params['p'] = (isset($_GET['p']) && $_GET['p']) ? $_GET['p'] : 1;
			$params['nid'] = $this->dispatcher->getParam('nid', 'int');
			$params['tid'] = $this->dispatcher->getParam('tid', 'int');
			$params['tagPrefix'] = strtolower($this->dispatcher->getParam('tagPrefix'));
			$nten = $this->dispatcher->getParam('nten');
			$nten2 = $this->dispatcher->getParam('nten2');
			$nten3 = $this->dispatcher->getParam('nten3');
			$params['search_keyword'] = trim($this->dispatcher->getParam('search_keyword'), '/');
		}
		if ($params['nid']){
			$node = TreeStruct::findFirst($params['nid']);
			$params['node'] = $node;
			$params['nodeData'] = $node->TreeData;
			$relationTreeNodes = TreeStruct::findRelationTrees($node);
			$params['nodeParents'] = $relationTreeNodes['parent'];
			$params['nodeChilds'] = $relationTreeNodes['child'];
			$path = '';
			foreach ($params['nodeParents'] as $parentNode){
				$ptitle_en = $parentNode->TreeData->title_en;
				if (!$ptitle_en){
					continue;
				}
				$path .= '/'.$ptitle_en;
			}
//			echo 'path:'.$path.'<br>';
//			echo 'nten:'.$nten.',nten2:'.$nten2.'<br>';die();

			$urlPathTitle = array($nten, $nten2, $nten3);
			if ($urlPathTitle[0] || $urlPathTitle[1] || $urlPathTitle[2]){
				foreach ($params['nodeParents'] as $parentNode){
					$ptitle_en = $parentNode->TreeData->title_en;
					if (!$ptitle_en){
						continue;
					}
					if ($ptitle_en == $urlPathTitle[0]){
						unset($urlPathTitle[0]);
						sort($urlPathTitle);
						if (count($urlPathTitle) == 0){
							break;
						}
					}
				}
				if (count($urlPathTitle) > 0){
					$url = $path.'/'.$params['nid'].'.html';
					 $this->response->redirect($url, true, 301);
			        //Disable the view to avoid rendering
			        $this->view->disable();
				}
			}
		}
		if (!$params['nid'] && ($nten || $nten2)){
			$ntitleEn = $nten2 ? $nten2 : $nten;
			$nData = TreeData::findFirst(array(
								'conditions' => "title_en = :ntitleEn:",
								'bind' => array('ntitleEn'=>$ntitleEn)
							));
			$params['nid'] = $nData->id;
			$node = TreeStruct::findFirst($params['nid']);
			$params['node'] = $node;
			$params['nodeData'] = $node->TreeData;
			$relationTreeNodes = TreeStruct::findRelationTrees($node);
			$params['nodeParents'] = $relationTreeNodes['parent'];
			$params['nodeChilds'] = $relationTreeNodes['child'];
		}

		if ($params['tid']){
			$tag = Tags::findFirst($params['tid']);
			$params['tag'] = $tag;
		}
//		echo '<pre>';print_r($params);echo '</pre>';die();
		$this->_params = $params;
		$this->view->setVar("params", $params);
	}

	public function _initMenu(){
		$menus = array('mainMenu'=>array(), 'secMenu'=>array());
		$mainMenuRootNid = $this->_siteConfig['nodeCfg']['data']['mainMenuRootNid'];
		$secMenuRootNid = $this->_siteConfig['nodeCfg']['data']['secMenuRootNid'];
		$recommendNodeNum = $this->_siteConfig['nodeCfg']['data']['recommendNodeNum'];

		//一级菜单
		$mainMenuRootNode = TreeStruct::findFirst($mainMenuRootNid);
		$temNodes = TreeStruct::find(array(
						'conditions' => 'lft>?1 and rgt<?2 and type=:type:',
						'bind' => array(1=>$mainMenuRootNode->lft, 2=>$mainMenuRootNode->rgt, 'type'=>'default'),
						'order' => 'lft asc',
					));
		$temMainMenu = array();
		foreach ($temNodes as $key=>$temNode){
			$treeData = $temNode->TreeData->toArray();
			$temMainMenu[$key] = $temNode->toArray();
			$temMainMenu[$key]['TreeData'] = $treeData;
		}

		$mainMenu = array();
		$pid = 0;
		$plvl = $mainMenuRootNode->lvl + 1;
		foreach ($temMainMenu as $key=>$value){
			if ($value['lvl'] == $plvl){
				$mainMenu[$value['id']] = $value;

				//判断是否为当前menu
				$mainMenu[$value['id']]['current'] = false;
				if ($this->_params['node']->id == $value['id']){
					$mainMenu[$value['id']]['current'] = true;
				} else {
					foreach($this->_params['nodeParents'] as $parent){
						if ($parent->id == $value['id']){
							$mainMenu[$value['id']]['current'] = true;
							break;
						}
					}
				}
				//推荐node
				$temRecommendNodes = TreeStruct::find(array(
								'conditions' => 'lft>?1 and rgt<?2 and type=:type:',
								'bind' => array(1=>$value['lft'], 2=>$value['rgt'], 'type'=>'article'),
								'limit' => array('number'=>$recommendNodeNum, 'offset'=>0),
								'order' => 'lft desc',
							));
				$recommendNodes = array();
				foreach ($temRecommendNodes as $key=>$temRecommendNode){
					if ($temRecommendNode){
						$treeData = $temRecommendNode->TreeData->toArray();
						$recommendNodes[$key] = $temRecommendNode->toArray();
						$recommendNodes[$key]['TreeData'] = $treeData;
					}
				}
				$mainMenu[$value['id']]['recommendNodes'] = $recommendNodes;

				//子菜单
				$mainMenu[$value['id']]['children'] = array();
				$pid = $value['id'];
			} elseif ($value['lvl'] == $plvl+1){
				$mainMenu[$pid]['children'][$value['id']] = $value;
			}
		}
		$mainMenu = TreeStruct::addNodesAttr($mainMenu);
		$menus['mainMenu'] = $mainMenu;

		//二级菜单
		$temNodes = TreeStruct::find(array(
						'conditions' => 'pid=?1',
						'bind' => array(1=>$secMenuRootNid),
						'order' => 'lft asc',
					));
		$secMenu = array();
		foreach ($temNodes as $key=>$temNode){
			$treeData = $temNode->TreeData->toArray();
			$secMenu[$key] = $temNode->toArray();
			$secMenu[$key]['TreeData'] = $treeData;
		}
		$secMenu = TreeStruct::addNodesAttr($secMenu);
		$menus['secMenu'] = $secMenu;
//		echo '<pre>';print_r($menus);echo '</pre>';die();
		$this->view->setVar("menus", $menus);
	}

	public function _initBreadcrumb(){
		$breadcrumb = '';
		if ($this->_params['nid']){
			$path = '';
			foreach ($this->_params['nodeParents'] as $parentNode){
				$ptitle_en = $parentNode->TreeData->title_en;
				if (!$ptitle_en){
					continue;
				}
				$breadcrumb .= '<li><a href="'.$path.'/'.$ptitle_en.'/">'.$parentNode->TreeData->title.'</a></li>';
				$path .= '/'.$ptitle_en;
			}
			$appfix = $this->_params['node']->type == 'article' ? '/'.$this->_params['node']->id.'.html' : '/'.$this->_params['node']->TreeData->title_en.'/';
			$breadcrumb .= '<li class="active"><a href="'.$path.$appfix.'">'.$this->_params['node']->TreeData->title.'</a></li>';
		} elseif ($this->_params['tid']){
			$breadcrumb .= '<li><a href="/tag/'.$this->_params['tag']->pinyinPrefix.'/">标签</a></li>';
			$breadcrumb .= '<li class="active"><a href="/tag/'.$this->_params['tag']->id.'.html"></li>'.$this->_params['tag']->name.'</a>';
		}
		if ($breadcrumb){
			$breadcrumb = '<li><a href="/">首页</a></li>' . $breadcrumb;
		}
		return $breadcrumb;
	}
	public function _initPageData($widgets){
		if (!is_array($widgets)){
			$widgetArrs[] = $widgets;
		} else {
			$widgetArrs = $widgets;
		}
		$pageData = array();
		foreach ($widgetArrs as $widget){
			list($view, $block) = explode('--', $widget);
			$widgetData = $this->fetchWidgetData($view, $block);
			if ($block){
				$pageData[$view][$block] = $widgetData[$block];
			} else {
				$pageData[$view] = $widgetData;
			}
		}
		$this->view->setVar("pageData", $pageData);
		return $pageData;
	}

	/*
	 * widget:
	 * 	type		名称
	 * 	slider		幻灯片
	 * 	cidian		词典
	 * 	hangqing	行情
	 * 	lilv		利率
	 * 	tool		理财工具
	 * 	list		标题，内容列表
	 * 		article	文章
	 * 	listGroup	标题列表
	 * 	navTab		含有tab的panel
	 * 	panel		区块
	 *
	 */
	public function fetchWidgetData($view, $block=''){
		$widgetData = array();

		$blockCfgKey = $block ? $view.'_'.$block : $view;
		$blockCfg = $this->_siteConfig['blockCfg']['data'][$blockCfgKey];
		$blockNum = $this->_siteConfig['widgetCfg']['data']['blockNum'];
		switch ($view){
			case 'slider': //理财故事
				switch ($block){
					case 'home':
						$widgetData[$block]['items'] = array(
									array(
										'title' => '<strong>This1</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/toystory_358-270.jpg',
										'link' => '/slider1.html'
									),
									array(
										'title' => '<strong>This2</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/up_358-270.jpg',
										'link' => '/slider2.html'
									),
									array(
										'title' => '<strong>This3</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/walle_358-270.jpg',
										'link' => '/slider3.html'
									),
									array(
										'title' => '<strong>This4</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/nemo_358-270.jpg',
										'link' => '/slider4.html'
									),
								);
						break;
					case 'school':
						$widgetData[$block]['items'] = array(
									array(
										'title' => '<strong>This1</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/toystory.jpg',
										'link' => '/slider1.html'
									),
									array(
										'title' => '<strong>This2</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/up.jpg',
										'link' => '/slider2.html'
									),
									array(
										'title' => '<strong>This3</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/walle.jpg',
										'link' => '/slider3.html'
									),
									array(
										'title' => '<strong>This4</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.',
										'img_path' => '/img/slider/nemo.jpg',
										'link' => '/slider4.html'
									),
								);
						break;
					default:
						break;
				}
				break;
			case 'dailyword':
				$dailyword['title'] = '天天词汇';
				$dailyword['word'] = Tags::findFirst(array(
										"conditions" => "is_cidian = ?1",
										"bind"       => array(1 => 1)
									))->toArray();
				$widgetData = $dailyword;
				break;
			case 'content':
				switch ($block){
					case 'node':
						$content = TreeData::findFirst($this->_params['nid'])->toArray();
						$content['content'] = htmlspecialchars_decode($content['content']);
						$widgetData[$block]['content'] = $content;
						break;
					case 'tag':
						$content = Tags::findFirst($this->_params['tid'])->toArray();
						$content['content'] = htmlspecialchars_decode($content['description']);
						$content['title'] = $content['name'];
						$widgetData[$block]['content'] = $content;
						break;
					default:
						break;
				}
				break;
			case 'cidian':
				$cidianCloudNum = $this->_siteConfig['widgetCfg']['data']['cidianCloudNum'];
				$tags = Tags::fetchCidiansCloud($cidianCloudNum);
				$widgetData = $tags;
				break;
			case 'hangqing':
			case 'lilv':
			case 'tool':
				break;
			case 'taglist':
				$taglist = array();
				$itemPer = $this->_siteConfig['widgetCfg']['data']['listItemPer'];
				$start = ($this->_params['p']-1)*$itemPer;

				if ($this->_params['tagPrefix']){
					$conditions = 'pinyinPrefix="'.$this->_params['tagPrefix'].'" and is_cidian=1';
				} else {
					$conditions = 'is_cidian=1';
				}
				$taglist['items'] = Tags::find(array(
								'conditions' => $conditions,
								'order' => 'id desc',
								'limit' => array('number'=>$itemPer, 'offset'=>$start)
							))->toArray();

				$totalTags = Tags::count($conditions);
				$params = array(
							'total_rows'=>$totalTags,
							'now_page'  =>$this->_params['p'],
							'list_rows' =>$itemPer,
				);
				$pagerLib = new Pager($params);
				$pager = $pagerLib->show(3);
				$taglist['pager'] = $pager;
//				echo '<pre>';print_r($taglist);echo '</pre>';
				$widgetData = $taglist;
				break;
			case 'taglist_header':
				$optRanges = array(97, 122);
				$options = array();
				$options[] = '0-9';
				for($i=$optRanges[0]; $i<$optRanges[1]; $i++){
					$options[] = chr($i);
				}
				$widgetData = $options;
				break;
			case 'list':
				switch ($block){
					case 'node':
						$nodeLists = array();
						$itemPer = $this->_siteConfig['widgetCfg']['data']['listItemPer'];
						$start = ($this->_params['p']-1)*$itemPer;
						$temNodes = TreeStruct::find(array(
										'conditions' => 'lft>?1 and rgt<?2 and type=:type:',
										'bind' => array(1=>$this->_params['node']->lft, 2=>$this->_params['node']->rgt, 'type'=>'article'),
										'limit' => array('number'=>$itemPer, 'offset'=>$start),
										'order' => 'id desc',
									));
						$nodes = array();
						foreach ($temNodes as $key=>$temNode){
							$treeData = $temNode->TreeData->toArray();
							$nodes[$key] = $temNode->toArray();
							$nodes[$key]['TreeData'] = $treeData;
						}
						$nodes = TreeStruct::addNodesAttr($nodes, array('menu'=>true, 'menuLevel'=>1));

						$totalNodes = TreeStruct::count(array(
											'conditions' => 'lft>?1 and rgt<?2 and type=:type:',
											'bind' => array(1=>$this->_params['node']->lft, 2=>$this->_params['node']->rgt, 'type'=>'article'),
										));
						$params = array(
									'total_rows'=>$totalNodes,
									'now_page'  =>$this->_params['p'],
									'list_rows' =>$itemPer,
						);
						$pagerLib = new Pager($params);
						$pager = $pagerLib->show(3);

						$nodeLists['title'] = $this->_params['node']->TreeData->title;
						$nodeLists['pager'] = $pager;
						$nodeLists['items'] = $nodes;

						$widgetData[$block] = $nodeLists;
						break;
					case 'tagnode':
						$tagNodesNum = $this->_siteConfig['widgetCfg']['data']['tagNodesNum'];
						$nodeLists = array();
						if ($tid = $this->_params['tid']){
							$tagNodes = NodeTags::find(array(
											'conditions' => 'tid='.$tid,
											'limit' => $tagNodesNum
										));
							$nodes = array();
							foreach ($tagNodes as $key=>$tagNode){
								$treeStruct = $tagNode->TreeStruct;
								$treeData = $treeStruct->TreeData->toArray();
								$nodes[$key] = $treeStruct->toArray();
								$nodes[$key]['TreeData'] = $treeData;
							}
							$nodes = TreeStruct::addNodesAttr($nodes, array('menu'=>true, 'menuLevel'=>2));
							$nodeLists['items'] = $nodes;
							$nodeLists['title'] = '"'.$this->_params['tag']->name.'" 相关文章';
						}
						$widgetData[$block] = $nodeLists;
						break;
					case 'search':
						$nodeLists = array();
						$keyword = $this->_params['search_keyword'];
						if ($keyword){
							$itemPer = $this->_siteConfig['widgetCfg']['data']['listItemPer'];
							$start = ($this->_params['p']-1)*$itemPer;
							$temNodeDatas = TreeData::find(array(
											'conditions' => 'content like :keyword:',
											'bind' => array('keyword'=>'%'.$keyword.'%'),
											'limit' => array('number'=>$itemPer, 'offset'=>$start),
											'order' => 'id desc',
										));
							$nodes = array();
							foreach ($temNodeDatas as $key=>$temNodeData){
								$treeStruct = $temNodeData->TreeStruct;
								$treeData = $temNodeData->toArray();
								$nodes[$key] = $treeStruct->toArray();
								$nodes[$key]['TreeData'] = $treeData;
							}
							$nodes = TreeStruct::addNodesAttr($nodes, array('menu'=>true, 'menuLevel'=>2));

							$totalNodes = TreeData::count(array(
											'conditions' => 'content like :keyword:',
											'bind' => array('keyword'=>'%'.$keyword.'%'),
										));
							$params = array(
										'total_rows'=>$totalNodes,
										'now_page'  =>$this->_params['p'],
										'list_rows' =>$itemPer,
							);
							$pagerLib = new Pager($params);
							$pager = $pagerLib->show(3);

//							$nodeLists['is_search'] = 1;
							$searchResultStr = $totalNodes ? $totalNodes.' 条记录' : '没有记录';
							$nodeLists['title'] = '"'.$keyword.'" 的搜索结果: '.$searchResultStr;
							$nodeLists['pager'] = $pager;
							$nodeLists['items'] = $nodes;
						}
						$widgetData[$block] = $nodeLists;
						break;
					default:
						break;
				}
				break;
			case 'listGroup':
			case 'navTab':
			case 'panel':
				$widgetData[$block]['blockName'] = $block;
				$widgetData[$block]['items'] = array();
				if (isset($this->_siteConfig['blockCfg']['data'][$view.'_'.$block])){
					$blockParams = $this->_siteConfig['blockCfg']['data'][$view.'_'.$block];
					foreach ($blockParams as $blockParam){
						$nodeLists = array('title'=>$blockParam['title'], 'data'=>array());
						$blockNode = TreeStruct::findFirst($blockParam['nid']);
						$temNodes = TreeStruct::find(array(
												'conditions' => "lft>?1 and rgt<?2 and type=:type:",
												'bind' => array(1=>$blockNode->lft, 2=>$blockNode->rgt, 'type'=>'article'),
												'limit' => $blockNum,
												'order' => 'id desc',
											));
						$nodes = array();
						foreach ($temNodes as $key=>$temNode){
							$treeData = array();
							if ($temNode->TreeData){
								$treeData = $temNode->TreeData->toArray();
							}
							$nodes[$key] = $temNode->toArray();
							$nodes[$key]['TreeData'] = $treeData;
						}
						$nodes = TreeStruct::addNodesAttr($nodes);
						$nodeLists['data'] = $nodes;
						$widgetData[$block]['items'][] = $nodeLists;
					}
				} else {
					$nodeLists = array('title'=>'', 'data'=>array());
					switch ($block){
						case 'hot':
							$nodeLists['title'] = '热门文章';

							$hotNids = array(6864,6867,6884,6886,6888,6903);
							$hotNidsStr = implode(',', $hotNids);
							$temNodes = TreeStruct::find(array(
													'conditions' => "id in (".$hotNidsStr.") and type=:type:",
													'bind' => array('type'=>'article'),
													'order' => 'id asc',
												));
							$nodes = array();
							foreach ($temNodes as $key=>$temNode){
								$treeData = $temNode->TreeData->toArray();
								$nodes[$key] = $temNode->toArray();
								$nodes[$key]['TreeData'] = $treeData;
							}
							$nodes = TreeStruct::addNodesAttr($nodes);
							$nodeLists['data'] = $nodes;
							break;
						case 'relation':
							$nodeLists['title'] = '相关文章';
							if ($this->_params['node']->type == 'article'){
								$temNodes = TreeStruct::find(array(
														'conditions' => "pid=?1 and type=:type:",
														'bind' => array(1=>$this->_params['node']->pid, 'type'=>'article'),
														'limit' => $blockNum,
														'order' => 'id desc',
													));
								$nodes = array();
								foreach ($temNodes as $key=>$temNode){
									$treeData = $temNode->TreeData->toArray();
									$nodes[$key] = $temNode->toArray();
									$nodes[$key]['TreeData'] = $treeData;
								}
								$nodes = TreeStruct::addNodesAttr($nodes);
								$nodeLists['data'] = $nodes;
							}
							break;
						default:
							break;
					}
					$widgetData[$block]['items'][] = $nodeLists;
				}
				break;
			case 'breadcrumb':
				$widgetData = $this->_initBreadcrumb();
				break;

			case 'nodetag':
				$temNodeTags = NodeTags::find(array(
								'conditions' => 'nid=?1',
								'bind' => array(1=>$this->_params['node']->id),
							));
				$nodeTags = array();
				foreach ($temNodeTags as $key=>$temNodeTag){
					$tag = $temNodeTag->Tags->toArray();
					$nodeTags[$key] = $temNodeTag->toArray();
					$nodeTags[$key]['Tags'] = $tag;
				}
				$widgetData = $nodeTags;
				break;
			case 'nodeSiblings':
				$nodeSiblings = array(
					'prev' => array('title'=>'上一篇', 'node'=>array()),
					'next' => array('title'=>'下一篇', 'node'=>array()),
				);
				if ($this->_params['node']->type == 'article'){
					$prevNode = TreeStruct::findFirst(array(
											'conditions' => "lft<?1 and pid=?2 and type=:type:",
											'bind' => array(1=>$this->_params['node']->lft, 2=>$this->_params['node']->pid, 'type'=>'article'),
											'order' => 'lft desc',
										));
					$nextNode = TreeStruct::findFirst(array(
											'conditions' => "lft>?1 and pid=?2 and type=:type:",
											'bind' => array(1=>$this->_params['node']->lft, 2=>$this->_params['node']->pid, 'type'=>'article'),
											'order' => 'lft asc',
										));
					$temNodes = array('prev'=>$prevNode, 'next'=>$nextNode);
					$nodes = array();
					foreach ($temNodes as $key=>$temNode){
						if ($temNode){
							$treeData = $temNode->TreeData->toArray();
							$nodes[$key] = $temNode->toArray();
							$nodes[$key]['TreeData'] = $treeData;
						}
					}
					$nodes = TreeStruct::addNodesAttr($nodes);

					$nodeSiblings['prev']['node'] = $nodes['prev'];
					$nodeSiblings['next']['node'] = $nodes['next'];
				}
				$widgetData = $nodeSiblings;
				break;
			case 'xtSidebars':
				$pNids = array($this->_params['node']->id);
				foreach ($this->_params['nodeParents'] as $nodeParent){
					$pNids[] = $nodeParent->id;
				}
				$xtSidebars = TreeStruct::getXtSidebars($pNids);
				$widgetData = $xtSidebars;
				break;
			case 'search_header':
				$search_result = array();
				$search_result['search_keyword'] = $this->_params['search_keyword'];
				if ($search_result['search_keyword']){
					$search_result['search_result_title'] = '<b>"'.$this->_params['search_keyword'].'</b>" 的搜索结果.';
				} else {
					$search_result['search_result_title'] = '请输入关键字搜索！';
				}

				$widgetData = $search_result;
				break;
			case 'test':
				$result = 'test';
				$widgetData = $result;
				break;
			default:
				break;
		}
		return $widgetData;
	}

}