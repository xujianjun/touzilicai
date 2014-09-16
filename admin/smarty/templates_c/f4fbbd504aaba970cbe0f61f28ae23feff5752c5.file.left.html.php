<?php /* Smarty version Smarty-3.1.18, created on 2014-06-15 18:07:48
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/left.html" */ ?>
<?php /*%%SmartyHeaderCode:1794247992539d70741a8b69-20185548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4fbbd504aaba970cbe0f61f28ae23feff5752c5' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/left.html',
      1 => 1402752531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1794247992539d70741a8b69-20185548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_539d7077e126e8_19861098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539d7077e126e8_19861098')) {function content_539d7077e126e8_19861098($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统-左边菜单</title>
	<link href="/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/css/left.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/left.js"></script>
</head>
<body>
	<div class="leftDiv">
		<ul class="nav">
			<li>
				站点管理
				<ul class="nav2">
					<li><a href="/script/siteCfg.php" target="mainFrame">站点配置</a></li>
				</ul>
			</li>
			<li>
				菜单管理
				<ul class="nav2">
					<li><a href="/script/mainMenu.php" target="mainFrame">主菜单</a></li>
					<li><a href="/script/secMenu.php" target="mainFrame">二级菜单</a></li>
				</ul>
			</li>
			<li>
				内容管理
				<ul class="nav2">
					<li><a href="/script/cat.php" target="mainFrame">目录管理</a></li>
					<li><a href="/script/tag.php" target="mainFrame">标签管理</a></li>
					<li><a href="/script/article.php" target="mainFrame">文章管理</a></li>
					<li><a href="/script/licai_product.php" target="mainFrame">理财产品</a></li>
				</ul>
			</li>
			<li>
				其他管理
				<ul class="nav2">
					<li><a href="bannerAdm.htm" target="mainFrame">banner管理</a></li>
				</ul>
			</li>
		</ul>
	</div>
</body>
</html>
<?php }} ?>
