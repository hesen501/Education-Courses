@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">
        <hr>
        <div class="page-container">
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-6">
                        @include('front.widget.category')

                    </div>
                    <div class="col-lg-6">
                        <div class="col-md-12" style= >
                        <form action="{{ route('search') }}" method="GET">
                            <div class="d-flex">
                                <input type="text" class="form-control p-3 border-2" name="search" placeholder="Axtar...">
                                <button class="btn btn-primary" type="submit">Axtar</button>
                              </div>
                        </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach ($books as $book)                       
                    <div class="col-lg-6">
                        <div class="card text-center mb-5">
                            <div class="card-header ">                                   
                                <div class="blog-media">
                                    <img src="{{asset($book->image)}}" alt="" class="w-100">
                                </div>  
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title mb-2">{{$book->name}}</h5> 
                                <p class="my-2">{{ \Str::limit($book->description,150)}}</p>
                                <small class="small text-muted">{{$book->created_at}}
                                </small>
                                <p class="my-2"></p>
                            </div>
                            <div class="card-footer p-0 text-center">
                                <a href="{{route('book.single',$book->id)}}" class="btn btn-outline-dark btn-sm">Ətraflı</a>
                            </div>   
                        </div>
                    </div>
                    @endforeach   
                </div>
            </div>
        </div>
    </div>


    @endsection