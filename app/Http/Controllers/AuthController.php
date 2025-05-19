<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller; 

class AuthController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLoginForm()
    {
        return view('sesion');
    }

    /**
     * Procesar el login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar autenticación
        if (Auth::attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('registrado');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('usuario');
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegistrationForm()
    {
        return view('registro');
    }

    /**
     * Procesar el registro
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'usuario' => 'required|string|alpha_num|unique:usuarios,usuario', //aqui 
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'password' => [
                'required',
                'string',
                'min:7',
                'max:8',
                'regex:/^[A-Z]/',
                'confirmed'
            ],
        ], [
            'password.regex' => 'La contraseña debe iniciar con una letra mayúscula.',
            'usuario.alpha_num' => 'El usuario solo puede contener letras y números.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('sesion')
                        ->with('success', 'Registro exitoso. Por favor inicia sesión.');
    }

    /**
     * Mostrar perfil de usuario
     */
    public function showProfile()
    {
        $user = Auth::user();
        
        return view('perfil', [
            'usuario' => $user->usuario,
            'nombre' => $user->nombre,
            'apellido' => $user->apellido,
            'email' => $user->email
        ]);
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('sesion');
    }
}