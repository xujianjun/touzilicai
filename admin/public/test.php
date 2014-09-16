<?php

$requestDataStr = 'title=fds&subTitle=fds&logoFile=fds';
parse_str($requestDataStr, $requestData);
echo json_encode($requestData);echo '<br>';
echo '<pre>';print_r($requestData);echo '<pre>';