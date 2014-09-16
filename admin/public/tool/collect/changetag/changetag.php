<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

$linkTxt = 'changetag3.txt';

$lnk = mysql_connect('114.215.210.34', 'root', 'xujj10192917')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");

$tag_rows = array();
$tag_result = mysql_query('select * from tags order by id');
while ($tag_row = mysql_fetch_assoc($tag_result)){
	$tag_rows[] = $tag_row;
}

$result = mysql_query('select * from articles order by id limit 4346,1000');
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$aid = $row['id'];
	$atitle = $row['title'];
	$acontent = $row['content'];
//	echo 'atitle'.$atitle.'<br>';
//	continue;
	foreach  ($tag_rows as $tag_row){
		$tagname = $tag_row['name'];
		if (strpos($atitle, $tagname)!==false || strpos($acontent, $tagname)!==false){
			$insql = 'insert into article_tags values('.$aid.','.$tag_row['id'].')';
			mysql_query($insql);
			$line = 'aid:'.$aid.', atitle:'.$atitle.', tid:'.$tag_row['id'].', tname:'.$tagname.', sql:'.$insql;
			echo $line.'<br>';
			writeToTxt($line);
			ob_flush();
			flush();
		}
	}
}
function writeToTxt($line){
	global $linkTxt;
	file_put_contents($linkTxt, $line."\n", FILE_APPEND);
}


