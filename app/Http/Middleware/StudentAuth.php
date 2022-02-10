<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class StudentAuth
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
        $user=User::find($idUser);
        if(!in_array($user->user_type_id,[1,2])) // 2 = Student 1 = Admin
            return response()->json([
                'code' => 400,
                'message' => 'Request not validate for your role',
            ], 400);
        return $next($request);
    }
}
