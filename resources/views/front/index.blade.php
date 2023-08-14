@extends('front/layout/master')
@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
      <!--banner section start -->
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            @if (isset($sliders))
            @foreach ($sliders as $slider)
                <div class="carousel-item @if($loop->first) active @endif" >
                    <img class="d-block w-100" src="{{$slider->image}}" alt="First slide" style="height: 600px;width:2000px">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color: rgb(82, 6, 246);font-size: 100px">{{$slider->name}}</h1>
                        <p style="color: rgb(25, 0, 255);font-size: 20px"> {!!$slider->description!!} </p>
                    </div>                    
                </div>
            @endforeach
            @endif
           <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
           <i class="fa fa-arrow-left" style="font-size:24px"></i>
           </a>
           <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
           <i class="fa fa-arrow-right" style="font-size:24px"></i>
           </a>
        </div>
     </div>
     <!--banner section end -->
     </div>
     <!--header section end -->

     
    @include('front.widget.about')



    @if(session()->has('errors'))
    <div class="alert alert-danger">
        {{ session()->get('errors') }}
    </div>
    @endif 

    
    
    @if ($news->count()>1) 
    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital">Xəbərlər</h1>
           <div class="services_section_2">
              <div class="row">
                @foreach ($news as $item)
                    <div class="col-md-6">
                        <a href="{{route('front.news.single',$item->id)}}" class="feature-post-item">
                            <div class="image_main">
                            <img src="{{$item->image}}" class="image_8" style="width:100%">
                            <div class="text_main">
                                <div class="seemore_text">{{$item->title}}</div>
                            </div>
                            </div>
                        </a>
                    </div>
                @endforeach
              </div>
                <a href="{{route('front.news')}}" class="btn btn-primary btn-block my-4" type="submit">Bütün Xəbərlər</a>
            </div>
        </div>            
    </div>
    @endif


    @if ($books->count()>0)
    <div class="container">
        <div class="blog_section layout_padding">
        <h1 class="services_taital">Kitablar</h1>

            <div class="page-content">
                <hr>
                <div class="row">    
                    @foreach ($books as $book)
                        <div class="col-lg-6">
                        <div class="card text-center mb-5">
                            <div class="card-header p-0">                                   
                                <div class="blog-media">
                                    <img src="{{$book->image}}" alt="" class="w-100">   
                                </div>  
                            </div>
                            <div class="card-body px-0">
                                <h5 class="card-title mb-2">{{$book->name}}</h5> 
                                <p class="my-2">{{ \Str::limit($book->description,150)}}</p>
                            </div>
                                <a href="{{route('book.single',$book->id)}}" class="btn btn-outline-dark btn-sm">Ətraflı</a>
                        </div>
                    </div>
                    @endforeach                   
                    
                </div>
                <a href="{{route('front.book')}}" class="btn btn-primary btn-block my-4" type="submit">Ətraflı</a>
            </div>
        </div>
    </div>
    @endif

    @if (isset($testimonials))
    <!-- client section start -->
    <div class="client_section layout_padding">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($testimonials as $testimonial)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="container">
                <h1 class="client_taital">İstifadəçi rəyləri</h1>
                <div class="client_container">
                    <div class="client_left">
                        <div><img src="{{$testimonial->image}}" class="client_img" height="100px" width="200px"></div>
                    </div>
                    <div class="client_right">
                        <h1 class="client_name">{{$testimonial->name}}</h1>
                        <p class="client_text">{!!$testimonial->description!!}</p>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
        <i class="fa fa-angle-right" style="font-size:24px"></i>
        </a>
    </div>
    </div>
    <!-- client section end -->
    @endif
@endsection 