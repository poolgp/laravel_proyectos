<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function showLogin()
    {
        // $usuario = new Usuario();
        // $usuario->nombre_u = 'usuario1';
        // $usuario->contrasena_u = \bcrypt('user1');
        // $usuario->save();n

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $nombre_u = $request->input('nombre_u');
        $contrasena_u = $request->input('contrasena_u');

        $user = Usuario::where('nombre_u', $nombre_u)->first();

        if ($user != null && Hash::check($contrasena_u, $user->contrasena_u)) {
            Auth::login($user);
            $response = redirect('/home');
        } else {
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            $response = redirect('/login')->withInput();
        }
        return $response;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
