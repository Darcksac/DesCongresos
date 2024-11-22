<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login'); // Esto debería devolver la vista de login
    }

    /**
     * Maneja la autenticación de los usuarios.
     */
    public function store(Request $request)
    {
        // Valida las credenciales del usuario
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Si la autenticación es exitosa
        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenera la sesión para prevenir problemas de fijación de sesión
            $request->session()->regenerate();

            // Redirige al CRUD de eventos en lugar del dashboard
            return redirect()->route('eventos.index');
        }

        // Si las credenciales no son correctas, redirige al login con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/inicio');
    }
}
