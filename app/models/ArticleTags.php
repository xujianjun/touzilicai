<?php

use Phalcon\Mvc\Model;

class ArticleTags extends Model
{
    public function initialize()
	{
		$this->belongsTo('aid', 'Articles', 'id');
		$this->belongsTo('tid', 'Tags', 'id');
	}
}
