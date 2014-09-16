<?php

include_once '../init.php';

if (isset($_POST['act'])){
	$act = $_POST['act'];
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	$result = array(0, '参数错误');
	$res = false;
	switch ($act){
		case 'edit_tag':
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$desc = isset($_POST['desc']) ? $_POST['desc'] : '';
			$params = array('id'=>$id, 'name'=>$name, 'description'=>$desc);
			$res = $tagLib->updateTag($params);
			break;
		case 'del_tag':
			$res = $tagLib->delTag($id);
			break;
		default:
			break;
	}
	if ($res){
		$result = array(1, '操作成功');
	}
	$touzilicaiLib->resData($result);
}

$page = isset($_GET['p']) ? $_GET['p'] : 1;
$item_per_page = $config['item_per_page'];
$start = ($page-1)*$item_per_page;
$limit = ' limit '.$start.','.$item_per_page;

//get filter search
$from_id = isset($_COOKIE['tfFromId']) ? $_COOKIE['tfFromId'] : 0;
$to_id = isset($_COOKIE['tfToId']) ? $_COOKIE['tfToId'] : 0;
$title = isset($_COOKIE['tfTitle']) ? $_COOKIE['tfTitle'] : '';
$order = isset($_COOKIE['tfOrder']) ? $_COOKIE['tfOrder'] : 'id';

$conditions = array();
$filter = false;
if ($from_id || $to_id || $title){
	$filter = true;
	$conditions = array(
				'from_id' => $from_id,
				'to_id' => $to_id,
				'title' => $title,
				'order' => $order
			);
}
$totalTags = $tagLib->countTags($conditions, $filter);
$tags = $tagLib->getTags($conditions, '', $filter, $limit);
$smarty->assign('tags', $tags);

$filterKeys = '';
$filterKeys .= $from_id ? ' from_id: '.$from_id.',' : '';
$filterKeys .= $to_id ? ' to_id: '.$to_id.',' : '';
$filterKeys .= $title ? ' 标题: '.$title.',' : '';
$filterKeys .= $order!='id' ? ' 排序: '.$order : '';
$smarty->assign('filterKeys', $filterKeys);

//pager
$params = array(
			'total_rows'=>$totalTags, #(必须)
			'now_page'  =>$page,  #(必须)
			'list_rows' =>$item_per_page, #(可选) 默认为15
);
$pagerLib = new Pager($params);
$pager = $pagerLib->show(3);
$smarty->assign('pager', $pager);

$smarty->display('script/tag.html');
