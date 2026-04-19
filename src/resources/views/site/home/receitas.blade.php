 <!-- Seção de Receitas  -->
 @php
 $features = asset('davilla/images/fundoReceitas.png');
 @endphp
 <section class="recipes-section" style="background-image: url('{{ $features }}')">
     <div class="auto-container">
         <div class="sec-title text-center">
             <div class="divider"><img src="{{ asset('davilla/images/icons/divider_1.png') }}" alt=""></div>
             <h2>Receitas para você</h2>
         </div>

         <!-- Recipes Carousel -->
         <div class="recipes-carousel owl-carousel owl-theme">
             <!-- Recipe Block -->
             <div class="recipe-block">
                 <figure class="recipe-image"><img src="{{ asset('davilla/images/receita1.png') }}" alt=""></figure>
             </div>

             <!-- Recipe Block -->
             <div class="recipe-block">
                 <figure class="recipe-image"><img src="{{ asset('davilla/images/receita2.png') }}" alt=""></figure>
             </div>

             <!-- Recipe Block -->
             <div class="recipe-block">
                 <figure class="recipe-image"><img src="{{ asset('davilla/images/receita3.png') }}" alt=""></figure>
             </div>
         </div>
     </div>
 </section>
 <!-- Fim Seção de Receitas  -->