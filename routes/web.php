<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\loginController;


Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::view('/cadastrar', 'cadUsuario'); // Exibe o formulário
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