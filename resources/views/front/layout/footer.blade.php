      <!-- footer section start -->
      <div class="footer_section layout_padding">
        <div class="container">
           <
           <div class="footer_section_2">
              <div class="row">
                 <div class="col-lg-3 margin_top">
                    <div class="call_text"><a href="{{$phone}}"><img src="{{asset('front/images/call-icon1.png')}}"><span class="padding_left_15">Əlaqə Nömrəsi: {{$phone}}</span></a></div>
                    <div class="call_text"><a href="#"><h1 style="color:aliceblue">Email:</h1> <span class="padding_left_15">{{$email}}</span></a></div>
                 </div>
                 <div class="col-lg-3">
                    <div class="information_main">
                       <h4 class="information_text">Məlumat</h4>
                       <p class="many_text">Akademiyanın kitabxanasının fondu elmi-texniki, tədris-metodiki və sorğu ədəbiyyatları ilə komplektləşdirilmişdir.

                        Hazırda kitabxananın fondunda Azərbaycan, rus, ingilis dillərində 80000 – dən çox kitab oxucuların istifadəsindədir. </p>
                    </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="information_main">
                       <div class="footer_menu">
                          <ul>
                             <li><a href="{{route('home')}}">Ana Səhifə</a></li>
                             <li><a href="{{route('front.about')}}">Haqqımızda</a></li>
                             <li><a href="{{route('front.book')}}">Kitablar</a></li>
                             <li><a href="{{route('front.news')}}">Xəbərlər</a></li>
                          </ul>
                       </div>
                    </div>
                 </div>
                 <div class="col-lg-3">
                    <div class="information_main">
                       <div class="footer_logo"><a href="index.html"><img src="https://naa.edu.az/wp-content/uploads/2021/11/logo_text_light.svg"></a></div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- footer section end -->
     <!-- copyright section start -->
     <div class="copyright_section" >
         <p class="copyright_text">Copyright © 2023 Bütün Hüquqlar Qorunur.</p>
     </div>
     <!-- copyright section end -->
     <!-- Javascript files-->
     <script src="{{asset('front/js/jquery.min.js')}}"></script>
     <script src="{{asset('front/js/popper.min.js')}}"></script>
     <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('front/js/jquery-3.0.0.min.js')}}"></script>
     <script src="{{asset('front/js/plugin.js')}}"></script>
     <!-- sidebar -->
     <script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
     <script src="{{asset('front/js/custom.js')}}"></script>
     <!-- javascript --> 
     <script src="{{asset('front/js/owl.carousel.js')}}"></script>
     <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  </body>
</html>
