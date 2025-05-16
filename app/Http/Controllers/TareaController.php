<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Tarea;
use App\Models\Estado;
use App\Models\Usuario;
use App\Models\Proyecto;
use App\Models\Prioridad;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Clases\Utilidad;

class TareaController extends Controller
{
    public function index(Request $request)
    {
        $proyectoId = $request->input('proyecto');

        $tareas = Tarea::where('proyecto_id', $proyectoId)->get();

        return view('tareas.index', compact('proyectoId', 'tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $proyectoId = $request->input('proyectoId');

        $proyecto = Proyecto::select('proyecto_id', 'nombre_p')
            ->where('proyecto_id', $proyectoId)
            ->first();

        $prioridades = Prioridad::orderBy('prioridad_id')->get();
        $tipos = Tipo::orderBy('tipo_id')->get();

        $usuarios = Usuario::orderBy('usuario_id')->get();

        return view('tareas.create', compact('proyecto', 'prioridades', 'tipos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Recuperar los datos del formulario
        $proyectoId = $request->input('proyecto_id');
        $titulo = $request->input('titulo');
        $prioridad = $request->input('prioridad');
        $tipo = $request->input('tipo');
        $usuarioId = $request->input('usuario_id');

        $tarea = new Tarea();
        $tarea->proyecto_id = $proyectoId;
        $tarea->titulo = $titulo;
        $tarea->prioridad_id = $prioridad;
        $tarea->tipo_id = $tipo;
        $tarea->usuario_id = $usuarioId;

        try {
            $tarea->save();
            $request->session()->flash("mensaje", "Registro ingresado correctamente.");
            $response = redirect()->action([TareaController::class, "index"], ['proyecto' => $proyectoId]);
        } catch (QueryException $ex) {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash("error", $mensaje);
            $response = redirect()->action([TareaController::class, "create"])->withInput();
        }

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    public function updateEstado() {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
