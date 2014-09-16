<?php /* Smarty version Smarty-3.1.18, created on 2014-06-28 21:25:34
         compiled from "/home/wwwroot/touzilicai/admin/smarty/templates/script/articles.html" */ ?>
<?php /*%%SmartyHeaderCode:106485074653ad871b385019-02146529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32eb64b26137f2b954a472dbcee17f934e57bd91' => 
    array (
      0 => '/home/wwwroot/touzilicai/admin/smarty/templates/script/articles.html',
      1 => 1403961378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106485074653ad871b385019-02146529',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ad871b49f515_07668521',
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'tags' => 0,
    'tag' => 0,
    'filterKeys' => 0,
    'pager' => 0,
    'articles' => 0,
    'key' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ad871b49f515_07668521')) {function content_53ad871b49f515_07668521($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>后台管理系统-主内容</title>
	<link href="/css/common.css" rel="stylesheet" type="text/css" />
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/js/jquery/jquery.cookie.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>

<body>
	<div class="mainDiv">
		<div class="breadCrumb">
			<input type="button" class="backBtn" value="返回" />
			<input type="button" class="forwardBtn" value="前进" />
			<input type="button" class="refreshBtn" value="刷新" />&nbsp;&nbsp;&nbsp;&nbsp;
			站点管理 -> <a href="/script/article.php">文章管理</a>
		</div>
		<div class="main main-articles">
			<div class="items">
				<div class="itemListTop">
					<div class="opt_btn">
						<a href="/script/edit_article.php">添加</a>
					</div>
					<details>
						<summary>过滤器</summary>
						<div class="article_filter">
				    		ID：<input type="text" name="from_id" class="from_id" value="0" />&nbsp;-&nbsp;
				    			<input type="text" name="to_id" class="to_id" value="0" /><br>
				    		标题：<input type="text" name="title" class="title" value="" /><br>
				    		分类：<select class="category" multiple="multiple" size="10">
								  <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
				    				<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['category']->value['selected']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</option>
				    				<?php } ?>
								</select>&nbsp;&nbsp;&nbsp;&nbsp;
							标签：<select class="tag" multiple="multiple" size="10">
								  <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
				    				<option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['tag']->value['selected']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
				    				<?php } ?>
								</select><br />
							排序：<select class="order">
								  <option value ="id" selected>ID</option>
								  <option value ="id desc">ID DESC</option>
								</select><br />
				    		<input type="button" name="filterBtn" class="filterBtn" value="提交" />
						</div>
					</details>
					<div class="filterKeys">当前搜索条件：<?php echo $_smarty_tpl->tpl_vars['filterKeys']->value;?>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="article_filter_reset" value="重置" /></div>
				</div>
				<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pager']->value;?>
</div>
				<div class="itemList">
					<table style="width:100%;">
						<tr class="tr-top">
							<td colspan="10" align="center">文章</td>
						</tr>
						<tr class="tr-top">
							<td style="width:3%;"></td>
							<td style="width:10%;">ID</td>
							<td style="width:10%;">标题</td>
							<td style="width:10%;">分类</td>
							<td style="width:10%;">标签</td>
							<td style="width:10%;">来源</td>
							<td style="width:10%;">来源id</td>
							<td style="width:10%;">来源类型</td>
							<td style="width:10%;">来源tag</td>
							<td style="width:10%;">操作</td>
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
							<td style="width:3%;" class="check">
								<input type="checkbox" class="check" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
							</td>
							<td style="width:10%;" class="id"><?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
</td>
							<td style="width:10%;" class="title"><a href="/script/article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></td>
							<td style="width:10%;" class="category"><?php echo $_smarty_tpl->tpl_vars['article']->value['cname'];?>
</td>
							<td style="width:10%;" class="tag"><?php echo $_smarty_tpl->tpl_vars['article']->value['tagShowNames'];?>
</td>
							<td style="width:10%;" class="src"><?php echo $_smarty_tpl->tpl_vars['article']->value['src'];?>
</td>
							<td style="width:10%;" class="src_id"><?php echo $_smarty_tpl->tpl_vars['article']->value['src_id'];?>
</td>
							<td style="width:10%;" class="src_category"><?php echo $_smarty_tpl->tpl_vars['article']->value['src_category'];?>
</td>
							<td style="width:10%;" class="src_tag"><?php echo $_smarty_tpl->tpl_vars['article']->value['src_tag'];?>
</td>
							<td style="width:10%;">
								<a href="/script/edit_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">编辑</a>
								<a href="#" onclick="del_article(<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
,this)">删除</a>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="check_action">
					<a href="#" class="all">全选</a>
					<a href="#" class="reverse">反选</a>
					<a href="#" class="none">全不选</a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<select class="check_category">
					  <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
	    				<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['category']->value['selected']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</option>
	    				<?php } ?>
					</select>
					<input type="button" name="checkBtn" class="checkBtn" value="更新" />
				</div>
				<div class="pager"><?php echo $_smarty_tpl->tpl_vars['pager']->value;?>
</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php }} ?>
