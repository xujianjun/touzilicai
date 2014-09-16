<?php
include_once 'model.class.php';

class Category extends Model{
	public $_table = 'categories';
	public function __construct(){
		parent::__construct();
	}

	public function getCategories($condition = array(), $indexKey=''){
		$categories = $this->_db->select($this->_table, $condition, $indexKey);
		return $categories;
	}
}