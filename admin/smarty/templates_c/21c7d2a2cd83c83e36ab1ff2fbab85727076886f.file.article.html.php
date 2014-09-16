<?php /* Smarty version Smarty-3.1.18, created on 2014-06-27 11:13:54
         compiled from "/home/wwwroot/vm-gw/touzilicai/admin/smarty/templates/script/article.html" */ ?>
<?php /*%%SmartyHeaderCode:135335497253ace17208a458-71958396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21c7d2a2cd83c83e36ab1ff2fbab85727076886f' => 
    array (
      0 => '/home/wwwroot/vm-gw/touzilicai/admin/smarty/templates/script/article.html',
      1 => 1403837700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135335497253ace17208a458-71958396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ace172189d18_31148682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ace172189d18_31148682')) {function content_53ace172189d18_31148682($_smarty_tpl) {?><!DOCTYPE html>
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
