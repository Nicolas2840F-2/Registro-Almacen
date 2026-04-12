<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $primaryKey = "idRegistro";


    public function usuarioR()
    {
        return $this->hasOne(Usuario::class, 'idUsuario', 'usuario');
    }
    public function portatilR()
    {
        return $this->hasOne(Portatil::class, 'idPortatil', 'portatil');
    }
}
