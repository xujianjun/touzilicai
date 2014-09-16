<?php
include_once 'model.class.php';

class ArticleTags extends Model{
	public $_table = 'article_tags';
	public function __construct(){
		parent::__construct();
	}

	public function getArticleTags($condition, $indexKey=''){
		$articleTags = $this->_db->select($this->_table, $condition, $indexKey);
		return $articleTags;
	}

	public function updateArticleTags($aid, $tids){
		$res = false;
		$delRes = $this->deleteArticleTags($aid);
		if ($delRes){
			$this->addArticleTags($aid, $tids);
			$res = true;
		}
		return $res;
	}

	public function deleteArticleTags($aid){
		$res = $this->_db->delete($this->_table, array('aid'=>$aid));
		return $res;
	}

	public function addArticleTags($aid, $tids){
		$tidArrs = explode('|', $tids);
		foreach ($tidArrs as $tid){
			$data = array('aid'=>$aid, 'tid'=>$tid);
			$this->_db->insert($this->_table, $data);
		}
	}
}