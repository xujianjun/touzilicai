<?php
include_once 'model.class.php';

class LicaiProduct extends Model{
	public $_table = 'licai_product';
	public function __construct(){
		parent::__construct();
	}

	public function getLicaiProducts($condition = array()){
		$licaiProducts = $this->_db->select($this->_table, $condition);
		return $licaiProducts;
	}

	public function updateLicaiProduct($params){
		$id = $params['id'];
		unset($params['id']);
		if ($id){
			$res = $this->_db->update($this->_table, $params, array('id'=>$id));
		} else {
			$res = $id =  $this->_db->insert($this->_table, $params);
		}
		if (!$id){
			return false;
		}
		return $id;
	}

	public function delLicaiProduct($id){
		$res = $this->_db->delete($this->_table, array('id'=>$id));

		return $res;
	}
}