<?php /* Smarty version Smarty-3.1.18, created on 2014-09-19 10:56:44
         compiled from "/home/wwwroot/vm-gw/touzilicai/admin/smarty/templates/script/left.html" */ ?>
<?php /*%%SmartyHeaderCode:171978609653ace12eb14c62-76582493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23bad67f5d5a68f57ef1cfc3e26053790b884d31' => 
    array (
      0 => '/home/wwwroot/vm-gw/touzilicai/admin/smarty/templates/script/left.html',
      1 => 1410924423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171978609653ace12eb14c62-76582493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ace12ebf1dd7_03785785',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ace12ebf1dd7_03785785')) {function content_53ace12ebf1dd7_03785785($_smarty_tpl) {?><!DOCTYPE html>
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
