<?php

use Phalcon\Mvc\Model;

class Tags extends Model
{
    public function initialize()
	{
		$this->hasMany('id', 'ArticleTags', 'tid');
	}

	public function fetchCidiansCloud($cidianCloudNum){
		$totalTags = Tags::count(array(
									'is_cidian'=>1,
//									'published'=>1
								));
		$randStart = mt_rand(0, $totalTags-$cidianCloudNum);
		$tags = Tags::find(array(
							'is_cidian'=>1,
//							'published'=>1,
							'limit'=>array(
								'number'=>$cidianCloudNum,
								'offset'=>$randStart
							)
						))->toArray();

		$cidianClouds = array(3, 10);
		foreach ($tags as $key=>$tag){
			$cloudSize = mt_rand($cidianClouds[0], $cidianClouds[1]);
			$tags[$key]['cloudSize'] = $cloudSize;
		}
		return $tags;
	}
}
