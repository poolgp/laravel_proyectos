@extends('layouts.main')

@section('title', 'Login Page')

@section('content')

    @include('partials.mensajes')

    <div class="container mt-4">
        <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
            @csrf
            <div class="card shadow-lg rounded">
                <div class="card-header">
                    <h4>
                        <i class="fa-solid fa-right-to-bracket"></i>
                        LogIn
                    </h4>
                </div>

                <div class="card-body">
                    <div class="scroll-form">
                        <div class="mb-3">
                            <label for="nombre_u" class="form-label">Nombre Usuario</label>
                            <input type="text" class="form-control" id="nombre_u" name="nombre_u"
                                placeholder="Nombre Usuario" autofocus value="{{ old('nombre_u') }}">
                        </div>

                        <div class="mb-3">
                            <label for="contrasena_u" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena_u" name="contrasena_u"
                                placeholder="Contraseña" value="{{ old('contrasena_u') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 d-flex flex-row-reverse">
                            <a href="{{ url('/') }}" class="btn btn-secondary float-right ms-1">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-primary float-right">
                                Acceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
