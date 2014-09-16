<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

$lnk = mysql_connect('114.215.210.34', 'root', 'xujj10192917')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");


$result = mysql_query('select * from collect where sourceName="新浪理财故事" and content="" order by id asc limit 100');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
//	echo '<pre>';print_r($row);echo '</pre>';
	$index++;
	$id = $row['id'];
	$aUrl = $row['source'];
	$status = $row['status'];
	$aDetails = fetchADetails($aUrl);
//	echo '<pre>';print_r($aDetails);echo '</pre><hr>';
	$newStatus = $status+1;

	$sql = 'update collect set title="'.$aDetails['title'].'",content="'.$aDetails['content'].'",category="'.$aDetails['category'].'",tag="",date="'.$aDetails['date'].'",fromWhere="'.$aDetails['from'].'",status='.$newStatus.' where id='.$id;
	echo $sql.'<br>';
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
	$titlePattern = '/<h1 id="artibodyTitle"[^>]*>(.*?)<\/h1>/i';
	$datePattern = '/<span id="pub_date">([\s\S]*?)<\/span>/i';
	$fromPattern = '/<span id="media_name"[^>]*>([\s\S]*?)<\/span>/i';
	$typePattern = '/<div class="blkBreadcrumbLink"[^>]*>([\s\S]*?)<\/div>/';

	$contentPattern = '/<div[^>]*id="artibody"[^>]*>([\s\S]*?)<!-- publish_helper_end -->/i';
	$clearCommentPattern = '/<!--.*?-->/i';
	$clearContentDivPattern = '/<div[^>]*>[\s\S]*?<\/div>/i';
	$contentClearLinkPattern = '/<a[^>]*href=[^>]*>(.*?)<\/a>/i';
	$contentClearWeiboLinkPattern = '/\[微博\]/i';
	$contentSpanPattern = '/<span[^>]*>(.*?)<\/span>/i';
	$clearContentIframePattern = '/<iframe[^>]*>[\s\S]*?<\/iframe>/i';
	$clearContentScriptPattern = '/<script[^>]*>[\s\S]*?<\/script>/i';

	$aDetails['category'] = "理财攻略";

	/*preg_match($typePattern, $content, $type_matches);
	$type = isset($type_matches[1]) ? $type_matches[1] : '';
	$type = strip_tags($type);
	$typeArrs = explode('&gt;', $type);
	$type = isset($typeArrs[1]) ? trim($typeArrs[1], '&nbsp;') : '';
	$aDetails['type'] = $type;*/

	preg_match($titlePattern, $content, $title_matches);
	$title = isset($title_matches[1]) ? $title_matches[1] : '';
	$title = str_replace('"', '', $title);
	$aDetails['title'] = $title;

	preg_match($datePattern, $content, $date_matches);
//	echo '<pre>';print_r($date_matches);echo '</pre>';
	$date = isset($date_matches[1]) ? $date_matches[1] : '';
	$aDetails['date'] = $date;

	preg_match($fromPattern, $content, $from_matches);
	$from = isset($from_matches[1]) ? $from_matches[1] : '';
	$from = strip_tags($from);
	$from = str_replace('微博', '', $from);
	$aDetails['from'] = trim($from);


	preg_match($contentPattern, $content, $content_matches);
	$articleContent = $content_matches[1];
	$articleContent = preg_replace($clearCommentPattern, '', $articleContent);
	$articleContent = preg_replace($clearContentDivPattern, '', $articleContent);
	$articleContent = preg_replace($contentClearLinkPattern, "\$1", $articleContent);
	$articleContent = preg_replace($contentClearWeiboLinkPattern, '', $articleContent);
//	$articleContent = preg_replace($clearContentIframePattern, '', $articleContent);
//	$articleContent = preg_replace($clearContentScriptPattern, '', $articleContent);
	$articleContent = preg_replace($contentSpanPattern, "\$1", $articleContent);

	$articleContent = trim($articleContent);
	$aDetails['content'] = htmlspecialchars($articleContent);
	return $aDetails;
}
