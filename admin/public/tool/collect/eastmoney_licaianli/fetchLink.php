<?php

/**
 *
 */
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header("Content-type: text/html; charset=gb2312");
$baseUrl = 'http://money.eastmoney.com/news/clcal_';
$linkTxt = 'eastmoney.txt';
$articleLinks = array();

$totalPages =4;
$allArticleLinks = array();
for($i=1; $i<=$totalPages; $i++){
	$pagerLink = $baseUrl.$i.'.html';
	$articleLinks = getArticleLinks($pagerLink);
	$allArticleLinks = array_merge($allArticleLinks, $articleLinks);
//	echo '<pre>';print_r($articleLinks);echo '</pre>';
	writeToTxt($articleLinks);
	echo $i.'/'.$totalPages.': '.$pagerLink.'<br>';
	ob_flush();
	flush();
}

function getArticleLinks($pagerLink){
	$articleLinks = array();
	$listContentPattern = '/<div class="mod-list">[\s\S]*?<div class="PageBox">/i';
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
