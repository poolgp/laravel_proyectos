<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $primaryKey = 'estado_id';
    public $incrementing = true;
    public $timestamps = false;

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'estado_id');
    }
}
