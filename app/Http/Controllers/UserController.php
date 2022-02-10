<?php

namespace App\Http\Controllers;

use App\Helpers\JwtAuth;
use App\Mail\SendGridMail;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;
use File;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return DB::select("SELECT * FROM clientes");
    }

    // Show the form for creating a new resource.
    public function create()
    {

    }

    // Function for user creation
    public function store(Request $request)
    {
        // Get the form data
        $inputData = $request->all();
        // Data validation
        $dataValidation = validator($inputData,[
            'id' => ['required','unique:clientes,id','integer','gt:0'],
            'nombre' => ['required'],
            'direccion' => ['required'],
            'edad' => ['required','integer','between:18,99'],
            'genero' => ['required',Rule::in(['Masculino', 'Femenino'])]
        ]);

        if($dataValidation->fails()){
            return response()->json([
                'message' => 'Problem with the user creation',
                'errors' => $dataValidation->errors()
            ],400);
        }else{
            // User creation
            try {
                $user = new Usuario();
                $user->id = $request->id;
                $user->nombre = strtoupper($request->nombre);
                $user->direccion = $request->direccion;
                $user->edad = $request->edad;
                $user->genero = $request->genero;
                $user->save();
                return response()->json([
                    'message' => 'User creation successful',
                    'user' => $user
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => $th->getMessage(),
                ],400);
            }

        }

    }
}
