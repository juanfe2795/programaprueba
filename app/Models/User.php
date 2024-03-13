<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory;
	
    public $timestamps = true;

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'numero_documento',
        'firstname',
        'lastname',
        'email',
        'img_profile',
        'tipo_vinculacion_id',
        'entidad_id',
        'rol_id',
        'updated_at',
        'borrado'
    ];
}

