<?php /* Smarty version Smarty-3.1.18, created on 2014-06-26 22:42:58
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/cat.html" */ ?>
<?php /*%%SmartyHeaderCode:159695443653ac317224d924-04952440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1105aa5bb74455aca72c7a2bee72036574e2ccd' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/cat.html',
      1 => 1402500807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159695443653ac317224d924-04952440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ac317235a8c4_63240319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ac317235a8c4_63240319')) {function content_53ac317235a8c4_63240319($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统-主内容</title>
	<link href="/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.cookie.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.hotkeys.js"></script>
	<script type="text/javascript" src="/jstree/jquery.jstree.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/jstree.js"></script>
</head>

<body>
	<div class="mainDiv">
		<div class="breadCrumb">站点管理 -> <a href="cat.htm">目录管理</a></div>
		<div class="main main-cat">
			<div class="jstree">
				<div id="mmenu" style="height:30px; overflow:auto;">
					<input type="button" id="add_folder" value="添加目录" style="display:block; float:left;"/>
					<input type="button" id="rename" value="重命名" style="display:block; float:left;"/>
					<input type="button" id="remove" value="删除" style="display:block; float:left;"/>
					<input type="button" id="cut" value="剪切" style="display:block; float:left;"/>
					<input type="button" id="copy" value="复制" style="display:block; float:left;"/>
					<input type="button" id="paste" value="粘贴" style="display:block; float:left;"/>
					<input type="button" id="refresh" value="刷新" onclick="$('#demo').jstree('refresh',-1);" />
					<input type="button" id="clear_search" value="清空" style="display:block; float:right;"/>
					<input type="button" id="search" value="搜索" style="display:block; float:right;"/>
					<input type="text" id="text" value="" style="display:block; float:right;" />
				</div>
				<div id="category" class="category" style="min-height:300px;"></div>
			</div>
		</div>
	</div>
</body>
</html>
<?php }} ?>
