<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        
        return view('perfil', [
            'usuario' => $usuario->usuario,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'email' => $usuario->email
        ]);
    }

    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('sesion');
    }
}