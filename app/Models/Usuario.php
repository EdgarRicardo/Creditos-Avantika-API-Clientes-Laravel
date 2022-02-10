<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;

class Usuario extends AuthUser
{
    use Notifiable;
    protected $table = "clientes";

    protected $fillable = [
        'id', 'nombre', 'direccion', 'edad', 'genero'
    ];
}
