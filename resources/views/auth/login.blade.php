@extends('layouts.main')

@section('title', 'Login Page')

@section('content')

    @include('partials.mensajes')

    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="nombre_u" class="col-sm-2 col-form-label">Nombre Usuario</label>
                    <div class=col-sm-10>
                        <input type="text" class="form-control" id="nombre_u" name="nombre_u" placeholder="Nombre Usuario"
                            autofocus value="{{ old('nombre_u') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contrasena_u" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class=col-sm-10>
                        <input type="contrasena_u" class="form-control" id="contrasena_u" name="contrasena_u"
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
            </form>
        </div>
    </div>
@endsection
