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


$result = mysql_query('select * from tags where sourceName="证券之星-词典" and name="" order by id asc limit 500');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$id = $row['id'];
	$tUrl = $row['source'];
	$status = $row['status'];
//	echo 'url:'.$aUrl.'<br>';
	$tagDesc = fetchTagDesc($tUrl);
//	echo '<pre>';print_r($aDetails);echo '</pre><hr>';
	$newStatus = $status+1;

	$sql = 'update tags set name="'.$tagDesc['name'].'",description="'.$tagDesc['desc'].'",status='.$newStatus.' where id='.$id;
//	echo $sql.'<br>';
	mysql_query($sql) or die("Invalid query: " . mysql_error());
	echo $index.'/'.$total.'<br>';

	ob_flush();
	flush();

}


function fetchTagDesc($tUrl){
	$tagDesc = array();
	$content = file_get_contents($tUrl);
	$content = mb_convert_encoding($content, 'utf-8', 'gb2312');

	$contentPattern = '/<div class=content>[\s\S]*?<\/div>/i';

	preg_match($contentPattern, $content, $matches);
	$tagContent = strip_tags($matches[0]);
	$tagContents = explode('——', $tagContent);
	$tagDesc['name'] = trim(trim($tagContents[0], '&nbsp;'));
	$tagDesc['desc'] = trim(trim($tagContents[1], '&nbsp;'));


	return $tagDesc;
}
