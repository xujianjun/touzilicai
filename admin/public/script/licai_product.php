<?php

include_once '../init.php';

if (isset($_POST['act'])){
	$act = $_POST['act'];
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	$result = array(0, '参数错误');
	$res = false;
	switch ($act){
		case 'edit_licai_product':
			$type = isset($_POST['type']) ? $_POST['type'] : '';
			$risk = isset($_POST['risk']) ? $_POST['risk'] : '';
			$company_name = isset($_POST['company_name']) ? $_POST['company_name'] : '';
			$company_logo = isset($_POST['company_logo']) ? $_POST['company_logo'] : '';
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$profit_rate = isset($_POST['profit_rate']) ? $_POST['profit_rate'] : '';
			$profit_type = isset($_POST['profit_type']) ? $_POST['profit_type'] : '';
			$cycle = isset($_POST['cycle']) ? $_POST['cycle'] : '';
			$start_money = isset($_POST['start_money']) ? $_POST['start_money'] : '';
			$start_unit = isset($_POST['start_unit']) ? $_POST['start_unit'] : '';
			$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';
			$url = isset($_POST['url']) ? $_POST['url'] : '';
			$attribute = isset($_POST['attribute']) ? $_POST['attribute'] : '';
			$is_hot = isset($_POST['is_hot']) ? $_POST['is_hot'] : '';
			$hot_level = isset($_POST['hot_level']) ? $_POST['hot_level'] : '';


			$params = array(
							'id'=>$id,
							'type'=>$type,
							'risk'=>$risk,
							'company_name'=>$company_name,
							'company_logo'=>$company_logo,
							'name'=>$name,
							'profit_rate'=>$profit_rate,
							'profit_type'=>$profit_type,
							'cycle'=>$cycle,
							'start_money'=>$start_money,
							'start_unit'=>$start_unit,
							'end_time'=>$end_time,
							'url'=>$url,
							'attribute'=>$attribute,
							'is_hot'=>$is_hot,
							'hot_level'=>$hot_level
						);
			$id = $licaiProductLib->updateLicaiProduct($params);
			if ($id){
				$result = array(1, '编辑成功', $id);
				$touzilicaiLib->resData($result);
			}
			break;
		case 'del_licai_product':
			$res = $licaiProductLib->delLicaiProduct($id);
			break;
		default:
			break;
	}
	if ($res){
		$result = array(1, '操作成功');
	}
	$touzilicaiLib->resData($result);
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id){
	$licai_products = $licaiProductLib->getLicaiProducts(array('id'=>$id));
	$licai_product = $licai_products[0];
	$smarty->assign('licai_product', $licai_product);
	$smarty->display('script/licai_product.html');
	exit();
}

$licai_products = $licaiProductLib->getLicaiProducts();
$smarty->assign('licai_products', $licai_products);
$smarty->display('script/licai_products.html');
