<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $primaryKey = 'idRol';
    protected $table = 'roles';
}
