<?php /* Smarty version Smarty-3.1.18, created on 2014-06-28 23:11:45
         compiled from "/home/wwwroot/touzilicai/admin/smarty/templates/script/edit_article.html" */ ?>
<?php /*%%SmartyHeaderCode:40945464253ad88728c3e39-89148905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '616bd2c31cc303869546edeab8523db79a5cefae' => 
    array (
      0 => '/home/wwwroot/touzilicai/admin/smarty/templates/script/edit_article.html',
      1 => 1403961412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40945464253ad88728c3e39-89148905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ad88729a0b42_42149487',
  'variables' => 
  array (
    'article' => 0,
    'categories' => 0,
    'category' => 0,
    'tag' => 0,
    'unselectedTags' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ad88729a0b42_42149487')) {function content_53ad88729a0b42_42149487($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统-主内容</title>
	<link href="/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<link href="/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" src="/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>

<body>
	<div class="mainDiv">
		<div class="breadCrumb">
			<input type="button" class="backBtn" value="返回" />
			<input type="button" class="forwardBtn" value="前进" />
			<input type="button" class="refreshBtn" value="刷新" />&nbsp;&nbsp;&nbsp;&nbsp;
			站点管理 -> 文章编辑
		</div>
		<div class="main main-edit-article">
			<fieldset id="edit-article">
		    	<legend>文章编辑</legend>
		    		<input type="hidden" name="id" class="id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" />
	    		标题：<input type="text" name="title" class="title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
" /><br />
	    		内容：<script type="text/plain" id="content_editor" class="content" style="width:90%;height:240px;"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</script><br />
	    		分类：<select name="category" class="category">
	    				<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
	    				<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['article']->value['cid']==$_smarty_tpl->tpl_vars['category']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</option>
	    				<?php } ?>
	    			</select><br />
	    		标签：
					<div class="tagSelects">
						<div class="leftSelect">
							<select name="tag" id="tagLeft" class="tag tagSelect" multiple="multiple">
								<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
			    				<?php } ?>
							</select>
						</div>
						<div class="tagBtns">
							<input type="button" id="btnToLeft" onclick="tagToLeft();" value="左移" title="左移选中"/><br />
							<input type="button" id="btnToRight" onclick="tagToRight();" value="右移" title="右移选中"/>
						</div>
						<div class="rightSelect">
							<select name="tag" id="tagRight" class="tagSelect" multiple="multiple">
								<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['unselectedTags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
			    				<option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
			    				<?php } ?>
							</select>
						</div>
						<div class="clear"></div>
					</div>
	    		<input type="button" name="edit-article" class="submit_article" value="提交" />
	    		<input type="button" name="edit-article" class="cancel_submit_article" value="取消" />
		  	</fieldset>
		</div>
	</div>

	<script type="text/javascript">
	//实例化编辑器
	var um = UM.getEditor('content_editor');
	</script>

</body>
</html>
<?php }} ?>
