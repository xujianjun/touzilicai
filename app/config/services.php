<?php

use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DatabaseConnection;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Mvc\Model\Metadata\Files as MetaDataAdapter;
use Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Cache\Backend\File as FileCache;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new Phalcon\Mvc\Url();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

/**
 * Setting up volt
 */
$di->set('volt', function ($view, $di) use ($config) {
    $volt = new Volt($view, $di);
    $volt->setOptions(
        array(
            "compiledPath"      => APP_PATH . "/data/cache/volt/",
            "compiledSeparator" => "_",
            "compileAlways"     => $config->application->debug
        )
    );
    return $volt;
});

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    $view->registerEngines(
        array(
            ".volt" => 'volt'
        )
    );
    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    $connection = new DatabaseConnection($config->database->toArray());
    $debug = $config->application->debug;
    if ($debug) {
        $eventsManager = new EventsManager();
        $logger = new FileLogger(APP_PATH . "/data/logs/db.log");
        //Listen all the database events
        $eventsManager->attach(
            'db',
            function ($event, $connection) use ($logger) {
                /** @var Phalcon\Events\Event $event */
                if ($event->getType() == 'beforeQuery') {
                    $logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
                }
            }
        );
        //Assign the eventsManager to the db adapter instance
        $connection->setEventsManager($eventsManager);
    }
    return $connection;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use ($config) {
    if ($config->application->debug) {
        return new MemoryMetaDataAdapter();
    }
    return new MetaDataAdapter(array(
        'metaDataDir' => APP_PATH . '/data/cache/metaData/'
    ));
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

/**
 * Router
 */
$di->set('router', function () {
    return include APP_PATH . "/app/config/routes.php";
});

/**
 * Register the configuration itself as a service
 */
$di->set('config', $config);

$di->set('dispatcher', function () {
    $dispatcher = new MvcDispatcher();
    return $dispatcher;
});

/**
 * View cache
 */
$di->set( 'viewCache', function () use ($config) {
    if ($config->application->debug) {
        $frontCache = new \Phalcon\Cache\Frontend\None();
        return new Phalcon\Cache\Backend\Memory($frontCache);
    } else {
        //Cache data for one day by default
        $frontCache = new \Phalcon\Cache\Frontend\Output(array(
            "lifetime" => 86400 * 30
        ));
        return new FileCache($frontCache, array(
            "cacheDir" => APP_PATH . "/data/cache/viewCache/",
            "prefix"   => "touzilicai-cache-"
        ));
    }
});

/**
 * Cache
 */
$di->set('modelsCache', function () use ($config) {
    if ($config->application->debug) {
        $frontCache = new \Phalcon\Cache\Frontend\None();
        return new Phalcon\Cache\Backend\Memory($frontCache);
    } else {
        //Cache data for one day by default
        $frontCache = new \Phalcon\Cache\Frontend\Data(array(
            "lifetime" => 86400 * 30
        ));
        return new \Phalcon\Cache\Backend\File($frontCache, array(
            "cacheDir" => APP_PATH . "/data/cache/modelsCache/",
            "prefix"   => "touzilicai-cache-data-"
        ));
    }
});

