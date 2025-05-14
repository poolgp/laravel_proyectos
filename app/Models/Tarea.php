<?php

namespace App\Models;

use App\Models\Estado;
use App\Models\Usuario;
use App\Models\Proyecto;
use App\Models\Prioridad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';
    protected $primaryKey = 'tarea_id';
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

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'prioridad_id');
    }
}
