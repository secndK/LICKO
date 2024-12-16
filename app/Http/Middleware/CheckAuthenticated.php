<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            // Redirigez vers la page de connexion si non authentifié
            return redirect()->route('login');
        }

        return $next($request);
    }
}
