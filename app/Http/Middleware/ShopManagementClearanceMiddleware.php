<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShopManagementClearanceMiddleware {

    public function handle($request, Closure $next) {

        if (Auth::user()->hasPermissionTo('Administer roles & permissions')){ //If user has this //permission{
            return $next($request);
        }

        if (!Auth::user()->hasPermissionTo('Shop management')) {
            abort('401');
        }else{
            return $next($request);
        }


        return $next($request);
    }
}