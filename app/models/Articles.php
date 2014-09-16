<?php

use Phalcon\Mvc\Model;

class Articles extends Model
{
    public function initialize()
	{
		$this->belongsTo('cid', 'Categories', 'id');
		$this->hasMany('id', 'ArticleTags', 'aid');
	}

	public static function addLink($articles){
		foreach ($articles as $key=>$article){
			$aid = $article['id'];
			$catlink = Categories::getCatPath($article['cid']);
			$link = $catlink ? $catlink.'/'.$aid.'.html' : '/'.$aid.'.html';
			$articles[$key]['link'] = '/'.$link;
		}
		return $articles;
	}
}
