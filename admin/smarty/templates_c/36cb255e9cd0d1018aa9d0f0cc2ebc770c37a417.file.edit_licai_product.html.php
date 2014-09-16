<?php /* Smarty version Smarty-3.1.18, created on 2014-06-15 22:20:10
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/edit_licai_product.html" */ ?>
<?php /*%%SmartyHeaderCode:2111308099539dab9ae4b3c4-68034421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36cb255e9cd0d1018aa9d0f0cc2ebc770c37a417' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/edit_licai_product.html',
      1 => 1402840207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2111308099539dab9ae4b3c4-68034421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'licai_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_539dab9aeddf29_83416707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539dab9aeddf29_83416707')) {function content_539dab9aeddf29_83416707($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">站点管理 -> 理财产品编辑</div>
		<div class="main main-edit-licai_product">
			<fieldset id="edit-licai_product">
		    	<legend>理财产品编辑</legend>
		    		<input type="hidden" name="id" class="id" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['id'];?>
" />
	    		产品类型：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['type'];?>
" /><br />
	    		风险类型：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['risk'];?>
" /><br />
	    		公司名称：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['company_name'];?>
" /><br />
	    		公司logo：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['company_logo'];?>
" /><br />
	    		产品名称：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['name'];?>
" /><br />
	    		收益率：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['profit_rate'];?>
" /><br />
	    		收益类型：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['profit_type'];?>
" /><br />
	    		周期：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['cycle'];?>
" /><br />
	    		起始金额：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['start_money'];?>
" /><br />
	    		起始单位：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['start_unit'];?>
" /><br />
	    		截止日期：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['end_time'];?>
" /><br />
	    		详情地址：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['url'];?>
" /><br />
	    		属性：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['attribute'];?>
" /><br />
	    		是否推荐：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['is_hot'];?>
" /><br />
	    		推荐指数：<input type="text" name="type" class="type" value="<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['hot_level'];?>
" /><br />

	    		<input type="button" name="edit-licai_product" class="submit_licai_product" value="提交" />
	    		<input type="button" name="edit-licai_product" class="cancel_submit_licai_product" value="取消" />
		  	</fieldset>
		</div>
	</div>
</body>
</html>
<?php }} ?>
