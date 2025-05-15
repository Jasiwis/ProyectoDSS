<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nota;

class NotasController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('sesion');
        }

        $notas = Nota::with('categoria')
                    ->where('usuario_id', Auth::id())
                    ->get();

        $categorias = Categoria::all();

        return view('notas', [
            'notas' => $notas,
            'categorias' => $categorias
        ]);
    }

    public function crud(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'error' => 'Usuario no autenticado'
            ], 401);
        }

        try {
            $accion = $request->input('accion');
            $usuario_id = Auth::id();

            switch ($accion) {
                case 'crear':
                    return $this->crearNota($request, $usuario_id);
                case 'actualizar':
                    return $this->actualizarNota($request, $usuario_id);
                case 'eliminar':
                    return $this->eliminarNota($request, $usuario_id);
                default:
                    return response()->json([
                        'success' => false,
                        'error' => 'Acción no válida'
                    ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function crearNota(Request $request, $usuario_id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'categoria_id' => 'required|integer|exists:categorias,id'
        ]);

        $nota = Nota::create($validated + ['usuario_id' => $usuario_id]);

        return response()->json([
            'success' => true,
            'message' => 'Nota creada exitosamente',
            'nota' => $nota
        ]);
    }

    private function actualizarNota(Request $request, $usuario_id)
{
    $validated = $request->validate([
        'id' => 'required|integer|exists:notas,id',
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string',
        'categoria_id' => 'required|integer|exists:categorias,id'
    ]);

    $nota = Nota::where('id', $request->id)
              ->where('usuario_id', $usuario_id)
              ->firstOrFail();

    $nota->update([
        'titulo' => $validated['titulo'],
        'contenido' => $validated['contenido'],
        'categoria_id' => $validated['categoria_id'],
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Nota actualizada exitosamente',
        'nota' => $nota
    ]);
}

    private function eliminarNota(Request $request, $usuario_id)
    {
        $request->validate([
            'id' => 'required|integer|exists:notas,id'
        ]);

        $nota = Nota::where('id', $request->id)
                  ->where('usuario_id', $usuario_id)
                  ->firstOrFail();

        $nota->delete();

        return response()->json([
            'success' => true,
            'message' => 'Nota eliminada exitosamente'
        ]);
    }

    public function getNota(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'error' => 'Acceso denegado. Inicia sesión primero.'
            ], 401);
        }

        $validated = $request->validate([
            'id' => 'required|integer|exists:notas,id'
        ]);

        $nota = Nota::where('id', $request->id)
                  ->where('usuario_id', Auth::id())
                  ->firstOrFail();

        return response()->json([
            'success' => true,
            'nota' => $nota
        ]);
    }
}