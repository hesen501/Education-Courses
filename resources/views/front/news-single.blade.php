@extends('front/layout/master')
@section('content')

    <!-- Page Header -->
    <!-- End Of Page Header -->

    <section class="container">
    <h1 class="title" style="text-align: center">{{ $news->title }}</h1>
        <div class="page-container">
            <div class="page-sidebar">
                <img src="{{asset($news->image)}}" height="340" width="280">
            </div>  
            <div class="page-content">
                <div class="card">
                    <div class="card-header pt-0">
                        <h3 class="card-title mb-4"></h3>
                        <h6 class="card-title mb-4">Açıqlama:</h6>
                        <p class="my-3">{{ $news->description }}</p> 
                    </div>         
                </div> 

            </div>
        </div>
    </section>

  
@endsection