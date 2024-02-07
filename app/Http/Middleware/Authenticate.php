<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        if (!$request->expectsJson()) {
            if (FacadesRequest::fullUrlIs("http://127.0.0.1:8000/admin*")) {
                return route('get.admin.login');
            } else {

                return route('login');
            }
        }
        return null;
    }
}
