<?php

use Phalcon\Mvc\Model;

class Categories extends Model
{
    public function initialize()
	{
		$this->hasMany('id', 'Articles', 'cid');
	}

	public function findBaseTitle($urlCTitle){
		$category = Categories::findFirst(array(
												'conditions'=>'title_en=:title_en:',
												'bind'=>array('title_en'=>$urlCTitle[0])
											));
		if (isset($urlCTitle[1]) && $urlCTitle[1]){
			$category = Categories::findFirst(array(
												'conditions' => 'title_en=:title_en: and parent_id=?1',
												'bind' => array('title_en'=>$urlCTitle[1], 1=>$category->id),
											));
		}
		return $category;
	}

	public function getXtSidebars(){
		$cjxt = Categories::findFirst(array('conditions'=>'title="财经学堂"'));
		$xtCats = Categories::find(array(
									'conditions' => 'lpoint>'.$cjxt->lpoint.' and rpoint<'.$cjxt->rpoint,
									'order' => 'lpoint'
								))->toArray();

		$xtSidebars = array();
		$parent_cid = 0;
		foreach ($xtCats as $key => $xtCat){
			$cid = $xtCat['id'];
			if ($xtCat['level'] == 3){
				$xtSidebars[$cid] = $xtCat;
				$xtSidebars[$cid]['children'] = array();
				$parent_cid = $cid;
			} else {
				$xtSidebars[$parent_cid]['children'][$cid] = $xtCat;
			}
		}
		return $xtSidebars;
	}

	public static function getCatPath($cid){
		$catPath = '';
		$category = Categories::findFirst(array('conditions'=>'id=?1', 'bind'=>array(1=>$cid)));
		if ($category->level>=2){
			$cats = Categories::find(array(
											'conditions'=>'lpoint<=?1 and rpoint>=?2 and level>=?3 and level<=?4',
											'bind'=>array(1=>$category->lpoint, 2=>$category->rpoint, 3=>2, 4=>3),
											'order'=>'level',
										))->toArray();;
			foreach($cats as $cat){
				$catPath .= $catPath ? '/'.$cat['title_en'] : $cat['title_en'];
			}
		}
		return $catPath;
	}


}
