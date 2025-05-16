@extends('layouts.main')

@section('title', 'Gestión de Tareas')

@section('content')

    @include('partials.mensajes')

    <form action="{{ action([App\Http\Controllers\TareaController::class, 'store']) }}" method="POST">
        @csrf
        <input type="hidden" name="proyecto_id" value="{{ $proyecto->proyecto_id }}">

        <div class="mb-3">
            <label>Título de la tarea</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Proyecto</label>
            <input type="text" class="form-control" value="{{ $proyecto->nombre_p }}" readonly>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" class="form-control" value="PENDIENTE" readonly>
        </div>

        <div class="mb-3">
            <label>Prioridad</label>
            <select name="prioridad" class="form-control">
                @foreach ($prioridades as $prioridad)
                    <option value="{{ $prioridad->prioridad_id }}">{{ $prioridad->nombre_p }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo de Tarea</label>
            <select name="tipo" class="form-control">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->tipo_id }}">{{ $tipo->nombre_t }}</option>
                @endforeach
            </select>
        </div>

        {{-- @if ($usuario === administrador) --}}
        <div class="mb-3">
            <label>Asignar a</label>
            <select name="usuario_id" class="form-control">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->usuario_id }}">{{ $usuario->nombre_u }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ url('tarea') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
