<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

require_once(dirname(__FILE__) . '/class.db.php');
require_once(dirname(__FILE__) . '/class.tree.php');
require_once(dirname(__FILE__) . '/class.tag.php');

if(isset($_GET['operation'])) {
	$tagObj = new tag(db::get('mysqli://root:xujj10192917@114.215.210.34/touzilicai'));
	$fs = new tree(db::get('mysqli://root:xujj10192917@114.215.210.34/touzilicai'), array('structure_table' => 'tree_struct', 'data_table' => 'tree_data', 'data' => array('title', 'title_en'), 'tagObj'=>$tagObj));
	try {
		$rslt = null;
		switch($_GET['operation']) {
			case 'get_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
				$temp = $fs->get_children($node);
				$rslt = array();
				foreach($temp as $v) {
					if ($v['type'] == 'article'){
						$rslt[] = array('id' => $v['id'], 'text' => $v['title'], 'children' => ($v['rgt'] - $v['lft'] > 1), 'type' => 'article', 'icon' => 'file');
					} else {
						$rslt[] = array('id' => $v['id'], 'text' => $v['title'], 'children' => ($v['rgt'] - $v['lft'] > 1), 'icon' => 'folder');
					}

				}
				break;
			case "get_content":
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : 0;
				$page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
				$node = explode(':', $node);

				$opt = array(
					'with_path'=>true,
					'with_children'=>true,
//					'deep_children'=>true,
					'page_children'=>$page,
					'with_tag'=>true
				);
				if ($page>1){
					unset($opt['with_path']);
				}
				$nodes = $fs->get_nodes($node, $opt);
				echo json_encode($nodes);die();
				$rslt = array('nodes' => $nodes);
				/*
				if(count($node) > 1) {
					$rslt = array('content' => 'Multiple selected');
				}
				else {
					$temp = $fs->get_node((int)$node[0], array('with_path' => true));
					$rslt = array('content' => 'Selected: /' . implode('/',array_map(function ($v) { return $v['title']; }, $temp['path'])). '/'.$temp['title']);
				}*/
				break;
			case 'set_node':
				$id = isset($_POST['id']) && $_POST['id'] !== '#' ? $_POST['id'] : 0;
				if (!$id){
					$rslt = array('resCode'=>1, 'resMsg'=>'参数错误');
					break;
				}
				$title_en = isset($_POST['title_en']) && $_POST['title_en'] ? $_POST['title_en'] : '';
				$tids = isset($_POST['tids']) && $_POST['tids'] ? $_POST['tids'] : '';
				$summary = isset($_POST['summary']) && $_POST['summary'] ? $_POST['summary'] : '';
				$content = isset($_POST['content']) && $_POST['content'] ? $_POST['content'] : '';

				$params = array('title_en'=>$title_en, 'tids'=>$tids, 'summary'=>$summary, 'content'=>$content);
				$res = $fs->set_node($id, $params);
				if ($res){
					$rslt = array('resCode'=>0, 'resMsg'=>'修改成功');
				} else {
					$rslt = array('resCode'=>1, 'resMsg'=>'修改失败');
				}
				break;
			case 'create_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
				$temp = $fs->mk($node, isset($_GET['position']) ? (int)$_GET['position'] : 0, array('title' => isset($_GET['text']) ? $_GET['text'] : 'New node'), isset($_GET['type']) ? $_GET['type'] : 'file');
				$rslt = array('id' => $temp);
				break;
			case 'rename_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
				$rslt = $fs->rn($node, array('title' => isset($_GET['text']) ? $_GET['text'] : 'Renamed node'));
				break;
			case 'delete_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
				$rslt = $fs->rm($node);
				break;
			case 'move_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
				$parn = isset($_GET['parent']) && $_GET['parent'] !== '#' ? (int)$_GET['parent'] : 0;
				$rslt = $fs->mv($node, $parn, isset($_GET['position']) ? (int)$_GET['position'] : 0);
				break;
			case 'copy_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? (int)$_GET['id'] : 0;
				$parn = isset($_GET['parent']) && $_GET['parent'] !== '#' ? (int)$_GET['parent'] : 0;
				$rslt = $fs->cp($node, $parn, isset($_GET['position']) ? (int)$_GET['position'] : 0);
				break;
			default:
				throw new Exception('Unsupported operation: ' . $_GET['operation']);
				break;
		}
		header('Content-Type: application/json; charset=utf8');
		echo json_encode($rslt);
	}
	catch (Exception $e) {
		header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
		header('Status:  500 Server Error');
		echo $e->getMessage();
	}
	die();
}
