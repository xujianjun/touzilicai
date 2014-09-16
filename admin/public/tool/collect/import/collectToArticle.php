<?php

header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$lnk = mysql_connect('localhost', 'root', '123456')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");

$result = mysql_query('select * from collect where imported=0 order by id asc limit 5000');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$sql = 'insert into articles (title,content,src,src_id,src_category,src_tag) values("'.$row['title'].'","'.$row['content'].'","'.$row['sourceName'].'",'.$row['id'].',"'.$row['category'].'","'.$row['tag'].'")';
//	echo $sql.'<br>';
	mysql_query($sql) or die("Invalid query: " . mysql_error());
	$updateSql = 'update collect set imported=1 where id='.$row['id'];
	mysql_query($updateSql) or die("Invalid query: " . mysql_error());
	echo $index.'/'.$total.'<br>';
	ob_flush();
	flush();
}