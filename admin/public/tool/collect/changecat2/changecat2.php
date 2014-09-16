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

$catIds = array(13,14,15,16,66,34,35,36,26,27,28,29,30,63,64,65);
for($i=34;$i<62;$i++){
	$catIds[] = $i;
}
echo '<pre>';print_r($catIds);echo '</pre>';

$cids = array();
foreach ($catIds as $catId){
	$result = mysql_query('select count(*) as num from articles where cid='.$catId);
	$row = mysql_fetch_assoc($result);
	$total = $row['num'];
	if ($total<50){
		$cids[] = $catId;
	}

}
die();
foreach($cids as $cid){
	$result = mysql_query('select * from articles where cid=0 limit 0,77');
	while ($row = mysql_fetch_assoc($result)){
		$updateSql = 'update articles set cid='.$cid.' where id='.$row['id'];
//		echo 'upsql:'.$updateSql.'<br>';
//		mysql_query($updateSql);
	}
}
//echo '<pre>';print_r($cids);echo '</pre>';
//77



/*$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;

	$line = $index.'::src:'.$row['src'].',src_cat:'.$row['src_category'].',cid:';
	echo $line.'<br>';
	writeToTxt($line);
	ob_flush();
	flush();
}*/



