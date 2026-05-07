<!--Page Title-->
 @php
 $features = asset('davilla/images/fundosobre1.jpg');
 @endphp
 <section class="page-title" style="background-image:url('{{ $features }}');">
     <div class="auto-container">
         <h1>{{ $produto->nome_produto }}</h1>
         <ul class="page-breadcrumb">
             <li><a href="{{ route('home') }}">home</a></li>
             <li><a href="{{ route('cardapio') }}">Categoria</a></li>
             <li>{{ $produto->nome_produto }}</li>
         </ul>
     </div>
 </section>
 <!--End Page Title-->