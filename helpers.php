<?php

use Core\View;

if (!function_exists('partial')) {
  function partial(string $template, array $data = []): string {
    return View::partial($template, $data);
  }
}

function buildQueryString(array $params, $page) : string {
        $params['page'] = $page;
        return http_build_query($params);
}
  