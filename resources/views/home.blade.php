@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    {{ $user->nombre_u }}
@endsection
