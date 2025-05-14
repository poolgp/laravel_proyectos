<?php

namespace App\Models;

use App\Models\ProyectoUsuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'rol_id';
    public $incrementing = true;
    public $timestamps = false;

    public function proyectosUsuarios()
    {
        return $this->hasMany(ProyectoUsuario::class, 'rol_id');
    }
}
