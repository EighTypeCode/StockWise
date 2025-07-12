<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 👇 É SÓ ADICIONAR ESTA PARTE AQUI DENTRO
        $middleware->validateCsrfTokens(except: [
            'usuarios',
            'usuarios/*', // Permite a rota e qualquer sub-rota
            'produtos',
            'produtos/*', // Permite a rota e qualquer sub-rota
            'produtos/cadProduto',
            'produtos/cadProduto/*', // Permite a rota e qualquer sub-rota
            'produtos/store',
            'produtos/store/*', // Permite a rota e qualquer sub-rota
            'produtos/cadProduto/store',
            'produtos/cadProduto/store/*', // Permite a rota e qualquer sub-ro
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();