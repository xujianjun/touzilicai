<?php

include_once '../init.php';

if (isset($_POST['act'])){
	$act = $_POST['act'];
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	$result = array(0, '参数错误');
	$res = false;
	switch ($act){
		case 'edit_article':
			$title = isset($_POST['title']) ? $_POST['title'] : '';
			$content = isset($_POST['content']) ? $_POST['content'] : '';
			$cid = isset($_POST['cid']) ? $_POST['cid'] : 0;
			$tids = isset($_POST['tids']) ? $_POST['tids'] : '';
			$params = array('id'=>$id, 'title'=>$title, 'content'=>$content, 'cid'=>$cid, 'tids'=>$tids);
			$id = $articleLib->updateArticle($params);
			if ($id){
				$result = array(1, '编辑成功', $id);
				$touzilicaiLib->resData($result);
			}
			break;
		case 'del_article':
			$res = $articleLib->delArticle($id);
			break;
		case 'edit_multi_article':
			$cid = isset($_POST['cid']) ? $_POST['cid'] : 0;
			$ids = isset($_POST['ids']) ? $_POST['ids'] : '';

			$idArrs = explode(',', $ids);
			if (!$cid || !$ids || !count($idArrs)){
				$touzilicaiLib->resData($result);
			}
			foreach ($idArrs as $id){
				$params = array('id'=>$id, 'cid'=>$cid);
				$articleLib->updateArticle($params);
			}
			$res = 1;
			break;
		default:
			break;
	}
	if ($res){
		$result = array(1, '操作成功');
	}
	$touzilicaiLib->resData($result);
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id){
	$articles = $articleLib->getArticles(array('id'=>$id));
	$article = $articles[0];
	$smarty->assign('article', $article);
	$smarty->display('script/article.html');
	exit();
}

$page = isset($_GET['p']) ? $_GET['p'] : 1;
$item_per_page = $config['item_per_page'];
$start = ($page-1)*$item_per_page;
$limit = ' limit '.$start.','.$item_per_page;

//get filter search
$from_id = isset($_COOKIE['afFromId']) ? $_COOKIE['afFromId'] : 0;
$to_id = isset($_COOKIE['afToId']) ? $_COOKIE['afToId'] : 0;
$title = isset($_COOKIE['afTitle']) ? $_COOKIE['afTitle'] : '';
$cids = isset($_COOKIE['afCids']) ? $_COOKIE['afCids'] : '';
$tids = isset($_COOKIE['afTids']) ? $_COOKIE['afTids'] : '';
$order = isset($_COOKIE['afOrder']) ? $_COOKIE['afOrder'] : 'id';

$conditions = array();
$filter = false;
if ($from_id || $to_id || $title || $cids || $tids){
	$filter = true;
	$conditions = array(
				'from_id' => $from_id,
				'to_id' => $to_id,
				'title' => $title,
				'cids' => $cids,
				'tids' => $tids,
				'order' => $order
			);
}
$totalArticles = $articleLib->countArticles($conditions, $filter);
$articles = $articleLib->getArticles($conditions, '', $filter, $limit);
$smarty->assign('articles', $articles);

$filterKeys = '';
$filterKeys .= $from_id ? ' from_id: '.$from_id.',' : '';
$filterKeys .= $to_id ? ' to_id: '.$to_id.',' : '';
$filterKeys .= $title ? ' 标题: '.$title.',' : '';

$categories = $categoryLib->getCategories();
$tags = $tagLib->getTags();
if ($cids){
	$cidStrs = '';
	$cidArrs = explode(',', $cids);
	foreach ($categories as $key=>$category){
		if (in_array($category['id'], $cidArrs)){
			$categories[$key]['selected'] = true;
			$cidStrs .= $cidStrs ? ','.$category['title'] : '';
		}
	}
	$filterKeys .= ' 分类：'.$cidStrs;
}
if ($tids){
	$tidStrs = '';
	$tidArrs = explode(',', $tids);
	foreach ($tags as $key=>$tag){
		if (in_array($tag['id'], $tidArrs)){
			$tags[$key]['selected'] = true;
			$tidStrs .= $tidStrs ? ', 排序：'.$tag['name'] : '';
		}
	}
	$filterKeys .= ' 标签：'.$tidStrs;
}
$filterKeys .= $order!='id' ? ' 排序: '.$order : '';
$smarty->assign('categories', $categories);
$smarty->assign('tags', $tags);
$smarty->assign('filterKeys', $filterKeys);

//pager
$params = array(
			'total_rows'=>$totalArticles, #(必须)
			'now_page'  =>$page,  #(必须)
			'list_rows' =>$item_per_page, #(可选) 默认为15
);
$pagerLib = new Pager($params);
$pager = $pagerLib->show(3);
$smarty->assign('pager', $pager);

$smarty->display('script/articles.html');
