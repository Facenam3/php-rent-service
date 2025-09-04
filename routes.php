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
 $router->add('POST', '/logout', 'AuthController@destroy');
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

 $router->add("GET", "/user/dashboard", 'UserController@index', ['auth']);
 $router->add("GET", '/user/settings', "UserController@settings",['auth']);
 $router->add("GET", '/user/reservation/{id}/show', "UserController@show",['auth']);
 $router->add("POST","/user/{id}/update", "UserController@update",['auth']);
 


///====================== ADMIN Panel Routes ===========================================
$router->add("GET", "/admin/dashboard", "Admin\AdminController@index",['auth']);

//=================================== Users ============================================
$router->add("GET", '/admin/users', 'Admin\UserController@index', ['auth']);
$router->add("GET", "/admin/users/create", "Admin\UserController@create", ['auth']);
$router->add("POST", "/admin/users/store", "Admin\UserController@store", ['auth']);
$router->add("GET", "/admin/users/{id}/edit", "Admin\UserController@edit", ['auth']);
$router->add("POST", "/admin/users/{id}/update", "Admin\UserController@update", ['auth']);
$router->add("POST", "/admin/users/{id}/delete", "Admin\UserController@delete", ['auth']);

//======================================== Cars =============================================
$router->add("GET", "/admin/cars", "Admin\CarController@index", ['auth']);
$router->add("GET", "/admin/cars/create", "Admin\CarController@create", ['auth']);
$router->add("POST", "/admin/cars/store", "Admin\CarController@store", ['auth']);
$router->add("GET", "/admin/cars/{id}/edit", "Admin\CarController@edit", ['auth']);
$router->add("POST", "/admin/cars/{id}/update", "Admin\CarController@update", ['auth']);
$router->add("POST", "/admin/cars/{id}/delete", "Admin\CarController@delete", ['auth']);
$router->add("GET", "/admin/cars/{id}/show", "Admin\CarCOntroller@show", ["auth"]);

//======================================== Reservations ========================================
$router->add("GET", "/admin/reservations", "Admin\ReservationController@index", ['auth']);
$router->add("GET", "/admin/reservations/create", "Admin\ReservationController@create", ['auth']);
$router->add("POST", "/admin/reservations/store", "Admin\ReservationController@store", ['auth']);
$router->add("GET", "/admin/reservations/{id}/edit", "Admin\ReservationController@edit", ['auth']);
$router->add("POST", "/admin/reservations/{id}/update", "Admin\ReservationController@update", ['auth']);
$router->add("GET", "/admin/reservations/{id}/show", "Admin\ReservationController@show", ['auth']);
$router->add("POST", "/admin/reservations/{id}/delete", "Admin\ReservationController@delete", ['auth']);

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
$router->add("POST", "/admin/reviews/{id}/approve", "Admin\ReviewsController@approveStatus", ['auth']);
$router->add("POST", "/admin/reviews/{id}/reject", "Admin\ReviewsController@rejectStatus", ['auth']);
$router->add("GET", "/admin/reviews/{id}/edit", "Admin\ReviewsController@edit", ['auth']);
$router->add("POST", "/admin/reviews/{id}/update", "Admin\ReviewsController@update", ['auth']);
$router->add("POST", "/admin/reviews/{id}/delete", "Admin\ReviewsController@delete", ['auth']);

//=============================== CONTACT US ==========================================
$router->add("GET", "/admin/contacts", "Admin\ContactUsController@index", ['auth']);
$router->add("GET", "/admin/contacts/create", "Admin\ContactUsController@create", ['auth']);
$router->add("POST", "/admin/contacts/store", "Admin\ContactUsController@store", ['auth']);
$router->add("GET", "/admin/contacts/{id}/edit", "Admin\ContactUsController@edit", ['auth']);
$router->add("POST", "/admin/contacts/{id}/update", "Admin\ContactUsController@update", ['auth']);
$router->add("GET", "/admin/contacts/{id}/show", "Admin\ContactUsController@show", ['auth']);
$router->add("POST", "/admin/contacts/{id}/delete", "Admin\ContactUsController@delete", ['auth']);

//============================================== PAYMENTS ==================================
$router->add("GET", "/admin/payments", "Admin\PaymentController@index", ['auth']);
$router->add("GET", "/admin/payments/{id}/show", 'Admin\PaymentController@show', ['auth']);
