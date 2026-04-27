<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('partials.header', function ($view) {

            // Buscar todas as categorias ordenadas por nome
            $categorias = Categoria::orderBy('nome_categoria')->get();
            dd($categorias);
            // var_dump($categorias);

           $view->with('categorias', $categorias);

        });
    }
}
