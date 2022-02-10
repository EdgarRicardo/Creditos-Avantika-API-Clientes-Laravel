<?php

namespace App\Http\Middleware;

use App\Helpers\JwtAuth;
use App\Models\User;
use App\Models\Usuario;
use Closure;

class ApiAuthMiddleware
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
        $token = $request->header('Authorization');
        $jwtAuth = new JwtAuth();
        $decodedToken = $jwtAuth->checkToken($token,true);
        if ($decodedToken) {
            $user =  Usuario::find($decodedToken->sub);
            $request->merge(['loggedUser' => $user]);
            return $next($request);
        }else{
            return response()->json([
                'code' => 400,
                'message' => 'Token not validated',
            ], 400);
        }
    }
}
