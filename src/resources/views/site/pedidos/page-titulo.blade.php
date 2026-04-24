 <!--Page Title-->
 @php
 $features = asset('davilla/images/fundosobre1.jpg');
 @endphp
 <section class="page-title" style="background-image:url('{{ $features }}')">
     <div class="auto-container">
         <h1>Shop</h1>
         <ul class="page-breadcrumb">
             <li><a href="{{ route('home') }}">home</a></li>
             <li>Shop</li>
         </ul>
     </div>
 </section>
 <!--End Page Title-->