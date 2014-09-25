<?php
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

$linkTxt = 'changetag.txt';

$lnk = mysql_connect('114.215.210.34', 'root', 'xujj10192917')
       or die ('Not connected : ' . mysql_error());

// make foo the current db
mysql_select_db('touzilicai', $lnk) or die ('Can\'t use foo : ' . mysql_error());
mysql_query("set names utf8");

$tag_rows = array();
$tag_result = mysql_query('select * from tags order by id');
while ($tag_row = mysql_fetch_assoc($tag_result)){
	$tag_rows[$tag_row['id']] = $tag_row;
}

//sql:select td.*,ts.* from tree_data td left join node_tags nt on td.id=nt.nid left join tree_struct ts on td.id=ts.id where ts.type="article" and nt.nid is null order by td.id
$selSql = 'select td.*,ts.* from tree_data td ' .
		'left join node_tags nt on td.id=nt.nid ' .
		'left join tree_struct ts on td.id=ts.id ' .
		'where ts.type="article" and nt.nid is null order by td.id limit 0,1000';
//echo 'selSql:'.$selSql.'<br>';die();

$result = mysql_query($selSql);
$total = mysql_affected_rows();
$index = 0;
while ($row = mysql_fetch_assoc($result)){
	$index++;
	$nid = $row['id'];
	$ntitle = $row['title'];
	$ncontent = $row['content'];
	//node parents
	$nodeParentNames = array();
	$sql = 'select ts.*,td.* from tree_struct ts ' .
		'left join tree_data td on ts.id=td.id ' .
		'where ts.lft<'.$row['lft'].' and ts.rgt>'.$row['rgt'].' order by ts.lft';
	$result2 = mysql_query($sql);
	while ($row2 = mysql_fetch_assoc($result2)){
		$nodeParentNames[] = $row2['title'];
	}
	$nodeTids = array();
	$cutNum = 5;
	foreach  ($tag_rows as $tag_row){
		$tagname = $tag_row['name'];
		if (count($nodeParentNames) && in_array($tagname, $nodeParentNames)){
			$nodeTids[$tag_row['id']] = 10000;
			$cutNum++;
			continue;
		}

		$MatchNum = preg_match_all('/'.$tagname.'/i', $ntitle, $matches1) + preg_match_all('/'.$tagname.'/i', $ncontent, $matches2);
		if ($MatchNum > 0){
			$nodeTids[$tag_row['id']] = $MatchNum;
		}
	}
	arsort($nodeTids);
	$nodeTids = array_slice($nodeTids, 0, $cutNum, true);
	foreach ($nodeTids as $nodeTid=>$num){
		$insql = 'insert into node_tags values('.$nid.','.$nodeTid.')';
		mysql_query($insql);
		$line = 'nid:'.$nid.', ntitle:'.$ntitle.', tid:'.$nodeTid.', tname:'.$tag_rows[$nodeTid]['name'].', sql:'.$insql;
		echo $line.'<br>';
		writeToTxt($line);
		ob_flush();
		flush();
	}
}
function writeToTxt($line){
	global $linkTxt;
	file_put_contents($linkTxt, $line."\n", FILE_APPEND);
}


