<?php

$router = new Phalcon\Mvc\Router();

$router->add("/{nten:[a-zA-Z0-9\-]+}/", array(
    'controller' => 'page',
    'action' => 'list'
));

$router->add("/{nten:[a-zA-Z0-9\-]+}/{nten2:[a-zA-Z0-9\-]+}/", array(
    'controller' => 'page',
    'action' => 'list'
));

$router->add("/{nten:[a-zA-Z0-9\-]+}/{nten2:[a-zA-Z0-9\-]+}/{nid:[0-9]+}.html", array(
    'controller' => 'page',
    'action' => 'single'
));

$router->add("/{nten:school}/", array(
    'controller' => 'page',
    'action' => 'xtHome',
    'cten' => 'school',
));

$router->add("/{nten:school}/{nten2:[a-zA-Z0-9\-]+}/", array(
    'controller' => 'page',
    'action' => 'xtList',
//    'cten' => 'school',
));
$router->add("/{nten:school}/{nten2:[a-zA-Z0-9\-]+}/{nten3:[a-zA-Z0-9\-]+}/", array(
    'controller' => 'page',
    'action' => 'xtList',
//    'cten' => 'school',
));

$router->add("/{nten:school}/{nten2:[a-zA-Z0-9\-]+}/{nten3:[a-zA-Z0-9\-]+}/{nid:[0-9]+}.html", array(
    'controller' => 'page',
    'action' => 'xtSingle',
//    'cten' => 'school',
));

$router->add("/tag/{tid:[0-9]+}.html", array(
    'controller' => 'page',
    'action' => 'tagSingle'
));
$router->add("/tag/{tagPrefix:[a-zA-Z]+}/", array(
    'controller' => 'page',
    'action' => 'tagList'
));
$router->add("/tag/", array(
    'controller' => 'page',
    'action' => 'tagList'
));

$router->add("/calc/{calId:[0-9]+}.html", array(
    'controller' => 'calc',
    'action' => 'single'
));
$router->add("/calc/", array(
    'controller' => 'calc',
    'action' => 'index'
));

$router->add("/widget/{widget:[a-zA-Z0-9\-_]+}/", array(
    'controller' => 'widget',
    'action' => 'index'
));

$router->add("/search/{search_keyword:[\s\S]+}/", array(
    'controller' => 'page',
    'action' => 'search'
));

$router->add("/search/", array(
    'controller' => 'page',
    'action' => 'search'
));

$router->add("/{nten:about_us}/", array(
    'controller' => 'static',
    'action' => 'content'
));
$router->add("/{nten:contact_us}/", array(
    'controller' => 'static',
    'action' => 'content'
));
$router->add("/{nten:mianze}/", array(
    'controller' => 'static',
    'action' => 'content'
));
$router->add("/{nten:sitemap}/", array(
    'controller' => 'static',
    'action' => 'sitemap'
));

return $router;
