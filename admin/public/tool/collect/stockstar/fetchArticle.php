<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

$lnk = mysql_connect('localhost', 'root', '123456')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");

$types = array(
			'gp' => '股票',
			'jj' => '基金',
			'zp' => '债券',
			'yh' => '银行',
			'qqz' => '权证',
			'gg' => '港股',
			'wh' => '外汇',
			'gz' => '期指',
			'qh' => '期货',
			'hj' => '黄金'
		);

$result = mysql_query('select * from stockstar where title="" order by id asc limit 100');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$id = $row['id'];
	$aUrl = $row['source'];
	$status = $row['status'];
	$aDetails = fetchADetails($aUrl);
	$newStatus = $status+1;

	$sql = 'update stockstar set title="'.$aDetails['title'].'",content="'.$aDetails['content'].'",category="'.$aDetails['type'].'-'.$aDetails['category'].'",tag="'.$aDetails['type'].'",status='.$newStatus.' where id='.$id;
//	echo $sql.'<br>';
	mysql_query($sql) or die("Invalid query: " . mysql_error());
	echo $index.'/'.$total.'<br>';
//	echo '<pre>';print_r($aDetails);echo '</pre>';

	ob_flush();
	flush();

}


function fetchADetails($startUrl){
	global $types;
	$aDetails = array();
	$content = file_get_contents($startUrl);
	$content = mb_convert_encoding($content, 'utf-8', 'gb2312');
	$typeTagPattern = '/tag =\'(.*?)\'/i';
	$catContentPattern = '/<span id="mpos2">[\s\S]*?<\/span>/i';
	$catPattern = '/<a href=[^>]*>(.*?)<\/a>/i';
	$articlePattern = '/<div id="listPageContent">[\s\S]*?<div id="listSidebar">/i';
	$titlePattern = '/<div class="middle">(.*?)<\/div>/i';
	$clearContentDivPattern = '/<div id="NewsPages"[^>]*>[\s\S]*?<\/div>/i';
	$contentPattern = '/<div class="viewInfo"[^>]*>([\s\S]*?)<\/div>/i';
	$contentClearLinkPattern = '/<a[^>]*href="[^>]*stockstar\.com[^>]*"[^>]*>(.*?)<\/a>/i';

	preg_match($typeTagPattern, $content, $typetag_matches);
	$tag = $typetag_matches[1];
	$typePattern = '/<div id="'.$tag.'"[^>]*>(.*?)<\/div>/i';
	preg_match($typePattern, $content, $type_matches);
	$type = isset($type_matches[1]) ? $type_matches[1] : '';
	$aDetails['type'] = $type;

	preg_match($catContentPattern, $content, $catContent_matches);
	preg_match($catPattern, $catContent_matches[0], $cat_matches);
	$catName = isset($cat_matches[1]) ? $cat_matches[1] : '';
	$aDetails['category'] = $catName;

	preg_match($articlePattern, $content, $articleContent_matches);
	$articleContent = $articleContent_matches[0];
	$articleContent = preg_replace($clearContentDivPattern, '', $articleContent);
	preg_match($titlePattern, $articleContent, $title_matches);
	$title = isset($title_matches[1]) ? $title_matches[1] : '';
	$title = str_replace('"', '', $title);
	$aDetails['title'] = $title;

	preg_match($contentPattern, $articleContent, $content_matches);
	$content = $content_matches[1];
	$content = preg_replace($contentClearLinkPattern, "\$1", $content);
	$content = trim($content);
	$aDetails['content'] = htmlspecialchars($content);
	return $aDetails;
}
