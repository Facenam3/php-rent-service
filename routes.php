<?php

/**
 * @var Core\Router $router
 */

$router->add('GET', '/','HomeController@index');
$router->add('GET', '/cars','CarController@index');
$router->add('GET', '/cars/{id}','CarController@show');