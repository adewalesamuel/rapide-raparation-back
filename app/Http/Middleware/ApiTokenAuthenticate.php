<?php

namespace App\Http\Middleware;

use App\Models\Utilisateur;
use Closure;
use Illuminate\Http\Request;

class ApiTokenAuthenticate
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
        $token = $request->header('Authorization') ? explode(" ", $request->header('Authorization'))[1] : null;

        if (!$token || !Utilisateur::where("api_token", $token)->exists()) {
            $data = [
                "success" => false,
                "message" => "Non authentifié"
            ];

            return response()->json($data, 401);
        }

        return $next($request);
    }
}
