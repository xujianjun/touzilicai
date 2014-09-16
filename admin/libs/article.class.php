<?php
include_once 'model.class.php';
include_once 'articleTags.class.php';

class Article extends Model{
	public $_table = 'articles';
	public $_tag_table = 'article_tags';
	public $_categoryLib;
	public $_articleTagsLib;
	public $_tagLib;

	public function __construct($categoryLib, $articleTagsLib, $tagLib){
		$this->_categoryLib = $categoryLib;
		$this->_articleTagsLib = $articleTagsLib;
		$this->_tagLib = $tagLib;
		parent::__construct();
	}

	public function countArticles($condition = array(), $filter=false){
		if ($filter){
			$sql = '';
			if ($tids = $condition['tids']){
				$sql = 'select count(*) as num from '.$this->_tag_table.' at left join '.$this->_table.' a on at.aid=a.id where at.tid in ('.$tids.') ';
			} else {
				$sql = 'select count(*) as num from '.$this->_table.' a where 1=1 ';

			}
			if ($from_id = $condition['from_id'] && $to_id = $condition['to_id']){
				$sql .= ' and a.id between '.$from_id.' and '.$to_id ;
			} elseif ($from_id = $condition['from_id']){
				$sql .= ' and a.id >= '.$from_id;
			} elseif ($to_id = $condition['to_id']){
				$sql .= ' and a.id <= '.$to_id;
			}
			if ($title = $condition['title']){
				$sql .= ' and a.title like "%'.$title.'%"';
			}
			if ($cids = $condition['cids']){
				$sql .= ' and a.cid in ('.$cids.')';
			}
			$article = $this->_db->query($sql, '');
		} else {
			$article = $this->_db->select($this->_table, $condition, '', array('count(*) as num'));
		}
		return $article[0]['num'];
	}

	public function getArticles($condition = array(), $indexKey='', $filter=false, $limit=' limit 0,20'){
		if ($filter){
			$sql = '';
			if ($tids = $condition['tids']){
				$sql = 'select a.* from '.$this->_tag_table.' at left join '.$this->_table.' a on at.aid=a.id where at.tid in ('.$tids.') ';
			} else {
				$sql = 'select a.* from '.$this->_table.' a where 1=1 ';

			}
			if ($from_id = $condition['from_id'] && $to_id = $condition['to_id']){
				$sql .= ' and a.id between '.$from_id.' and '.$to_id ;
			} elseif ($from_id = $condition['from_id']){
				$sql .= ' and a.id >= '.$from_id;
			} elseif ($to_id = $condition['to_id']){
				$sql .= ' and a.id <= '.$to_id;
			}
			if ($title = $condition['title']){
				$sql .= ' and a.title like "%'.$title.'%"';
			}
			if ($cids = $condition['cids']){
				$sql .= ' and a.cid in ('.$cids.')';
			}
			if ($order = $condition['order']){
				$sql .= ' order by a.'.$order;
			}
			$sql .= $limit;
			$articles = $this->_db->query($sql, $indexKey);
		} else {
			$articles = $this->_db->select($this->_table, $condition, $indexKey, array(), '', $limit);
		}
		//获取category名称
		$cids = array();
		foreach ($articles as $article){
			if ($cid = $article['cid']){
				$cids[] = $cid;
			}
		}
		if (count($cids)){
			$cids_str = implode(',', $cids);
			$categories = $this->_categoryLib->getCategories('id in ('.$cids_str.')', 'id');
			foreach ($articles as $key=>$article){
				$cid = $article['cid'];
				if (isset($categories[$cid])){
					$articles[$key]['cname'] = $categories[$cid]['title'];
				}
			}
		}

		//获取tag名称
		$aids = $aTags = array();
		foreach ($articles as $article){
			if ($aid = $article['id']){
				$aids[] = $aid;
			}
		}
		if (count($aids)){
			$aids_str = implode(',', $aids);
			$articleTags = $this->_articleTagsLib->getArticleTags('aid in ('.$aids_str.')');

			//tag
			$tags = $tids = array();
			foreach ($articleTags as $articleTag){
				if ($tid = $articleTag['tid']){
					$tids[$tid] = $tid;
				}
			}
			if (count($tids)){
				$tids_str = implode(',', array_keys($tids));
				$tags = $this->_tagLib->getTags('id in ('.$tids_str.')', 'id');
			}

			//组合
			foreach($articleTags as $key=>$articleTags){
				$aid = $articleTags['aid'];
				$tid = $articleTags['tid'];
				$aTags[$aid]['tags'][$tid]['id'] = $tid;
				if (isset($tags[$tid])){
					$aTags[$aid]['tags'][$tid]['name'] = $tags[$tid]['name'];
					$aTags[$aid]['tagShowNames'] .= $aTags[$aid]['tagShowNames'] ? ','.$tags[$tid]['name'] : $tags[$tid]['name'];
				}
			}
		}

		foreach ($articles as $key=>$article){
			$id = $article['id'];
			if (isset($aTags[$id])){
				$articles[$key]['tags'] = $aTags[$id]['tags'];
				$articles[$key]['tagShowNames'] = $aTags[$id]['tagShowNames'];
			}
			//decode content
			$articles[$key]['content'] = htmlspecialchars_decode($article['content']);
		}

		return $articles;
	}

	public function updateArticle($params){
		$id = $params['id'];
		$tids = $params['tids'];
		unset($params['id']);
		unset($params['tids']);
		if ($id){
			$res = $this->_db->update($this->_table, $params, array('id'=>$id));
		} else {
			$res = $id =  $this->_db->insert($this->_table, $params);
		}
		if (!$id){
			return false;
		}
		if ($tids){
			$this->_articleTagsLib->updateArticleTags($id, $tids);
		} else {
			$this->_articleTagsLib->deleteArticleTags($id);
		}
		return $id;
	}

	public function delArticle($id){
		$res = $this->_db->delete($this->_table, array('id'=>$id));
		$this->_articleTagsLib->deleteArticleTags($id);
		return $res;
	}

}