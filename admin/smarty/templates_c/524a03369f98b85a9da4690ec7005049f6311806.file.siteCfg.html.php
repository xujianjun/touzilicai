<?php /* Smarty version Smarty-3.1.18, created on 2014-06-28 21:19:25
         compiled from "/home/wwwroot/touzilicai/admin/smarty/templates/script/siteCfg.html" */ ?>
<?php /*%%SmartyHeaderCode:75628905553ae7d35b2b5d1-73132308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '524a03369f98b85a9da4690ec7005049f6311806' => 
    array (
      0 => '/home/wwwroot/touzilicai/admin/smarty/templates/script/siteCfg.html',
      1 => 1403961497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75628905553ae7d35b2b5d1-73132308',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ae7d35c78fc1_73940132',
  'variables' => 
  array (
    'siteCfgs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ae7d35c78fc1_73940132')) {function content_53ae7d35c78fc1_73940132($_smarty_tpl) {?><!DOCTYPE html>
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
		<div class="breadCrumb">
			<input type="button" class="backBtn" value="返回" />
			<input type="button" class="forwardBtn" value="前进" />
			<input type="button" class="refreshBtn" value="刷新" />&nbsp;&nbsp;&nbsp;&nbsp;
			站点管理 -> <a href="/script/siteCfg.php">站点配置</a>
		</div>
		<div class="main main-siteCfg">
			<fieldset id="siteCfg">
		    	<legend>站点配置</legend>
	    		站点标题：<input type="text" name="title" class="title" value="<?php echo $_smarty_tpl->tpl_vars['siteCfgs']->value['siteCfg']['data']['title'];?>
" /><br />
	    		副标题：<input type="text" name="subTitle" class="subTitle" value="<?php echo $_smarty_tpl->tpl_vars['siteCfgs']->value['siteCfg']['data']['subTitle'];?>
" /><br />
	    		logo文件名：<input type="text" name="logoFile" class="logoFile" value="<?php echo $_smarty_tpl->tpl_vars['siteCfgs']->value['siteCfg']['data']['logoFile'];?>
" /><br />
	    		<input type="button" name="siteCfg" class="CfgBtn" value="提交" />
		  	</fieldset>

		  	<fieldset id="cacheCfg">
		    	<legend>缓存配置</legend>
	    		缓存时间（秒）：<input type="text" name="expireTime" class="expireTime" value="<?php echo $_smarty_tpl->tpl_vars['siteCfgs']->value['cacheCfg']['data']['expireTime'];?>
" /><br />
	    		<input type="button" name="cacheCfg" class="CfgBtn" value="提交" />
		  	</fieldset>

		  	<fieldset id="crightCfg">
		    	<legend>底部copyright</legend>
	    		copyright：<input type="text" name="cright" class="cright" value="<?php echo $_smarty_tpl->tpl_vars['siteCfgs']->value['crightCfg']['data']['cright'];?>
" /><br />
	    		<input type="button" name="crightCfg" class="CfgBtn" value="提交" />
		  	</fieldset>
		</div>
	</div>
</body>
</html>
<?php }} ?>
