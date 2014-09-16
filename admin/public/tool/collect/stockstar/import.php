<?php
die();
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$lnk = mysql_connect('localhost', 'root', '123456')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());


$sources = file('stockstar_links.txt');
echo '<pre>';print_r($sources);echo '</pre>';die();
foreach ($sources as $source){
	$sql = 'insert into stockstar(source,sourceName) values("'.trim($source).'","证券之星")';
	mysql_query($sql) or die("Invalid query: " . mysql_error());
	echo $sql.'<br>';
	ob_flush();
	flush();
}


