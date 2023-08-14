@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header text-center">
                <h2 class="card-title">Haqqımızda</h2> 
            </div>
            <div class="card-body">
                <div class="blog-media">
                    <img src="{{asset($about->image)}}" height="460px" width='500px' class="mx-auto d-block" >    
                </div>  
                <h3 class="my-3">{{$about->description}}</h3>
            </div>
        </div>
    </div>


    @endsection