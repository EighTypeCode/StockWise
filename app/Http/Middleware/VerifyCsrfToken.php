<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * As URIs que devem ser excluídas da verificação CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/usuarios', // Adicionado para permitir o uso do Postman nesta rota
    ];
}