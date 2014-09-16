<?php

include_once '../init.php';

if (isset($_POST['act']) && $_POST['act']=='editCfg'){
	$result = array(0, '参数错误');
	$type = isset($_POST['type']) ? $_POST['type'] : '';
	$requestDataStr = isset($_POST['requestDataStr']) ? $_POST['requestDataStr'] : '';
	$requestData = $touzilicaiLib->parseRequestCfgData($requestDataStr, $type);
	$cfgStr = urldecode(json_encode($requestData));
	if ($type && $cfgStr){
		$params = array('type'=>$type, 'data'=>$cfgStr);
		$id = $siteCfgLib->saveSiteCfgs($params);
		if ($id){
			$result = array(1, '修改成功');
			$touzilicaiLib->resData($result);
		}
	}
	$touzilicaiLib->resData($result);
}

$smarty->display('script/siteCfg.html');
