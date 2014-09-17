<?php
header("Content-type: text/html; charset=utf-8");

require_once(dirname(__FILE__) . '/class.db.php');
require_once(dirname(__FILE__) . '/class.tree.php');

if(isset($_GET['operation'])) {
	$fs = new tree(db::get('mysqli://root:xujj10192917@114.215.210.34/touzilicai'), array('structure_table' => 'tree_struct', 'data_table' => 'tree_data', 'data' => array('title', 'title_en')));
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
					'page_children'=>$page
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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Title</title>
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="./../../dist/themes/default/style.min.css" />
		<link rel="stylesheet" href="./../../dist/jquery-ui/themes/base/jquery.ui.all.css">
		<style>
		html, body { background:#ebebeb; font-size:10px; font-family:Verdana; margin:0; padding:0; }
		#container { min-width:320px; margin:0px auto 0 auto; background:white; border-radius:0px; padding:0px; overflow:hidden; }
		#tree { float:left; min-width:319px; border-right:1px solid silver; overflow:auto; padding:0px 0;}
		#tree ul{top:30px;}
		#data { margin-left:320px;overflow:auto;}
		#data textarea { margin:0; padding:0; height:100%; width:100%; border:0; background:white; display:block; line-height:18px; }
		#data, #code { font: normal normal normal 14px/22px 'Consolas', monospace !important; }

		#tree .folder { background:url('./file_sprite.png') right bottom no-repeat; }
		#tree .file { background:url('./file_sprite.png') 0 0 no-repeat; }

		#data a{text-decoration:none;}
		#data .content.path{padding:10px;}
		#data .content.default{padding:10px 20px;}

		.top-search{
			top: 0;
			position: fixed;
			background-color: #fff;
			z-index: 1;
		}
		.edit_article_btn{margin-left:20px;}
		.top-search input{display:inline;}
		#searchTree{background-color: #fff;}
		</style>
		<link rel="stylesheet" href="./../../dist/jquery-ui/demos.css">

		<script src="./../../dist/libs/jquery.js"></script>
		<script src="./../../dist/jstree.min.js"></script>

		<script src="./../../dist/jquery-ui/ui/jquery.ui.core.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.widget.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.mouse.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.button.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.draggable.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.position.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.resizable.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.button.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.dialog.js"></script>
		<script src="./../../dist/jquery-ui/ui/jquery.ui.effect.js"></script>

		<link href="./../../../css/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	    <script src="./../../../js/umeditor/umeditor.config.js"></script>
	    <script src="./../../../js/umeditor/umeditor.min.js"></script>
	    <script src="./../../../js/umeditor/zh-cn.js"></script>


	</head>
	<body>
		<div id="dialog-form" title="编辑文章">
			<form>
				<fieldset>
					<label for="id">ID</label>
					<input type="text" name="id" id="id" readonly="readonly" class="text ui-widget-content ui-corner-all" />
					<label for="content">内容</label>
					<script type="text/plain" id="content" style="width:550px;height:240px;"></script>
				</fieldset>
			</form>
		</div>
		<div id="container" role="main">
			<div id="tree"></div>
			<div id="data">
				<div class="content code" style="display:none;"><textarea id="code" readonly="readonly"></textarea></div>
				<div class="content folder" style="display:none;"></div>
				<div class="content image" style="display:none; position:relative;"><img src="" alt="" style="display:block; position:absolute; left:50%; top:50%; padding:0; max-height:90%; max-width:90%;" /></div>

				<div class="content path" style="display:none;"></div>
				<div class="content default">欢迎进入内容管理系统.</div>
			</div>
		</div>

		<script>
		$(function () {
			//实例化编辑器
    		var um = UM.getEditor('content');

			$(window).resize(function () {
				var h = Math.max($(window).height() - 0, 420);
				$('#container, #data, #tree').height(h).filter('.default').css('lineHeight', h + 'px');
			}).resize();

			$('#tree')
				.jstree({
					'core' : {
						'data' : {
							'url' : '?operation=get_node',
							'data' : function (node) {
								return { 'id' : node.id };
							}
						},
						'check_callback' : true,
						'themes' : {
							'responsive' : false,
							'variant' : 'small',
							'stripes' : true
						}
					},
					'contextmenu' : {
						'items' : function(node) {
							var tmp = $.jstree.defaults.contextmenu.items();
							delete tmp.create.action;
							tmp.create.label = "New";
							tmp.create.submenu = {
								"create_folder" : {
									"separator_after"	: true,
									"label"				: "目录",
									"action"			: function (data) {
										var inst = $.jstree.reference(data.reference),
											obj = inst.get_node(data.reference);
										inst.create_node(obj, { type : "default", text : "目录标题" }, "last", function (new_node) {
											setTimeout(function () { inst.edit(new_node); },0);
										});
									}
								},
								"create_file" : {
									"label"				: "文章",
									"action"			: function (data) {
										var inst = $.jstree.reference(data.reference),
											obj = inst.get_node(data.reference);
										inst.create_node(obj, { type : "article", text : "文章标题" }, "last", function (new_node) {
											setTimeout(function () { inst.edit(new_node); },0);
										});
									}
								}
							};
							if(this.get_type(node) === "article") {
								delete tmp.create;
							}
							return tmp;
						}
					},
					'types' : {
						'default' : { 'icon' : 'folder' },
						'article' : { 'valid_children' : [], 'icon' : 'file' }
					},
					'plugins' : ['state','dnd','types','contextmenu','wholerow','search']
				})
				.on('delete_node.jstree', function (e, data) {
					$.get('?operation=delete_node', { 'id' : data.node.id })
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('create_node.jstree', function (e, data) {
					$.get('?operation=create_node', { 'type' : data.node.type, 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
						.done(function (d) {
							data.instance.set_id(data.node, d.id);
						})
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('rename_node.jstree', function (e, data) {
					$.get('?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('move_node.jstree', function (e, data) {
					$.get('?operation=move_node', { 'id' : data.node.id, 'parent' : data.parent, 'position' : data.position })
						.fail(function () {
							data.instance.refresh();
						});
				})
				.on('copy_node.jstree', function (e, data) {
					$.get('?operation=copy_node', { 'id' : data.original.id, 'parent' : data.parent, 'position' : data.position })
						.always(function () {
							data.instance.refresh();
						});
				})
				.on('changed.jstree', function (e, data) {
					if(data && data.selected && data.selected.length) {
						$.get('?operation=get_content&id=' + data.selected.join(':'), function (d) {
							var datas = $.parseJSON(d);
							var dType = datas[0].type;

							var pathStr = '',content = [],contentStr='';
							if (datas[0].path != null){
								for(var i=0;i<datas[0].path.length;i++){
									pathStr += pathStr ? ' >> '+datas[0].path[i].title : datas[0].path[i].title;
								}
							}

							if (datas[0]['type']=='article'){
								content.push(
											'<div class="article">'+
											'	<h3>'+datas[0].title+'<button type="button" class="edit_article_btn">编辑</button></h3>'+
											'	<div class="content">'+datas[0].content+'</div>'+
											'</div>'
											);
								$('#dialog-form #id').val(datas[0].id);
								um.setContent(datas[0].content);
							} else {
								content.push('<h3>'+datas[0].title+'</h3>');
								content.push('<ul class="article-lists">');
								var childLength = datas[0].children.length;
								for(var i=0;i<childLength;i++){
									content.push(
											'<li class="list">'+
											'	<a href="#">'+datas[0].children[i].title+'</a>'+
											'</li>'
											);
								}
								content.push('</ul>');
							}

							$('#data .path').html(pathStr).show();
							contentStr = content.join('');
							$('#data .default').html(contentStr).show();
						});
					}
					else {
						$('#data .default').html('欢迎进入内容管理系统.').show();
					}
				});

			function showTreeTop(){
				if ($('#tree').length){
					$('#tree').prepend('<div class="top-search"><input type="text" name="searchTree" id="searchTree"><button type="button">显示ID</button></div>');
					var treeWidth = $('#tree').css('width');
					$('.top-search').css('width', treeWidth);
					$('#searchTree').css('width', parseInt(treeWidth)*0.8);
					clearInterval(intervalId);
				}
			}
			var intervalId = setInterval(showTreeTop, 1000);

			var to = false;
		    $(document).on('keyup', '#searchTree', function(){
		    	if (to){
		    		clearTimeout(to);
		    	}
		    	to = setTimeout(function () {
		     		var v = $('#searchTree').val();
			      	$('#tree').jstree(true).search(v);
			    }, 250);
		    });

			var showId = 0;
			$(document).on('click', '.top-search button', function(){
		    	if (showId == 1){
		    		$('.showid').remove();
					showId = 0;
					return false;
		    	}
				$('li').each(function(){
					var liId = $(this).attr('id');
					$(this).find('a').first().append("<i class='showid'>("+liId+")</i>");
					showId = 1;
				});
			});

			//dialog form
			$("#dialog-form").dialog({
				autoOpen: false,
				height: 600,
				width: 600,
				modal: true,
				buttons: {
					"更新": function() {
						$( this ).dialog( "close" );
					},
					"取消": function() {
						$( this ).dialog( "close" );
					}
				},
				close: function() {}
			});
			$(document).on('click', '.edit_article_btn', function() {
				$( "#dialog-form" ).dialog( "open" );
			});

		});
		</script>
	</body>
</html>