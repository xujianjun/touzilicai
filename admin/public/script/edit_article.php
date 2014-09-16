<?php

include_once '../init.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$article = array();
if ($id){
	$articles = $articleLib->getArticles(array('id'=>$id));
	$article = $articles[0];

}
$categories = $categoryLib->getCategories();
$tags = $tagLib->getTags();
$selectTagIds = array_keys($article['tags']);
$unselectedTags = array();
foreach ($tags as $key=>$tag){
	if (!in_array($tag['id'], $selectTagIds)){
		$unselectedTags[$key] = $tag;
	}
}

$smarty->assign('article', $article);
$smarty->assign('categories', $categories);
$smarty->assign('unselectedTags', $unselectedTags);
$smarty->display('script/edit_article.html');
