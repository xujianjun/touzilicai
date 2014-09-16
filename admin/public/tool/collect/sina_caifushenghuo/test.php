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

$preLinks = array();

$result = mysql_query('select * from collect where sourceName="新浪理财"');
while ($row = mysql_fetch_assoc($result)){
	preg_match('/(.*?)\d{8}.*?/i', $row['source'], $matches);
	$preLink = isset($matches[1]) ? $matches[1] : '';
	if ($preLink && !in_array($preLink, $preLinks)){
		$preLinks[] = $preLink;
	}
}

echo '<pre>';print_r($preLinks);echo '</pre>';
