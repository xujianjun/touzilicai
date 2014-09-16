<?php /* Smarty version Smarty-3.1.18, created on 2014-06-27 23:00:40
         compiled from "/home/wwwroot/touzilicai/admin/smarty/templates/script/left.html" */ ?>
<?php /*%%SmartyHeaderCode:193423267153ad8718c21b46-94962277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '119e24e73d248ef4459762b4d765bc0cac5a0f06' => 
    array (
      0 => '/home/wwwroot/touzilicai/admin/smarty/templates/script/left.html',
      1 => 1403880642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193423267153ad8718c21b46-94962277',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ad8718c755f3_56653197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ad8718c755f3_56653197')) {function content_53ad8718c755f3_56653197($_smarty_tpl) {?><!DOCTYPE html>
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
