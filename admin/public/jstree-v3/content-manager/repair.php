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

/*
mysql_query('truncate tree_data');
mysql_query('truncate tree_struct');


mysql_query('insert into tree_struct select id,lpoint,rpoint,level,parent_id,position,"default" from categories');
mysql_query('insert into tree_data(id,title,title_en) select id,title,title_en from categories');
mysql_query('insert into tree_data(title,title_en,summary,content,cid,src,src_id,src_category,src_tag) select title,"",summary,content,cid,src,src_id,src_category,src_tag from articles');
*/


//修复lft, rgt
$trees = get_trees();
regenerate_tid($trees);
updateTreeTids($trees);

//repair_pos();


//createArticleList();
//importArticle();


function repair_pos(){
	$result = mysql_query('select * from tree_struct where id<=66 order by id limit 0,70');
	if ($result){
		while ($row = mysql_fetch_assoc($result)){
			$selSql = 'select * from tree_struct where id>66 and pid='.$row['id'].' order by lft';
			$result2 = mysql_query($selSql);
			if ($result2){
				$i = 0;
				while ($row2 = mysql_fetch_assoc($result2)){
					$sql = 'update tree_struct set pos='.$i.' where id='.$row2['id'].';';
					echo $sql.'<br>';
					$i++;
				}
			}
		}
	}

}

function importArticle(){
	$values = file('article.txt');
	foreach ($values as $value){
		$value = trim($value);
		$article = explode(',', $value);
		$sql = 'insert into tree_struct(id,lvl,pid,pos,type) values('.$article['0'].','.$article['1'].','.$article['2'].','.$article['3'].',"'.$article['4'].'");';
		echo $sql.'<br>';
//			mysql_query();
	}
}
function createArticleList(){
	$result = mysql_query('select * from tree_struct where id<=66 order by id limit 0,70');
	if ($result){
		while ($row = mysql_fetch_assoc($result)){
			$level = $row['lvl'];
			$result2 = mysql_query('select id,cid from tree_data where cid='.$row['id'].' order by id');
			if ($result2){
				$lvl = $level+1;
				$i = 0;
				while ($row2 = mysql_fetch_assoc($result2)){
					echo $row2['id'].','.$lvl.','.$row['id'].','.$i.',article<br>';
					$i++;
				}
			}
		}
	}
}



function updateTreeTids($trees){
	foreach ($trees as $tree){
		$new_lft = $tree['new_lft'];
		$new_rgt = $tree['new_rgt'];
		$updateSql = 'update tree_struct set lft='.$new_lft.',rgt='.$new_rgt.' where id='.$tree['id'].';';
		echo $updateSql.'<br>';
		mysql_query($updateSql);

		if (isset($tree['children']) && count($tree['children'])){
			updateTreeTids($tree['children']);
		}
	}
}
function regenerate_tid(&$trees, $lft=0){
	$lft += 1;
	foreach ($trees as $key=>&$tree){
		$tree["new_lft"] = $lft;
		if (isset($tree['children']) && count($tree['children'])){
			$new_rgt = regenerate_tid($tree['children'], $lft);
		} else {
			$new_rgt = $lft+1;
		}
		$tree['new_rgt'] = $new_rgt;
		$lft = $new_rgt + 1;
	}
	return $new_rgt+1;
}

function get_trees(){
	$trees = array();

	$rootID = 0;
	$result = mysql_query('select * from tree_struct where pid='.$rootID);
	if ($result && $row = mysql_fetch_assoc($result)){
		$trees[$row['id']] = $row;
		if ($row['lft']+1<$row['rgt']){
			$trees[$row['id']]['children'] = get_childs($row['id']);
		}
	}
	return $trees;
}
function get_childs($id){
	$children = array();
	$result = mysql_query('select * from tree_struct where pid='.$id.' order by lft');
	if ($result){
		while ($row = mysql_fetch_assoc($result)){
			$children[$row['id']] = $row;
			if ($row['type']!='article'){
				$children[$row['id']]['children'] = get_childs($row['id']);
			}
		}
	}
	return $children;
}






