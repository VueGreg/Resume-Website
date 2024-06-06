<?php

namespace App\Http\Middleware;

use App\Models\information;
use Closure;
use Illuminate\Http\Request;

class APITokenAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'Token missing'], 401);
        }

        $api = information::where('tokenAPI', $token)->get();

        if (!$api) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}

