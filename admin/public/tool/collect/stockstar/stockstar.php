<?php

/**
 *
 */
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');
header("Content-type: text/html; charset=gb2312");
$host = 'http://school.stockstar.com';
$linkTxt = 'stockstar_links.txt';
$articleLinks = array();

$navLinks = getNavLinks();
//echo '<pre>';print_r($navLinks);echo '</pre>';

$total = count($navLinks);
$index = 0;
foreach ($navLinks as $navLink){
	$index++;
	$navArticleLinks = getNavArticleLinks($navLink);
	writeToTxt($navArticleLinks);
	echo $index."/".$total." ".$navLink."<br />";
	ob_flush();
	flush();
	//$articleLinks[$navLink] = $navArticleLinks;
}
//echo '<pre>';print_r($articleLinks);echo '</pre>';

function getNavLinks(){
	global $host;
	$startUrl = 'http://school.stockstar.com/list/4067.shtml';
	$navLinks =array();

	$content = file_get_contents($startUrl);
	//收集菜单
	$navPattern = '/<div id="listSidebar">[\s\S]*?<div id="foot08">/i';
	preg_match($navPattern, $content, $matches);
	$navHtml = $matches[0];

	$navHrefPattern = '/<a href="(.*?)">.*?<\/a>/i';
	preg_match_all($navHrefPattern, $navHtml, $matches2);
	//echo '<pre>';print_r($matches2);echo '</pre>';

	$total = count($matches2[0]);
	for($i=0; $i<$total; $i++){
		if (preg_match('/^\/list.*?/i', $matches2[1][$i])){
			$navLinks[] = $host.$matches2[1][$i];
		}
	}
	return $navLinks;
}

function getNavArticleLinks($navLink){
	$navArticleLinks = array();
	$pagerLinks = getPagerLinks($navLink);

	foreach ($pagerLinks as $pagerLink){
		$navArticleLinks = array_merge($navArticleLinks, getArticleLinks($pagerLink));
	}

	return $navArticleLinks;
}

function getPagerLinks($navLink){
	global $host;
	$pagerLinks = array();
	$pagerLinks[] = $navLink;
	$content = file_get_contents($navLink);
	$pagerPattern = '/<div id="pager"[^>]*>[\s\S]*?<div id="listSidebar">/i';
	preg_match($pagerPattern, $content, $matches);
	$pagerHtml = $matches[0];

	$pagerHrefPattern = '/<a[^>]*href="(.*?)"[^>]*>.*?<\/a>/i';
	preg_match_all($pagerHrefPattern, $pagerHtml, $matches2);

	if (count($matches2[1])){
		foreach ($matches2[1] as $link){
			$pagerLinks[] = $host.$link;
		}
	}
	return $pagerLinks;
}

function getArticleLinks($pagerLink){
	$articleLinks = array();
	$articleLinkPattern = '/<a[^>]*href=\'(.*?)\'[^>]*class="subInfoTitle"[^>]*>.*?<\/a>/i';
	$content = file_get_contents($pagerLink);
	preg_match_all($articleLinkPattern, $content, $matches);
	$articleLinks = array_map("add_host", $matches[1]);
	return $articleLinks;
}
function add_host($url){
	global $host;
	return $host.$url;
}
function writeToTxt($navArticleLinks){
	global $linkTxt;
	foreach ($navArticleLinks as $navArticleLink){
		file_put_contents($linkTxt, $navArticleLink."\n", FILE_APPEND);
	}
}


