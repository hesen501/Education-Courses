<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Aviasiya Kitabxanası</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('front/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section" style= "background-image:none">
         <div class="header_bg" >
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="logo" href="{{route('home')}}"><img src="https://naa.edu.az/wp-content/uploads/2021/11/logo_text_light.svg"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Ana Səhifə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.about')}}">Haqqımızda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.book')}}">Kitablar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.news')}}">Xəbərlər</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.message')}}">Əlaqə</a>
                        </li>
                        @auth
                        @if (Auth::user()->role_id==1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('front.orders',Auth::id())}}">Sifarişlər</a>
                            </li>
                        @endif
                        @endauth
                    </ul>
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item">
                            @auth
                            @if (Auth::user()->role_id==1)
                            <a href="{{route('user.logout')}}" class="ml-4 btn btn-dark mt-1 btn-3">Çıxış</a>
                            @endif
                            @endauth
                            @if(!Auth::user() or Auth::user()->role_id==0)
                            <a href="{{route('user.login')}}" class="ml-4 btn btn-dark mt-1 btn-3">Daxil ol</a>
                            <a href="{{route('user.register')}}" class="ml-4 btn btn-dark mt-1 btn-3">Qeydiyyat</a>
                            @endif
                        </li>
                    </div>
                  </div>
               </nav>
         </div>
