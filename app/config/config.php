<?php

return new \Phalcon\Config(array(
    'database'    => array(
        'adapter'  => 'Mysql',
        'host'     => '114.215.210.34',
        'username' => 'root',
        'password' => 'xujj10192917',
        'dbname'   => 'touzilicai',
        'charset'  => 'utf8'
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'baseUri'        => '/',
        'debug'          => false
    ),
));
