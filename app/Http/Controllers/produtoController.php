<?php

namespace App\Http\Controllers;
use App\Models\produto;
use Laravel\Pail\ValueObjects\Origin\Console;

use Illuminate\Http\Request;

class produtoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'categoria' => 'required|string|',
            'descricao' => 'required|string|max:255',
            'precoUnitario' => 'required|numeric|min:0',
            'quantEstoque' => 'required|integer|min:0',
        ]);
        // Verifica se o produto já existe
        $produtoExistente = produto::where('nome', $request->nome)->first();
        if ($produtoExistente) {
            Console::line('Produto já existe com este nome.');
            return redirect()->back()->withErrors(['nome' => 'Já existe um produto cadastrado com este nome.'])->withInput();
        }
        // Criar e salvar o produto
        $produto = new produto();
        $produto->nome = $request->nome;
        $produto->categoria = $request->categoria;
        $produto->descricao = $request->descricao;  
        $produto->precoUnitario = $request->precoUnitario;
        $produto->quantEstoque = $request->quantEstoque;
        $produto->save();   
        return redirect('/sucesso')->with('success', 'Produto cadastrado com sucesso!');
    }
}
