<?php
die();
/**
 *
 */
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header("Content-type: text/html; charset=gb2312");
$baseUrl = 'http://info.stockstar.com/info/dic/';
$pagerLink = 'http://info.stockstar.com/info/dic/left2.htm';
$linkTxt = 'tag.txt';
$articleLinks = array();

$tagLinks = getTagLinks($pagerLink);
//echo '<pre>';print_r($tagLinks);echo '</pre>';
writeToTxt($tagLinks);


function getTagLinks($pagerLink){
	$tagLinks = array();
	$listPattern = '/<div class=clSub>[\s\S]*?<\/div>/i';
	$linkPattern = '/<a href="(.*?)"[^>]*>.*?<\/a>/i';

	$content = file_get_contents($pagerLink);
	preg_match($listPattern, $content, $matches);
	$listContent = $matches[0];
	if ($listContent){
		preg_match_all($linkPattern, $listContent, $matches);
		$tagLinks = $matches[1];
	}

	return $tagLinks;
}
function writeToTxt($tagLinks){
	global $linkTxt, $baseUrl;
	foreach ($tagLinks as $tagLink){
		$url = $baseUrl.$tagLink;
		file_put_contents($linkTxt, $url."\n", FILE_APPEND);
	}
}
