 <!-- Seção de Preços -->
 <section class="pricing-section">
     <div class="auto-container">
         <div class="sec-title text-center">
             <div class="divider"><img src="{{ asset('davilla/images/icons/divider_1.png') }}" alt=""></div>
             <h2>Sabores e Valores</h2>
         </div>

         <div class="row">
             <!-- Pricing Table -->
             @foreach ($listaPrecos as $linha )
             <div class="pricing-table col-xl-3 col-lg-6 col-md-6 col-sm-12">
                 <div class="inner-box">
                     <div class="image-box">
                         <figure class="image"><img src="{{ asset('davilla/images/' . $linha->foto_produto) }}" alt="{{ $linha->nome_produto ?? '' }}"></figure>
                     </div>
                     <div class="pricing-svg">
                         <svg viewBox="0 0 1000 690">
                             <path class="st0" d="M1503-747c-669.3,0-1338.7,0-2008,0c0.3,425,0.7,850,1,1275c0,7.7,0,15.3,0,23c168.3,0.1,336.7,0.3,505,0.4 c18.1-10.6,32.9-15.9,58.4-10.8c80.7,16.2,160.7,100.3,240.4,93.8c93-7.5,184.6-116.6,284.6-96c88.9,18.3,101.9,175.6,227.2,147.5 c79.9-17.9,68.2-118.2,149.1-138.7c12.8-3.3,20.2-4.2,38.4-3.4c167.7,0.7,335.3,1.5,503,2.2c0.3-6,0.7-12,1-18 C1503,103,1503-322,1503-747z"></path>
                         </svg>
                     </div>
                     <div class="title-box">
                         <h3>{{ $linha->nome_produto ?? '' }}</h3>
                     </div>
                     <div class="price-box">
                         <div class="price"> R$ {{ number_format($linha->valor_produto, 2, ',', '.') }}<sup></sup></div>
                         <span class="title">{{ $linha->tamanho_produto ?? '' }}</span>
                     </div>
                     <div class="table-content">
                         <ul>
                             <li><span>{{ $linha->unid_medida_produto ?? '' }}</span></li>
                             <li><span>{{ $linha->status_produto ?? '' }} </span></li>
                             @if($linha->destaque_produto == 'SIM')
                             <li><span>🍰 Recomendado Davilla</span></li>
                             @else
                             <li><span>⭐ Mais vendidos </span></li>
                             @endif
                         </ul>
                     </div>
                     <div class="table-footer">
                         <a href="{{ route('cardapio.produto', $linha->slug_produto) }}" class="theme-btn btn-style-two regular"><span></span>Reservar<span></span></a>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- Pricing Table -->
         </div>
     </div>
 </section>
 <!-- Fim Seção de Preços -->