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


$result = mysql_query('select * from collect where sourceName="东方财富理财规划" and title="" order by id asc limit 1');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$id = $row['id'];
	$aUrl = $row['source'];
	$status = $row['status'];
//	echo 'url:'.$aUrl.'<br>';
	$aDetails = fetchADetails($aUrl);
	echo '<pre>';print_r($aDetails);echo '</pre><hr>';
	$newStatus = $status+1;

	$sql = 'update collect set title="'.$aDetails['title'].'",content="'.$aDetails['content'].'",category="'.$aDetails['category'].'",tag="",date="'.$aDetails['date'].'",fromWhere="",status='.$newStatus.' where id='.$id;
//	echo $sql.'<br>';
//	mysql_query($sql) or die("Invalid query: " . mysql_error());
	echo $index.'/'.$total.'<br>';

	ob_flush();
	flush();

}


function fetchADetails($startUrl){
	global $types;
	$aDetails = array();
	$content = file_get_contents($startUrl);
	$content = mb_convert_encoding($content, 'utf-8', 'gb2312');
	$titlePattern = '/<h1>(.*?)<\/h1>/i';
	$datePattern = '/<div class="Info">([\s\S]*?)<\/div>/i';

	$contentPattern = '/<div id="ContentBody"[^>]*>([\s\S]*?)<\/div>[^<>]*<div class="BodyEnd">/i';
	$clearCommentPattern = '/<!--.*?-->/i';
	$clearContentDivPattern = '/<div[^>]*>[\s\S]*?<\/div>/i';
	$contentClearLinkPattern = '/<a[^>]*href=[^>]*>(.*?)<\/a>/i';
	$contentSpanPattern = '/<span[^>]*>(.*?)<\/span>/i';
	$contentEditorPattern = '/<p[^>]*>[^>]*?责任编辑[^>]*?<\/p>/';
	$contentCenterPattern = '/<center>.*?<\/center>/';

	$aDetails['category'] = "理财规划";

	preg_match($titlePattern, $content, $title_matches);
	$title = isset($title_matches[1]) ? $title_matches[1] : '';
	$aDetails['title'] = $title;

	preg_match($datePattern, $content, $date_matches);
	$date = isset($date_matches[1]) ? $date_matches[1] : '';
	$date = strip_tags($date);
	$date = str_replace('www.eastmoney.com', '', $date);
	$aDetails['date'] = trim($date);


	preg_match($contentPattern, $content, $content_matches);
	$articleContent = $content_matches[1];
	echo $articleContent.'<hr>';
	$articleContent = preg_replace($clearCommentPattern, '', $articleContent);
	$articleContent = preg_replace($clearContentDivPattern, '', $articleContent);
	$articleContent = preg_replace($contentCenterPattern, '', $articleContent);
	$articleContent = preg_replace($contentEditorPattern, '', $articleContent);
	$articleContent = preg_replace($contentClearLinkPattern, "\$1", $articleContent);
	$articleContent = preg_replace($contentSpanPattern, "\$1", $articleContent);

	$articleContent = trim($articleContent);
	$aDetails['content'] = htmlspecialchars($articleContent);
	return $aDetails;
}
