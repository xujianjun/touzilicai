<?php /* Smarty version Smarty-3.1.18, created on 2014-07-30 16:57:22
         compiled from "/home/wwwroot/vm-gw/touzilicai/admin/smarty/templates/script/cat.html" */ ?>
<?php /*%%SmartyHeaderCode:171560314053d8b3729deab1-10787102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7a9f194219211b19074695cf84e46895f41d67e' => 
    array (
      0 => '/home/wwwroot/vm-gw/touzilicai/admin/smarty/templates/script/cat.html',
      1 => 1403961401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171560314053d8b3729deab1-10787102',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53d8b372a39ee5_14437201',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d8b372a39ee5_14437201')) {function content_53d8b372a39ee5_14437201($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">
			<input type="button" class="backBtn" value="返回" />
			<input type="button" class="forwardBtn" value="前进" />
			<input type="button" class="refreshBtn" value="刷新" />&nbsp;&nbsp;&nbsp;&nbsp;
			站点管理 -> <a href="cat.htm">目录管理</a>
		</div>
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
