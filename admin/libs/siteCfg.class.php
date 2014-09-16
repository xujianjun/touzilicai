<?php
include_once 'model.class.php';

class SiteCfg extends Model{
	public $_table = 'site_config';
	public function __construct(){
		parent::__construct();
	}

	public function getSiteCfgs(){
		$siteCfgs = $this->_db->select($this->_table, null, 'type');
		foreach ($siteCfgs as $key=>$siteCfg){
			$siteCfgs[$key]['data'] = json_decode($siteCfg['data'], true);
		}
		return $siteCfgs;
	}

	public function saveSiteCfgs($params){
		$data = array(
				'type' => $params['type'],
				'data' => $params['data'],
				'update_time' => time()
			);
		$rows = $this->_db->select($this->_table, array('type' => $params['type']));
		if (count($rows)){
			unset($data['type']);
			$res = $this->_db->update($this->_table, $data, array('type'=>$params['type']));
		} else {
			$res = $this->_db->insert($this->_table, $data);
		}

		return $res;
	}
}