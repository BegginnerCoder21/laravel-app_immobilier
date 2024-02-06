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
        //return $request->expectsJson() ? null : route('login');
        if(! $request->expectsJson()){
            if(FacadesRequest::is(app()->getLocale() . '/admin*')){
                return route('get.admin.login');
            }
            else{
                return route('login');
            }
        }
        return null;
    }
}
