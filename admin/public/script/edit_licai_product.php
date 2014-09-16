<?php

include_once '../init.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$licai_product = array();
if ($id){
	$licai_products = $licaiProductLib->getLicaiProducts(array('id'=>$id));
	$licai_product = $licai_products[0];

}

$smarty->assign('licai_product', $licai_product);
$smarty->display('script/edit_licai_product.html');
