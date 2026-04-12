<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /** @var array<int, string>*/

    protected $guarded = [];

    protected $primaryKey = 'idUsuario';
    protected $table = 'usuarios';

    /** @var array<int, string>*/

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**  @var array<string, string>*/

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function rol(){
        return $this->hasOne(Rol::class, 'idRol','rolUsuario');
    }

    public function tipoDocumento(){
        return $this->hasOne(TipoDocumento::class, 'idTipoDocumento','tipoDocumentoUsuario');
    }

}
