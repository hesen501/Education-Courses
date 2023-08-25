@extends('front/layout/master')
@section('content')

    <!-- Page Header -->
    <!-- End Of Page Header -->

    <section class="container">
    <h1 class="title" style="text-align: center">{{$book->name}}</h1>
        <div class="page-container">
            <div class="page-sidebar">
                <img src="{{asset($book->image)}}">
            </div>  
            <div class="page-content">
                <div class="card">
                    <div class="card-header pt-0">
                        <h3 class="card-title mb-4"></h3>
                        <h6 class="card-title mb-4">Yazıçı:{{ $book->writer }}</h6> 
                        <h6 class="card-title mb-4">Dil:{{ $book->language }}</h6>
                        <h6 class="card-title mb-4">Kategoriya:{{ $book->category }}</h6>
                        <h6 class="card-title mb-4">İl:{{ $book->year }}</h6>
                        <h6 class="card-title mb-4">{{ $book->pages }} pages</h6>
                    </div>
                    <div class="card-body border-top">
                        <p class="my-3">{{ $book->description }}</p> 
                    </div>   
                    <div class="card-body border-top">
                    <button class="btn btn-primary">Order</button>
                    </div>          
                </div> 

            </div>
        </div>
    </section>

  
@endsection