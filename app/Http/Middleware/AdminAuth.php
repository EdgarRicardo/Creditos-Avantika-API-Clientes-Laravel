<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $idUser = $request->loggedUser->id;
        $user=Usuario::find($idUser);
        if($user->admin == 0)
            return response()->json([
                'code' => 400,
                'message' => 'Tu no puedes usar esta ruta',
            ], 400);
        return $next($request);
    }
}
