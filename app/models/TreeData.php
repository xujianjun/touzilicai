<?php

use Phalcon\Mvc\Model;

class TreeData extends Model
{
    public function initialize()
	{
		$this->hasOne('id', 'TreeStruct', 'id');
	}

}
