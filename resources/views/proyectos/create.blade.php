@extends('layouts.main')

@section('title', 'Crear Proyecto')

@section('content')
    <div class="container mt-4">
        {{-- route('proyecto.store') --}}
        <form id="crearProyectoForm" action="{{ url('proyecto') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>
                    <i class="fas fa-plus-circle"></i>
                    Crear Proyecto
                </h2>

                <div>
                    {{-- {{ route('proyectos.index') }} --}}
                    <a href="{{ url('proyecto') }}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" form="crearProyectoForm" class="btn btn-success">Confirmar</button>
                </div>
            </div>

            <div class="card shadow-lg rounded">
                <div class="card-body">
                    <div class="scroll-form">

                        <div class="mb-3">
                            <label for="nombre_p" class="form-label">Título del Proyecto</label>
                            <input type="text" class="form-control" id="nombre_p" name="nombre_p" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción del Proyecto</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Administrador</label>
                            <input type="text" class="form-control" name="administrador"
                                value="{{ Auth::user()->nombre_u }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Añadir Colaboradores</label>
                            <div>
                                @foreach ($usuarios as $colaborador)
                                    @if ($colaborador->usuario_id !== Auth::user()->usuario_id)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="colaboradores[]"
                                                value="{{ $colaborador->usuario_id }}"
                                                id="colaborador{{ $colaborador->usuario_id }}">
                                            <label class="form-check-label" for="colaborador{{ $colaborador->usuario_id }}">
                                                {{ $colaborador->nombre_u }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
