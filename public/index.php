<?php
header("Content-type: text/html; charset=utf-8");

if (isset($_GET['debug']) && $_GET['debug']=='licaimap'){
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
}

if (!isset($_GET['_url'])) {
    $_GET['_url'] = '/';
}

define('APP_PATH', realpath('..'));
/**
 * Read the configuration
 */
$config = include APP_PATH . "/app/config/config.php";

if (isset($_GET['debug']) && $_GET['debug']=='licaimap'){
	$config->application->debug=true;
}

/**
 * Include the loader
 */
require APP_PATH . "/app/config/loader.php";

try {

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new \Phalcon\DI\FactoryDefault();

    /**
     * Include the application services
     */
    require APP_PATH . "/app/config/services.php";

    /**
     * Handle the request
     */
    $application = new Phalcon\Mvc\Application($di);
    echo $application->handle()->getContent();

} catch (Exception $e) {
	header("Location: /notfound/",TRUE,301);
	exit();
}
