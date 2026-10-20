<?php

namespace App\Providers;

use App\Models\Regiao;
use App\Models\Categoria;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
// use illuminate\View\view;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // API: 5 tentativas de login por minuto para o mesmo e-mail
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by(mb_strtolower((string) $request->input('email')));
        });

        // API: 10 cadastros por minuto por IP
        RateLimiter::for('cadastro', function (Request $request) {
            return Limit::perMinute(10)->by($request->ip());
        });

        View::composer('partials.header', function ($view) {

            // Buscar todas as categorias ordenadas por nome
            $categorias = Categoria::orderBy('nome_categoria')->get();
            // dd($categorias);
            // var_dump($categorias);

           $view->with('categorias', $categorias);

        });

        // view::composer('partials.header', function ($view) {

        //     // Buscar todas as categorias ordenadas por nome
        //     $regiao = Regiao::orderBy('nome_regiao')->get();
        //     // dd($categorias);
        //     // var_dump($categorias);

        //    $view->with('regiao', $regiao);

        // });
    }
}
