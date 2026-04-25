 <!--Page Title-->
 @php
 $features = asset('davilla/images/fundosobre1.jpg');
 @endphp
 <section class="page-title" style="background-image:url('{{ $features }}')">
     <div class="auto-container">
         <h1>Contacts</h1>
         <ul class="page-breadcrumb">
             <li><a href="{{ route('home') }}">home</a></li>
             <li>Contacts</li>
         </ul>
     </div>
 </section>
 <!--End Page Title-->