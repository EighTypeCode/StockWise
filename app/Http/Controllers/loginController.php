<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Procura o usuário pelo email
        $usuario = Usuario::where('email', $request->email)->first();

        // Verifica se o usuário existe e se a senha confere
        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            // Armazena o ID do usuário na sessão
            session(['usuario_id' => $usuario->id]);

            return redirect('/dashboard'); // Redireciona para a home
        }

        // Erro: usuário não encontrado ou senha incorreta
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }
}
