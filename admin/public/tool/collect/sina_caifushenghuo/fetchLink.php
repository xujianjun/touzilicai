<?php
//die();
/**
 *
 */
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header("Content-type: text/html; charset=gb2312");
$baseUrl = 'http://roll.finance.sina.com.cn/finance/lc1/cfgs/index_';
$linkTxt = 'sinalinks.txt';
$tag = $category = '理财故事';
$articleLinks = array();

$totalPages =68;
$allArticleLinks = array();
for($i=6; $i<=$totalPages; $i++){
	$pagerLink = $baseUrl.$i.'.shtml';
	$articleLinks = getArticleLinks($pagerLink);
//	$allArticleLinks = array_merge($allArticleLinks, $articleLinks);
//	echo '<pre>';print_r($articleLinks);echo '</pre>';
	writeToTxt($articleLinks);
	echo $i.'/'.$totalPages.': '.$pagerLink.', total:'.count($articleLinks).'<br>';
	ob_flush();
	flush();
}

function getArticleLinks($pagerLink){
	$articleLinks = array();
	$listContentPattern = '/<div class="hs01"><\/div>[\s\S]*?<div class="hs01"><\/div>/i';
	$linkPattern = '/<a href="(.*?)"[^>]*>.*?<\/a>/i';

	$content = file_get_contents($pagerLink);
	preg_match($listContentPattern, $content, $matches);
	$listContent = $matches[0];
	if ($listContent){
		preg_match_all($linkPattern, $listContent, $matches);
		$articleLinks = $matches[1];
	}

	return $articleLinks;
}
function writeToTxt($articleLinks){
	global $linkTxt;
	foreach ($articleLinks as $articleLink){
		file_put_contents($linkTxt, $articleLink."\n", FILE_APPEND);
	}
}
