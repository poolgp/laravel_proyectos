@extends('layouts.main')

@section('title', 'Tareas')

@section('content')

    @include('partials.mensajes')

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-folder-open"></i> Gestión de Tareas: Proyecto 1</h2>

            <a href="{{ route('tarea.create', ['proyectoId' => $proyectoId]) }}" class="btn btn-success">
                Crear Tarea
            </a>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 rounded shadow-lg h-100" style="background-color: #ff6b6b; color: white; min-height: 500px;">
                    <h3 class="fw-bold text-center">PENDIENTE</h3>
                    <hr class="bg-light border-2 border-top border-white opacity-50 my-3">
                    <div class="tareas-pendientes">
                        @foreach ($tareas as $tarea)
                            @if ($tarea['estado_id'] === 1)
                                <div class="card" >
                                    {{ $tarea['titulo'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 rounded shadow-lg h-100"
                    style="background-color: #f7b731; color: white; min-height: 500px;">
                    <h3 class="fw-bold text-center">EN PROCESO</h3>
                    <hr class="bg-light border-2 border-top border-white opacity-50 my-3">
                    <div class="tareas-proceso">
                        @foreach ($tareas as $tarea)
                            @if ($tarea['estado_id'] === 2)
                                <div class="card">
                                    {{ $tarea['titulo'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 rounded shadow-lg h-100"
                    style="background-color: #20bf6b; color: white; min-height: 500px;">
                    <h3 class="fw-bold text-center">FINALIZADO</h3>
                    <hr class="bg-light border-2 border-top border-white opacity-50 my-3">
                    <div class="tareas-finalizadas">
                        @foreach ($tareas as $tarea)
                            @if ($tarea['estado_id'] === 3)
                                <div class="card">
                                    {{ $tarea['titulo'] }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
