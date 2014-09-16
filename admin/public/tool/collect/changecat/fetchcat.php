<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

$linkTxt = 'fetchcat.txt';

$lnk = mysql_connect('114.215.210.34', 'root', 'xujj10192917')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");


$result = mysql_query('select * from articles group by src,src_category');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;

	$line = $index.'::src:'.$row['src'].',src_cat:'.$row['src_category'].',cid:';
	echo $line.'<br>';
	writeToTxt($line);
	ob_flush();
	flush();
}
function writeToTxt($line){
	global $linkTxt;
	//file_put_contents($linkTxt, $line."\n", FILE_APPEND);
}


