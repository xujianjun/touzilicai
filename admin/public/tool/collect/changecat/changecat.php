<?php
die();
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

$changecats = file('fetchcat.txt');
//echo '<pre>';print_r($changecats);echo '</pre>';
$changeArrs = array();
foreach ($changecats as $changecat){
	$changeStr = preg_replace('/^\d+::/i', '', $changecat);
	$exArr1 = explode(',', $changeStr);
	$changeArr = array();
	foreach ($exArr1 as $value){
		$exArr2 = explode(':', $value);
		$changeArr[$exArr2[0]] = $exArr2[1];
	}
	$changeArrs[] = $changeArr;
}
//echo '<pre>';print_r($changeArrs);echo '</pre>';

foreach ($changeArrs as $key=>$value){
	$cid = (int)$value['cid'];
	if ($cid){
		$upsql = 'update articles set cid='.$cid.' where src="'.$value['src'].'" and src_category="'.$value['src_cat'].'"';
		mysql_query($upsql);
		echo $key.' 完成: '.$upsql.'<br>';
		ob_flush();
		flush();
	}
}

/*$result = mysql_query('select * from articles group by src,src_category');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;

	$line = $index.'::src:'.$row['src'].',src_cat:'.$row['src_category'].',cid:';
	echo $line.'<br>';
	writeToTxt($line);
	ob_flush();
	flush();
}*/



