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

 $router->add('GET', '/register', "AuthController@register");
 $router->add("POST", "/register", "AuthController@storeUser");

 $router->add('GET', '/auth/google/redirect', "GoogleController@redirectToGoogle");
 $router->add('GET', '/auth/google/callback', "GoogleController@handleGoogleCallback");

 $router->add("GET",'/reservations', 'ReservationController@create');
 $router->add("POST",'/reservations/store', "ReservationController@store");
 $router->add("GET", "/reservations/thank-you", "ReservationController@thankYou");

 $router->add("GET", "/payments/stripe-checkout", "StripeController@checkout");
 $router->add("GET","/payments/success", "StripeController@success");
 $router->add("GET", "/payments/cancel", "StripeController@cancel");

 $router->add("GET", '/about-us' , "CompanyController@about");
 $router->add("GET", "/privacy-policy", "CompanyController@privacy");
 $router->add("GET", "/licensing", 'CompanyController@licensing');
 $router->add("GET", "/faq", "CompanyController@faq");

 $router->add("POST", "/reviews/store", "ReviewController@store");
