<?php /* Smarty version Smarty-3.1.18, created on 2014-06-15 21:33:36
         compiled from "/home/wwwroot/touzilicai/backend/smarty/templates/script/licai_products.html" */ ?>
<?php /*%%SmartyHeaderCode:1493389246539da03314bba2-41162264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4910252acb612a9220981309c5d75dcdae461b19' => 
    array (
      0 => '/home/wwwroot/touzilicai/backend/smarty/templates/script/licai_products.html',
      1 => 1402839214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1493389246539da03314bba2-41162264',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_539da0331fed13_90604662',
  'variables' => 
  array (
    'licai_products' => 0,
    'key' => 0,
    'licai_product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539da0331fed13_90604662')) {function content_539da0331fed13_90604662($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">站点管理 -> <a href="/script/licai_product.php">理财产品</a></div>
		<div class="main main-licai_products">
			<div class="items">
				<div class="itemListTop">
					<div class="opt_btn">
						<a href="/script/edit_licai_product.php" target="_blank">添加</a>
					</div>
					<div class="filter"></div>
				</div>
				<div class="pager"></div>
				<div class="itemList">
					<table style="width:100%;">
						<tr class="tr-top">
							<td colspan="17" align="center">理财产品</td>
						</tr>
						<tr class="tr-top">
							<td style="width:6%;">ID</td>
							<td style="width:6%;">产品类型</td>
							<td style="width:6%;">风险类型</td>
							<td style="width:6%;">公司名称</td>
							<td style="width:6%;">公司logo</td>
							<td style="width:6%;">产品名称</td>
							<td style="width:6%;">收益率</td>
							<td style="width:6%;">收益类型</td>
							<td style="width:6%;">投资周期</td>
							<td style="width:6%;">起始金额</td>
							<td style="width:6%;">起始单位</td>
							<td style="width:6%;">截止日期</td>
							<td style="width:6%;">详情地址</td>
							<td style="width:6%;">属性</td>
							<td style="width:6%;">是否推荐</td>
							<td style="width:6%;">推荐指数</td>
							<td style="width:6%;">操作</td>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['licai_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['licai_product']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['licai_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['licai_product']->key => $_smarty_tpl->tpl_vars['licai_product']->value) {
$_smarty_tpl->tpl_vars['licai_product']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['licai_product']->key;
?>
						<tr class="id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
							<td style="width:6%;" class="id"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['id'];?>
</td>
							<td style="width:6%;" class="type"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['type'];?>
</td>
							<td style="width:6%;" class="risk"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['risk'];?>
</td>
							<td style="width:6%;" class="company_name"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['company_name'];?>
</td>
							<td style="width:6%;" class="company_logo"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['company_logo'];?>
</td>
							<td style="width:6%;" class="name"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['name'];?>
</td>
							<td style="width:6%;" class="profit_rate"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['profit_rate'];?>
</td>
							<td style="width:6%;" class="profit_type"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['profit_type'];?>
</td>
							<td style="width:6%;" class="cycle"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['cycle'];?>
</td>
							<td style="width:6%;" class="start_money"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['start_money'];?>
</td>
							<td style="width:6%;" class="start_unit"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['start_unit'];?>
</td>
							<td style="width:6%;" class="end_time"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['end_time'];?>
</td>
							<td style="width:6%;" class="url"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['url'];?>
</td>
							<td style="width:6%;" class="attribute"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['attribute'];?>
</td>
							<td style="width:6%;" class="is_hot"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['is_hot'];?>
</td>
							<td style="width:6%;" class="hot_level"><?php echo $_smarty_tpl->tpl_vars['licai_product']->value['hot_level'];?>
</td>
							<td style="width:6%;">
								<a target="_blank" href="/script/edit_licai_product.php?id=<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['id'];?>
">编辑</a>
								<a href="#" onclick="del_licai_product(<?php echo $_smarty_tpl->tpl_vars['licai_product']->value['id'];?>
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
