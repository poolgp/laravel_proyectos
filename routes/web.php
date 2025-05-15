<?php

use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/logout', [UsuarioController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();
        return view('home', compact('user'));
    });
});

Route::resource('proyecto', ProyectoController::class);
Route::delete('proyecto/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyecto.destroy');
