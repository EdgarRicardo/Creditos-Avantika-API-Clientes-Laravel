<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class tokenValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $vericationKey= 'secretVerification@jajaja!';
    public function handle(Request $request, Closure $next)
    {
        $token = $request->token;
        try {
            $decodedToken = JWT::decode($token, $this->vericationKey,['HS256']);
            $request->merge(['decodedToken' => $decodedToken]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => $th->getMessage(),
            ], 400);
        }
        return $next($request);
    }
}
