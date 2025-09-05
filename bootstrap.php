<?php

declare (strict_types = 1);
require_once __DIR__ . '/vendor/autoload.php';


use Core\App;
use Core\Database;
use Core\ErrorHandler;
use App\Services\Mailer;

set_exception_handler([ErrorHandler::class, 'handleException']);
set_error_handler([ErrorHandler::class, 'handleError']);

$config = require_once __DIR__ . '/config.php';

App::bind('config', $config);
App::bind('database',  new Database($config['database']));
App::bind('google', $config['google']);

$appEnv = getenv('APP_ENV') ?: 'development';

$mailConfig = [
    'host'       => getenv('MAIL_HOST'),
    'username'   => getenv('MAIL_USERNAME'),
    'password'   => getenv('MAIL_PASSWORD'),
    'port'       => getenv('MAIL_PORT'),
    'from_email' => getenv('MAIL_FROM_EMAIL'),
    'from_name'  => getenv('MAIL_FROM_NAME'),
];

App::bind('mailer', new Mailer($mailConfig));

