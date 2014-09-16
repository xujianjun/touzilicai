<?php
include_once 'db.class.php';

abstract class Model {
	public $_db;
    public function __construct(){
		$this->_db = Db::getInstance();
	}
}
?>