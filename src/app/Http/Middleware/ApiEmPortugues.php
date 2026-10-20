<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Mensagens de validação da API em português (lang/pt_BR).
// O site e o admin continuam com o idioma do .env.
class ApiEmPortugues
{
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale('pt_BR');

        return $next($request);
    }
}
