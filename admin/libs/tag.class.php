<?php
include_once 'model.class.php';

class Tag extends Model{
	public $_table = 'tags';
	public function __construct(){
		parent::__construct();
	}

	public function countTags($condition = array(), $filter=false){
		if ($filter){
			$where = '';
			if ($from_id = $condition['from_id'] && $to_id = $condition['to_id']){
				$where .= $where ? ' and id between '.$from_id.' and '.$to_id : ' id between '.$from_id.' and '.$to_id;
			} elseif ($from_id = $condition['from_id']){
				$where .= $where ? ' and id >= '.$from_id : ' id >= '.$from_id;
			} elseif ($to_id = $condition['to_id']){
				$where .= $where ? ' and id <= '.$to_id : ' id <= '.$to_id;
			}
			if ($title = $condition['title']){
				$where .= $where ? ' and name like "%'.$title.'%"' : ' name like "%'.$title.'%"';
			}
			$sql = 'select count(*) as num from '.$this->_table.' where'.$where.$orderby;
			$tags = $this->_db->query($sql);
		} else {
			$tags = $this->_db->select($this->_table, $condition, '', array('count(*) as num'));
		}
		return $tags[0]['num'];
	}

	public function getTags($condition = array(), $indexKey='', $filter=false, $limit=' limit 0,20'){
		if ($filter){
			$where = '';
			if ($from_id = $condition['from_id'] && $to_id = $condition['to_id']){
				$where .= $where ? ' and id between '.$from_id.' and '.$to_id : ' id between '.$from_id.' and '.$to_id;
			} elseif ($from_id = $condition['from_id']){
				$where .= $where ? ' and id >= '.$from_id : ' id >= '.$from_id;
			} elseif ($to_id = $condition['to_id']){
				$where .= $where ? ' and id <= '.$to_id : ' id <= '.$to_id;
			}
			if ($title = $condition['title']){
				$where .= $where ? ' and name like "%'.$title.'%"' : ' name like "%'.$title.'%"';
			}
			if ($order = $condition['order']){
				$orderby = ' order by '.$order;
			}
			$sql = 'select * from '.$this->_table.' where'.$where.$orderby;
			$tags = $this->_db->query($sql, $indexKey);
		} else {
			$tags = $this->_db->select($this->_table, $condition, $indexKey, array(), '', $limit);
		}
		return $tags;
	}

	public function updateTag($params){
		$id = $params['id'];
		unset($params['id']);
		if ($id){
			$res = $this->_db->update($this->_table, $params, array('id'=>$id));
		} else {
			$res = $this->_db->insert($this->_table, $params);
		}
		return $res;
	}

	public function delTag($id){
		$res = $this->_db->delete($this->_table, array('id'=>$id));
		return $res;
	}
}