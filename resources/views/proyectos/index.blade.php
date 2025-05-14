@extends('layouts.main')

@section('title', 'Proyectos')

@section('content')

    @include('partials.mensajes')

    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2>
                <i class="fas fa-folder-open"></i>
                Mis Proyecto
            </h2>

            <div>
                <a href="{{ url('proyecto/create') }}" class="btn btn-success">Crear Proyecto</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Ini.</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Ver Tareas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->proyecto_id }}</td>
                        <td>{{ $proyecto->nombre_p }}</td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td>{{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d-m-Y') }}</td>
                        <td><i class="fa-solid fa-pen-to-square"></i></td>
                        <td><i class="fa-solid fa-trash-can"></i></td>
                        <td><i class="fa-solid fa-arrow-right"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
