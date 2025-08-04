<?php

namespace App\Services;

use App\Models\Review;
use Core\Router;

class Authorization {
    public static function verify(
         string $action, 
        mixed $resource = null
    ): void {
        if(!static::check($action,$resource)) {
            Router::forbidden();
        }
    }

    public static function check(
        string $action, 
        mixed $resource = null
        ): bool {
            $user = Auth::user();

            if(!$user) {
                return false;
            }

            if('admin' === $user->role) {
                return true;
            }

            return match($action) {
                'dashboard' => in_array($user->role, ['admin']),
                'review','edit_review', 'delete_review' => $resource instanceof Review && 
                ($user->id === $resource->user_id) || in_array($user->role, ['admin']),
                default => false
            };
    }
}