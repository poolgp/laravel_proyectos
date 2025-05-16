@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    {{ $user->nombre_u }}
    <h1>Bienvenido a la aplicación de gestión de proyectos</h1>
@endsection
