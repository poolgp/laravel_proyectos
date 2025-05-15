<?php

namespace App\Models;

use App\Models\Tarea;
use App\Models\Proyecto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    public $incrementing = true;
    public $timestamps = false;

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyectos_usuarios', 'usuario_id', 'proyecto_id')
            ->withPivot('rol_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'usuario_id');
    }
}
