<?php

use App\Http\Middleware\ApiEmPortugues;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(fn () => route('admin.login'));
        $middleware->api(prepend: [ApiEmPortugues::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Erros da API: sempre JSON com "success": false e "message" em português
        $erroApi = fn (string $mensagem, int $status, array $extra = []) => response()->json(
            ['success' => false, 'message' => $mensagem] + $extra,
            $status,
            $status === 429 ? ['Retry-After' => 60] : []
        );

        $exceptions->shouldRenderJsonWhen(fn (Request $request) => $request->is('api/*') || $request->expectsJson());

        $exceptions->render(function (AuthenticationException $e, Request $request) use ($erroApi) {
            if ($request->is('api/*')) {
                return $erroApi('Sessão expirada. Faça login novamente.', 401);
            }
        });

        $exceptions->render(function (ValidationException $e, Request $request) use ($erroApi) {
            if ($request->is('api/*')) {
                $erros = $e->errors();

                return $erroApi(collect($erros)->flatten()->first(), 422, ['errors' => $erros]);
            }
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) use ($erroApi) {
            if ($request->is('api/*')) {
                return $erroApi('Recurso não encontrado.', 404);
            }
        });

        $exceptions->render(function (ThrottleRequestsException $e, Request $request) use ($erroApi) {
            if ($request->is('api/*')) {
                return $erroApi('Muitas tentativas. Aguarde um minuto e tente novamente.', 429);
            }
        });

        $exceptions->render(function (HttpExceptionInterface $e, Request $request) use ($erroApi) {
            if ($request->is('api/*')) {
                return $erroApi($e->getMessage() ?: 'Erro na requisição.', $e->getStatusCode());
            }
        });

        // 500 em produção: sem detalhes internos. Em debug, mantém o erro completo.
        $exceptions->render(function (Throwable $e, Request $request) use ($erroApi) {
            if ($request->is('api/*') && ! config('app.debug')) {
                return $erroApi('Erro interno no servidor.', 500);
            }
        });
    })->create();
