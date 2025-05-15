<?php

namespace App\Models;

use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $primaryKey = 'proyecto_id';
    public $incrementing = true;
    public $timestamps = false;

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'proyectos_usuarios', 'proyecto_id', 'usuario_id')
            ->withPivot('rol_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'proyecto_id');
    }
}
