<?php

namespace App\Models;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';
    protected $primaryKey = 'tipo_id';
    public $incrementing = true;
    public $timestamps = false;

    public function tarea()
    {
        return $this->hasMany(Tarea::class, 'tarea_id');
    }
}
