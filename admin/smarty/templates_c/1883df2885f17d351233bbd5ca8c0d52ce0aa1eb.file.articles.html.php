<?php /* Smarty version Smarty-3.1.18, created on 2014-06-26 22:44:26
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/articles.html" */ ?>
<?php /*%%SmartyHeaderCode:1601390912539d7074bc8f71-55799368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1883df2885f17d351233bbd5ca8c0d52ce0aa1eb' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/articles.html',
      1 => 1403793840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1601390912539d7074bc8f71-55799368',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_539d707804cd70_16788829',
  'variables' => 
  array (
    'articles' => 0,
    'key' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539d707804cd70_16788829')) {function content_539d707804cd70_16788829($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">站点管理 -> <a href="/script/article.php">文章管理</a></div>
		<div class="main main-articles">
			<div class="items">
				<div class="itemListTop">
					<div class="opt_btn">
						<a href="/script/edit_article.php">添加</a>
					</div>
					<div class="filter"></div>
				</div>
				<div class="pager"></div>
				<div class="itemList">
					<table style="width:100%;">
						<tr class="tr-top">
							<td colspan="5" align="center">文章</td>
						</tr>
						<tr class="tr-top">
							<td style="width:10%;">ID</td>
							<td style="width:20%;">标题</td>
							<td style="width:20%;">分类</td>
							<td style="width:20%;">标签</td>
							<td style="width:20%;">操作</td>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['article']->key;
?>
						<tr class="id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
							<td style="width:10%;" class="id"><?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
</td>
							<td style="width:20%;" class="title"><a href="/script/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></td>
							<td style="width:20%;" class="category"><?php echo $_smarty_tpl->tpl_vars['article']->value['cname'];?>
</td>
							<td style="width:20%;" class="tag"><?php echo $_smarty_tpl->tpl_vars['article']->value['tagShowNames'];?>
</td>
							<td style="width:20%;">
								<a target="_blank" href="/script/edit_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">编辑</a>
								<a href="#" onclick="del_article(<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
,this)">删除</a>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="pager"></div>
			</div>
		</div>
	</div>
</body>
</html>
<?php }} ?>
