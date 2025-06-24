<?php
/**
 * @var Core\Router $router
 */


 $router->add('GET', '/', "HomeController@index");
 $router->add("GET", '/cars', 'CarController@index');
 $router->add("GET", '/cars/{id}', 'CarController@show');

 $router->add("GET", "/login", "AuthController@create");
 $router->add("POST", '/login', "AuthController@store");
 $router->add('POST', '/logout', 'Authcontroller@destroy');