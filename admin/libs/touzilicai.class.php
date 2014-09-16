<?php

class Touzilicai {

    public function __construct(){
	}

	public function resData($data, $resType='json'){
		if ($resType=='json'){
			echo json_encode($data);
		} else {
			echo $data;
		}
		exit();
	}
	public function parseRequestCfgData($requestDataStr, $type){
		$resultData = array();
		parse_str($requestDataStr, $requestData);
		switch ($type){
			case 'mainMenu':
			case 'secMenu':
				$resultData = array();
				foreach ($requestData as $key=>$value){
					foreach ($value as $key1=>$value1){
						$resultData[$key1][$key] = urlencode($value1);
					}
				}
				$parents = $orders = array();
				foreach ($resultData as $key2=>$data){
					if ($type == 'mainMenu'){
						$parents[$key2] = $data['parent'];
					}
					$orders[$key2] = $data['order'];
				}
				if ($type == 'mainMenu'){
					array_multisort($parents, SORT_ASC, $orders, SORT_ASC, $resultData);
				} else {
					array_multisort($orders, SORT_ASC, $resultData);
				}
				break;
			default:
				$resultData = array_map('urlencode', $requestData);

				break;
		}
		return $resultData;
	}
}
?>