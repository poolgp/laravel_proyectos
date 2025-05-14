<?php

namespace App\Models;

use App\Models\Rol;
use App\Models\Usuario;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProyectoUsuario extends Model
{
    use HasFactory;

    protected $table = 'proyectos_usuarios';
    protected $primaryKey = 'proyecto_usuario_id';
    public $incrementing = true;
    public $timestamps = false;

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
