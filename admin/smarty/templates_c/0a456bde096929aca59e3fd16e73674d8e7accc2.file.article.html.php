<?php /* Smarty version Smarty-3.1.18, created on 2014-06-28 19:14:14
         compiled from "/home/wwwroot/touzilicai/admin/smarty/templates/script/article.html" */ ?>
<?php /*%%SmartyHeaderCode:139234130553ad884a8e5b36-78289528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a456bde096929aca59e3fd16e73674d8e7accc2' => 
    array (
      0 => '/home/wwwroot/touzilicai/admin/smarty/templates/script/article.html',
      1 => 1403954030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139234130553ad884a8e5b36-78289528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ad884aa22108_87438995',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ad884aa22108_87438995')) {function content_53ad884aa22108_87438995($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统-主内容</title>
	<link href="/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>

<body>
	<div class="mainDiv">
		<div class="breadCrumb">
			<input type="button" class="backBtn" value="返回" />
			<input type="button" class="forwardBtn" value="前进" />
			<input type="button" class="refreshBtn" value="刷新" />&nbsp;&nbsp;&nbsp;&nbsp;
			站点管理 -> 文章 -> <a href="/script/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a>
		</div>
		<div class="main main-article">
			<div class="items">
				<div class="itemListTop">
					<a href="/script/edit_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">编辑</a>
				</div>
				<div class="article">
					<div style="text-align:center;">
						<h1 class="title" style="margin:0;"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>
						category:<?php echo $_smarty_tpl->tpl_vars['article']->value['cname'];?>
&nbsp;&nbsp;tag:<?php echo $_smarty_tpl->tpl_vars['article']->value['tagShowNames'];?>

					</div>
					<hr>
					<div class="content"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</div>
				</div>
		</div>
	</div>
</body>
</html>
<?php }} ?>
