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

$cids = array();
$result = mysql_query('select * from categories where level=3');
while ($row = mysql_fetch_assoc($result)){
	$cids[] = $row['id'];
}

$result = mysql_query('select * from articles where cid=0 limit 3000');
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$key = mt_rand(0, count($cids)-1);
	$cid = $cids[$key];
	$updatesql = 'update articles set cid='.$cid.' where id='.$row['id'];
//	echo $updatesql.'<br>';
	mysql_query($updatesql) or die("Invalid query: " . mysql_error());
	echo $index.'<br>';
	ob_flush();
	flush();
}

