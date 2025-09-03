<?php

namespace App\Services;

class CSRF {
    private const CSRF_TOKEN_LENGTH = 32;
    private const CSRF_TOKEN_LIFETIME = 60 * 30;
    public const CSRF_TOKEN_FIELD_NAME = "_token";


    public static function generateCsrfToken() : string {
        $token = bin2hex(random_bytes(static::CSRF_TOKEN_LENGTH));
        $_SESSION['csrf_token'] = [
            'token' => $token,
            "expires" => time() + static::CSRF_TOKEN_LIFETIME
        ];

        return $token;
    }

    public static function getToken() : string {
        if(!isset($_SESSION['csrf_token']) || static::isTokenExpired()) {
            return static::generateCsrfToken();
        }

        return $_SESSION['csrf_token']['token'];
    }

    public static function verify(?string $token = null) : bool {
        $method = $_SERVER['REQUEST_METHOD'];
        if(in_array($method, ['GET', 'HEAD', 'OPTIONS'])) {
            return true;
        }

        $csrfToken = $token ?? $_POST[static::CSRF_TOKEN_FIELD_NAME] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

        if(!empty($csrfToken) && !static::isTokenExpired() && hash_equals($_SESSION['csrf_token']['token'] ?? '', $csrfToken)) {
            static::generateCsrfToken();
            return true;
        }

        return false;
    }

    private static function isTokenExpired():bool {
        if (!isset($_SESSION['csrf_token']) || !isset($_SESSION['csrf_token']['expires'])) {
        return true;
        }

        return time() > $_SESSION['csrf_token']['expires'];
    }
}