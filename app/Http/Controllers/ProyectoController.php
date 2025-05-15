<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function index()
    {
        // $proyectos = Proyecto::all();
        // return view('proyectos.index', compact('proyectos'));

        $usuario = Auth::user();
        $proyectos = $usuario->proyectos;
        return view('proyectos.index', compact('proyectos'));
    }


    public function create()
    {
        $usuarios = Usuario::all();
        return view('proyectos.create', compact('usuarios'));
    }


    public function store(Request $request)
    {
        // Obtener el usuario logueado
        $usuario = Auth::user();

        // Crear el proyecto
        $proyecto = new Proyecto();
        $proyecto->nombre_p = $request->input('nombre_p');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->fecha_inicio = $request->input('fecha_inicio');
        $proyecto->fecha_fin = $request->input('fecha_fin');
        $proyecto->save();

        // Asignar al usuario actual como administrador (rol_id = 1)
        $proyecto->usuarios()->attach($usuario->usuario_id, ['rol_id' => 1]);

        // Agregar colaboradores si existen (rol_id = 2)
        if ($request->has('colaboradores')) {
            foreach ($request->input('colaboradores') as $colaborador_id) {
                $proyecto->usuarios()->attach($colaborador_id, ['rol_id' => 2]);
            }
        }

        return redirect()->route('proyecto.index')->with('success', 'Proyecto creado exitosamente.');
    }


    public function show(Proyecto $proyecto)
    {
        //
    }


    public function edit(Proyecto $proyecto)
    {
        $usuarios = Usuario::all();
        return view('proyectos.edit', compact('proyecto', 'usuarios'));
    }


    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto->nombre_p = $request->input('nombre_p');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->fecha_inicio = $request->input('fecha_inicio');
        $proyecto->fecha_fin = $request->input('fecha_fin');
        $proyecto->save();

        return redirect()->route('proyecto.index')->with('success', 'Proyecto actualizado correctamente.');
    }


    public function destroy(Proyecto $proyecto)
    {
        $proyecto->usuarios()->detach();
        $proyecto->delete();
        return redirect()->route('proyecto.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
