<?php

use Phalcon\Mvc\Model;

class NodeTags extends Model
{
    public function initialize()
	{
		$this->belongsTo('nid', 'TreeStruct', 'id');
		$this->belongsTo('tid', 'Tags', 'id');
	}
}
