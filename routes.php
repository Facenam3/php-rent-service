<?php
/**
 * @var Core\Router $router
 */

use App\Middlewares\Auth;
use App\Middlewares\CSRF;
use App\Middlewares\View;

$router->addGlobalMiddleware(View::class);
$router->addGlobalMiddleware(CSRF::class);
$router->addRouteMiddleware('auth', Auth::class);

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

 $router->add("POST", "/reviews/store", "ReviewController@store",['auth']);

 $router->add("GET", "/contact" , "ContactController@contact");
 $router->add("POST", "/contact/store", "ContactController@store");


///====================== ADMIN Panel Routes ===========================================
$router->add("GET", "/admin/dashboard", "Admin\AdminController@index",['auth']);

//============================ LOCATIONS =============================================
$router->add("GET", "/admin/locations", "Admin\LocationsController@index", ['auth']);
$router->add("GET", "/admin/locations/create", "Admin\LocationsController@create", ['auth']);
$router->add("POST", "/admin/locations/create", "Admin\LocationsController@store", ['auth']);
$router->add("GET", "/admin/locations/{id}/edit", "Admin\LocationsController@edit", ['auth']);
$router->add("POST", "/admin/locations/{id}/update", "Admin\LocationsController@update", ['auth']);
$router->add("POST", "/admin/locations/{id}/delete", "Admin\LocationsController@delete", ['auth']);

//============================= REVIEWS ==================================
$router->add("GET", "/admin/reviews", "Admin\ReviewsController@index", ['auth']);
$router->add("GET", "/admin/reviews/create", "Admin\ReviewsController@create", ['auth']);
$router->add("POST", "/admin/reviews/create", "Admin\ReviewsController@store", ['auth']);
$router->add("GET" , "/admin/reviews/{id}/show", "Admin\ReviewsController@show", ['auth']);
$router->add("POST", "/admin/reviews/{id}/status", "Admin\ReviewsController@updateStatus", ['auth']);
$router->add("GET", "/admin/reviews/{id}/edit", "Admin\ReviewsController@edit", ['auth']);
$router->add("POST", "/admin/reviews/{id}/update", "Admin\ReviewsController@update", ['auth']);
$router->add("POST", "/admin/reviews/{id}/delete", "Admin\ReviewsController@delete", ['auth']);