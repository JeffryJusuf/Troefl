<?php

namespace App\Http\Middleware;

use App\Models\UserResponse;
use Closure;
use Illuminate\Http\Request;

class ClearUserResponses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the current route is not the quiz result page
        if (!$request->routeIs('quiz.result')) {
            // Delete the user's responses
            UserResponse::where('user_id', auth()->id())->delete();
        }

        return $next($request);
    }
}
