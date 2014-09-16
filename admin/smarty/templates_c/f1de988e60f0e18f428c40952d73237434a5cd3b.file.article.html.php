<?php /* Smarty version Smarty-3.1.18, created on 2014-06-15 18:23:22
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/article.html" */ ?>
<?php /*%%SmartyHeaderCode:1063934887539d7009e3c321-85091340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1de988e60f0e18f428c40952d73237434a5cd3b' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/article.html',
      1 => 1402827800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1063934887539d7009e3c321-85091340',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_539d7009f13150_65783082',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539d7009f13150_65783082')) {function content_539d7009f13150_65783082($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">站点管理 -> 文章 -> <a href="/script/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></div>
		<div class="main main-article">
			<div class="items">
				<div class="itemListTop">
					<a target="_blank" href="/script/edit_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
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
