<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Informe o e-mail.',
            'email.email' => 'Informe um e-mail válido.',
            'password.required' => 'Informe a senha.',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || $usuario->password !== $request->password) {
            return back()
                ->withInput($request->only('email'))
                ->with('erro', 'E-mail ou senha incorretos.');
        }

        session([
            'usuario_id' => $usuario->idusuario,
            'usuario_nome' => $usuario->name,
            'usuario_email' => $usuario->email,
        ]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }
}