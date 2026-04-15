<!DOCTYPE html>
<html lang="pt-BR">

<head>
    @include('partials.head')
</head>

<body>

    <div class="page-wrapper">
        @include('partials.preloader')

        @include('partials.header')

        <main>
            @yield('content')
            @include('site.home.banner')
            @include('site.home.servicos')
            @include('site.home.cta')
            @include('site.home.portfolio')
            @include('site.home.recursos')
            @include('site.home.receitas')
            @include('site.home.depoimentos')
            @include('site.home.precos')
        </main>

        @include('partials.footer')


    </div>

    @include('partials.script')

</body>

</html>