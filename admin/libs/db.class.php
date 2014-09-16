<?php

class Db{
	public $conn;
	public static $_db;
	public static $sql;

	public $_db_config = array(
							'host' => '114.215.210.34',
							'port' => '3306',
							'username' => 'root',
							'password' => 'xujj10192917',
							'dbname' => 'touzilicai'
						);

	private function __construct(){
		$this->conn = mysql_connect($this->_db_config['host'],$this->_db_config['username'],$this->_db_config['password']);
        if(!mysql_select_db($this->_db_config['dbname'], $this->conn)){
            echo "数据库连接失败";
        };
        mysql_query('set names utf8',$this->conn);
	}

	public static function getInstance(){
		if (!(self::$_db)){
			self::$_db = new Db();
		}
		return self::$_db;
	}

	public function query($sql, $indexKey=''){
		self::$sql = $sql;
        $result=mysql_query(self::$sql,$this->conn);
        $resultRow = array();
        $i = 0;
        while($row=mysql_fetch_assoc($result)){
        	$index = $indexKey ? $row[$indexKey] : $i;
        	$resultRow[$index] = $row;
            $i++;
        }
        return $resultRow;
	}

	/**
     * 查询数据库
     */
    public function select($table, $condition=array(), $indexKey = '', $field = array(), $orderby='', $limit=''){
        $where='';
        if(!empty($condition)){
        	if (is_string($condition)){
        		$where='where '.$condition;
        	} else {
        		foreach($condition as $k=>$v){
	                $where.=$k."='".$v."' and ";
	            }
	            $where='where '.$where .'1=1';
        	}
        }
        $fieldstr = '';
        if(!empty($field)){
            foreach($field as $k=>$v){
                $fieldstr.= $v.',';
            }
             $fieldstr = rtrim($fieldstr,',');
        }else{
            $fieldstr = '*';
        }
        self::$sql = "select {$fieldstr} from {$table} {$where} {$orderby} {$limit}";
        $result=mysql_query(self::$sql,$this->conn);
        $resultRow = array();
        $i = 0;
        while($row=mysql_fetch_assoc($result)){
        	$index = $indexKey ? $row[$indexKey] : $i;
        	$resultRow[$index] = $row;
            $i++;
        }
        return $resultRow;
    }

    /**
     * 添加一条记录
     */
    public function insert($table,$data){
        $values = '';
        $datas = '';
        foreach($data as $k=>$v){
            $values.=$k.',';
            $datas.="'$v'".',';
        }
        $values = rtrim($values,',');
        $datas   = rtrim($datas,',');
        self::$sql = "INSERT INTO {$table} ({$values}) VALUES ({$datas})";
        if(mysql_query(self::$sql)){
            return mysql_insert_id();
        }else{
            return false;
        };
     }

     /**
      * 修改一条记录
      */
    public function update($table,$data,$condition=array()){
        $where='';
        if(!empty($condition)){
            foreach($condition as $k=>$v){
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }
        $updatastr = '';
        if(!empty($data)){
            foreach($data as $k=>$v){
                $updatastr.= $k."='".$v."',";
            }
            $updatastr = 'set '.rtrim($updatastr,',');
        }
        self::$sql = "update {$table} {$updatastr} {$where}";
        return mysql_query(self::$sql);
    }

    /**
     * 删除记录
     */
    public function delete($table,$condition){
        $where='';
        if(!empty($condition)){
            foreach($condition as $k=>$v){
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }
        self::$sql = "delete from {$table} {$where}";
        return mysql_query(self::$sql);
    }

    public static function getLastSql(){
        echo self::$sql;
    }

}