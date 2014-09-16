<?php

class tag
{
	protected $db = null;
	protected $options = null;
	protected $default = array(
		'tag_table'	=> 'tags',		// the structure table (containing the id, left, right, level, parent_id and position fields)
		'tag_node_table'	=> 'node_tags',		// table for additional fields (apart from structure ones, can be the same as structure_table)
		'node2tag'	=> 'nid',			// which field from the data table maps to the structure table
	);
	protected $tagObj = null;

	public function __construct(\vakata\database\IDB $db, array $options = array()) {
		$this->db = $db;
		$this->options = array_merge($this->default, $options);
	}

	public function get_tags($nid){
		$sql = "
				SELECT
					tn.*, t.*
				FROM
					".$this->options['tag_node_table']." tn,
					".$this->options['tag_table']." t
				WHERE
					tn.".$this->options['node2tag']." = ".(int)$nid." AND
					tn.tid = t.id
				ORDER BY
					t.id"
			;
		return $this->db->all($sql);
	}

	public function get_unselected_tags($nodeTags){
		$tids = array();
		foreach ($nodeTags as $nodeTag){
			$tids[] = $nodeTag['id'];
		}
		$tidStr = implode(',', $tids);
		$where = '';
		if ($tidStr){
			$where = ' where id not in ('.$tidStr.') ';
		}
		$sql = "
				SELECT
					*
				FROM
					".$this->options['tag_table'].$where."
				ORDER BY
					id"
			;
		return $this->db->all($sql);
	}

	public function updateNodeTags($nid, $tids){
		$deleteSql = 'delete from '.$this->options['tag_node_table'].' where '.$this->options['node2tag'].'='.$nid;
		$this->db->query($deleteSql);

		$tidArrs = explode('|', $tids);
		foreach ($tidArrs as $tid){
			$insertSql = 'insert into '.$this->options['tag_node_table'].' values ('.$nid.','.$tid.')';
			$this->db->query($insertSql);
		}
	}

}