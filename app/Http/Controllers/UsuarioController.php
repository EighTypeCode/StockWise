<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Laravel\Pail\ValueObjects\Origin\Console;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        // Validação simples dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:100',
            'senha' => 'required|string|min:6|confirmed', // 'senha_confirmation' é verificado automaticamente pelo Laravel com 'confirmed'
            'email' => 'required|email|max:100|unique:usuario,email', // Verifica se o email é único
        ]);
        // Verifica se o usuário já existe
        $usuarioExistente = Usuario::where('email', $request->email)->first();
        if ($usuarioExistente) {
            Console::line('Usuário já existe com este email.');
            return redirect()->back()->withErrors(['email' => 'Já existe um usuário cadastrado com este email.'])->withInput();
        }
        // Criar e salvar o usuário
            $usuario = new Usuario();
            $usuario->nome = $request->nome;
            $usuario->senha = Hash::make($request->senha); // senha segura
            $usuario->email = $request->email;
            $usuario->save();

            return redirect('/sucesso')->with('success', 'Usuário cadastrado com sucesso!');

    }
}
