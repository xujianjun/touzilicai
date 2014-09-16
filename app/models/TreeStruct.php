<?php

use Phalcon\Mvc\Model;

class TreeStruct extends Model
{
    public function initialize()
	{
		$this->hasOne('id', 'TreeData', 'id');
		$this->hasMany('id', 'NodeTags', 'nid');
	}

	public static function findRelationTrees($node){
		$node = is_object($node) ? $node->toArray() : $node;
		$relations = array();
		$relations['parent'] = self::find(array(
						'conditions'=>'lft<?1 and rgt>?2 and type=:type:',
						'bind'=>array(1=>$node['lft'], 2=>$node['rgt'], 'type'=>'default'),
						'order'=>'lvl',
					));
		$relations['child'] = self::find(array(
						'conditions'=>'lft>?1 and rgt<?2 and type=:type:',
						'bind'=>array(1=>$node['lft'], 2=>$node['rgt'], 'type'=>'default'),
						'order'=>'lvl',
					));
		return $relations;
	}

	public static function addNodesAttr($nodes, $options=array()){
		$defaultOptions = array('link'=>true, 'menu'=>false, 'menuLevel'=>0);
		$options = array_merge($defaultOptions, $options);

		foreach ($nodes as $key=>$node){
			$nid = $node['id'];
			$relationTreeNodes = self::findRelationTrees($node);
			$nodeParents = $relationTreeNodes['parent'];
			$path = '';
			$menus = array();
			foreach ($nodeParents as $parentNode){
				$menus[] = $parentNode->TreeData->title;
				$ptitle_en = $parentNode->TreeData->title_en;
				if (!$ptitle_en){
					continue;
				}
				$path .= '/'.$ptitle_en;
			}
			if ($options['link']){
				$appfix = '';
				if ($node['type'] == 'article'){
					$appfix = '/'.$node['id'].'.html';
				} else {
					$appfix = $node['TreeData']['title_en'] ? '/'.$node['TreeData']['title_en'].'/' : '/';
				}
				$link = $path.$appfix;
				$nodes[$key]['link'] = $link;
			}
			if ($menus && $node['type'] == 'article' && $options['menu'] && $options['menuLevel']>0){
				$menuStr = '';
				if (count($menus) > $options['menuLevel']){
					$menus = array_slice($menus, -$options['menuLevel']);
				}
				$menuStr = implode(' - ', $menus);
				$nodes[$key]['TreeData']['title'] = '['.$menuStr.'] '.$nodes[$key]['TreeData']['title'];
			}

		}
		return $nodes;
	}

	public function getXtSidebars($pNids){
		$cjxt = TreeData::findFirst(array('conditions'=>'title="财经学堂"'));
		$temXtNodes = TreeStruct::find(array(
									'conditions' => 'lft>?1 and rgt<?2 and type=:type:',
									'bind' => array(1=>$cjxt->TreeStruct->lft, 2=>$cjxt->TreeStruct->rgt, 'type'=>'default'),
									'order' => 'lft'
								));
		$xtNodes = array();
		foreach ($temXtNodes as $key=>$temXtNode){
			$treeData = $temXtNode->TreeData->toArray();
			$xtNodes[$key] = $temXtNode->toArray();
			$xtNodes[$key]['TreeData'] = $treeData;
		}
		$xtNodes = TreeStruct::addNodesAttr($xtNodes);
//		echo '<pre>';print_r($xtNodes);echo '</pre>';die();
		$xtSidebars = array();
		$parent_nid = 0;
		foreach ($xtNodes as $key => $xtNode){
			$nid = $xtNode['id'];
			if (in_array($nid, $pNids)){
				$xtNode['current'] = true;
			}
			if ($xtNode['lvl'] == 3){
				$xtSidebars[$nid] = $xtNode;
				$xtSidebars[$nid]['children'] = array();
				$parent_nid = $nid;
			} else {
				$xtSidebars[$parent_nid]['children'][$nid] = $xtNode;
			}
		}
		return $xtSidebars;
	}
}
