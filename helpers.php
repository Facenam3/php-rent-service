<?php

use Core\View;
use App\Services\Csrf;

if (!function_exists('partial')) {
  function partial(string $template, array $data = []): string {
    return View::partial($template, $data);
  }
}

function buildQueryString(array $params, $page) : string {
        $params['page'] = $page;
        return http_build_query($params);
}

if(!function_exists('csrf_token')) {
  function csrf_token() : string {
    return '<input type="hidden" name="' . CSRF::CSRF_TOKEN_FIELD_NAME . '" value="' . CSRF::getToken() . '">';
  }
}
  