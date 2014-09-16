<?php /* Smarty version Smarty-3.1.18, created on 2014-06-28 23:15:26
         compiled from "/home/wwwroot/touzilicai/admin/smarty/templates/script/tag.html" */ ?>
<?php /*%%SmartyHeaderCode:71401968853ae7d3fba2233-83033870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cd58425b9f102081fdaadc84ada22131aece964' => 
    array (
      0 => '/home/wwwroot/touzilicai/admin/smarty/templates/script/tag.html',
      1 => 1403968522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71401968853ae7d3fba2233-83033870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ae7d3fce0061_77823483',
  'variables' => 
  array (
    'filterKeys' => 0,
    'pager' => 0,
    'tags' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ae7d3fce0061_77823483')) {function content_53ae7d3fce0061_77823483($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统-主内容</title>
	<link href="/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<link href="/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/jquery/themes/base/jquery.ui.all.css">
	<script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.core.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.button.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.draggable.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.position.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.resizable.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.button.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.dialog.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.ui.effect.js"></script>

	<script type="text/javascript" src="/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" src="/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/umeditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="/js/jquery/jquery.cookie.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<link rel="stylesheet" href="/css/jquery/demos.css">
</head>

<body>
	<div id="tag-dialog-form" title="编辑标签">
		<form>
			<fieldset>
				<input type="hidden" name="id" class="id text ui-widget-content ui-corner-all" />
				<label for="name">名称</label>
				<input type="text" name="name" class="name text ui-widget-content ui-corner-all" />
				<label for="desc">描述</label>
				<script type="text/plain" id="content_editor" class="content" style="width:500px;height:200px;"></script><br />
			</fieldset>
		</form>
	</div>
	<div class="mainDiv">
		<div class="breadCrumb">
			<input type="button" class="backBtn" value="返回" />
			<input type="button" class="forwardBtn" value="前进" />
			<input type="button" class="refreshBtn" value="刷新" />&nbsp;&nbsp;&nbsp;&nbsp;
			站点管理 -> <a href="/script/tag.php">标签管理</a>
		</div>
		<div class="main main-tag">
			<div class="items">
				<div class="itemListTop">
					<div class="opt_btn">
						<input type="button" class="addItem" value="添加" onclick="edit_tag()"/>
					</div>
					<details>
						<summary>过滤器</summary>
						<div class="tag_filter">
				    		ID：<input type="text" name="from_id" class="from_id" value="0" />&nbsp;-&nbsp;
				    			<input type="text" name="to_id" class="to_id" value="0" /><br>
				    		标题：<input type="text" name="title" class="title" value="" /><br>
							排序：<select class="order">
								  <option value ="id" selected>ID</option>
								  <option value ="id desc">ID DESC</option>
								</select><br />
				    		<input type="button" name="filterBtn" class="filterBtn" value="提交" />
						</div>
					</details>
					<div class="filterKeys">当前搜索条件：<?php echo $_smarty_tpl->tpl_vars['filterKeys']->value;?>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="tag_filter_reset" value="重置" /></div>
				</div>
				<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pager']->value;?>
</div>
				<div class="itemList">
					<table style="width:100%;">
						<tr class="tr-top">
							<td colspan="4" align="center">标签</td>
						</tr>
						<tr class="tr-top">
							<td style="width:10%;">ID</td>
							<td style="width:20%;">名称</td>
							<td style="width:40%;">描述</td>
							<td style="width:20%;">操作</td>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tag']->key;
?>
						<tr class="id_<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
">
							<td style="width:10%;" class="id"><?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
</td>
							<td style="width:20%;" class="name"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</td>
							<td style="width:40%;" class="desc"><?php echo $_smarty_tpl->tpl_vars['tag']->value['description'];?>
</td>
							<td style="width:20%;">
								<input type="button" class="edit_button" onclick="edit_tag(<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
,this)" value="编辑" />
								<input type="button" class="del_button" onclick="del_tag(<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
,this)" value="删除" />
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pager']->value;?>
</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	//实例化编辑器
	var um = UM.getEditor('content_editor');
	</script>
</body>
</html>
<?php }} ?>
