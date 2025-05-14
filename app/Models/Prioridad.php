<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prioridad extends Model
{
    use HasFactory;

    protected $table = 'prioridades';
    protected $primaryKey = 'prioridad_id';
    public $incrementing = true;
    public $timestamps = false;

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'prioridad_id');
    }
}
