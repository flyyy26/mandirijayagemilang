<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Check if the request expects a JSON response (for API requests)
        if (! $request->expectsJson()) {
            return route('admin.login'); // Adjust this to your actual login route name
        }
    }

    // The unauthenticated method is not necessary here since redirectTo handles the redirection.
}
