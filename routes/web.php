<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\loginController;


Route::post('/usuarios', [UsuarioController::class, 'store'])->name("usuario.store"); // Rota para cadastrar usuário
Route::get('/', function () {
    return view('welcome'); // Exibe a página inicial
})->name('welcome'); // Rota para a página inicial
Route::view('/cadastrar', 'cadUsuario')->name('cadastrar'); // Exibe o formulário
Route::get('/sucesso', function () {
    return view('sucessCad'); // Exibe a página de sucesso
});
Route::get('/login', [App\Http\Controllers\loginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\loginController::class, 'login'])->name('login.submit');
Route::get('/logout', function () {
    session()->forget('usuario_id');
    return redirect('/login');
});
Route::get('/dashboard', function () {
    if (!session()->has('usuario_id')) {
        return redirect('/login');
    }
    return view('dashboard'); // Exibe a página do dashboard
})->name('dashboard');
Route::get('/produtos', function () {
    return view('/produtos/cadProduto'); // Exibe a página de produtos
})->name('produtos');
Route::post('/produtos', [App\Http\Controllers\produtoController::class, 'store'])->name('produto.store'); // Rota para cadastrar produto   