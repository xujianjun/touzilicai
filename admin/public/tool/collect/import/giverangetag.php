<?php
die();
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$lnk = mysql_connect('localhost', 'root', '123456')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");

$total_articles = 9740;
$tag_min_articles = 10;
$tag_max_articles = 100;

mysql_query('truncate article_tags');

$result = mysql_query('select * from tags order by id');
$index = 0;
while($row = mysql_fetch_assoc($result)){
	$index++;
	$tid = $row['id'];
	$rand_start_aid = mt_rand(0, $total_articles);
	$rand_total_taids = mt_rand($tag_min_articles, $tag_max_articles);

	$result1 = mysql_query('select * from articles where id>'.$rand_start_aid.' order by id limit '.$rand_total_taids);
	while($row1 = mysql_fetch_assoc($result1)){
		$updateSql = "insert into article_tags values(".$row1['id'].",".$tid.")";
		mysql_query($updateSql) or die("Invalid query: " . mysql_error());
		echo 'sql:'.$updateSql.'<br>';
		ob_flush();
		flush();

	}
	echo $index.'<br>';
	ob_flush();
	flush();
}


