<?php /* Smarty version Smarty-3.1.18, created on 2014-06-26 22:42:54
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/mainMenu.html" */ ?>
<?php /*%%SmartyHeaderCode:110471333553ac316e813313-11516314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c789fa22bddc24d03e48aab699658cba037a5aa' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/mainMenu.html',
      1 => 1402578929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110471333553ac316e813313-11516314',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteCfgs' => 0,
    'key' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ac316e94a398_12508210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ac316e94a398_12508210')) {function content_53ac316e94a398_12508210($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">站点管理 -> <a href="/script/mainMenu.php">主菜单</a></div>
		<div class="main main-mainMenu">
			<div class="items">
				<div class="editMenu">
					名称: <input type="text" class="title" value="" />
					链接地址: <input type="text" class="link" value="" />
					排序: <input type="text" class="order" value="" />
					父节点: <input type="text" class="parent" value="" />
					<input type="button" class="addMenu" value="添加" />
					<a href="javascript:window.location.reload();" class="cancel_saveMenu">取消</a>
					<input type="button" class="saveMenu" value="发布" />
				</div>
				<div class="menuList">
					<table style="width:100%;">
						<tr class="tr-top">
							<td colspan="5" align="center">主菜单</td>
						</tr>
						<tr class="tr-top">
							<td style="width:30%;">名称</td>
							<td style="width:30%;">链接地址</td>
							<td style="width:10%;">排序</td>
							<td style="width:10%;">父节点</td>
							<td style="width:20%;">
								<input type="button" class="clearMenu" value="清空列表" />
							</td>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['siteCfgs']->value['mainMenu']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>
						<tr class="id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
							<td style="width:30%;" class="title">
								<span class="text"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</span>
							</td>
							<td style="width:30%;" class="link">
								<span class="text"><?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
</span>
							</td>
							<td style="width:10%;" class="order">
								<span class="text"><?php echo $_smarty_tpl->tpl_vars['menu']->value['order'];?>
</span>
							</td>
							<td style="width:10%;" class="parent">
								<span class="text"><?php echo $_smarty_tpl->tpl_vars['menu']->value['parent'];?>
</span>
							</td>
							<td style="width:20%;">
								<input type="button" class="edit_button" onclick="submit_button('edit_menu', this)" value="编辑" />
								<input type="button" class="del_button" onclick="submit_button('del_menu', this)" value="删除" />
								<input type="button" class="edit_menu edit_submit" onclick="submit_button('edit_menu_submit', this)" value="更新" />
								<input type="button" class="edit_menu edit_cancel" onclick="submit_button('edit_menu_cancel', this)" value="取消" />
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php }} ?>
