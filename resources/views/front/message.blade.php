@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
<div class="container">
    <div class="subscribe-wrapper" >
    <h1 class="sidebar-title mt-5 mb-2">Mesajlar</h1>
    </div>
    <form method="post" action="{{route('front.message.submit')}}">
        @csrf
        <div class="subscribe-wrapper" style="max-width: 800px">
            <div class="form-group">
            <input name="name"   class="form-control" placeholder="Ad">
            </div>
            <div class="form-group">
            <input name="surname" class="form-control" placeholder="Soyad ">
            </div>
            <div class="form-group">
            <input name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
            <input name="phone" class="form-control" placeholder="Əlaqə Nömrəsi">
            </div>
            <div class="form-group">
            <textarea name="message" class="form-control" placeholder="Mesajiniz" rows="4"  ></textarea>
            </div>        
        </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
            @endif
        <div style="text-align: center">
            <button type="submit" class="btn btn-primary">göndər</button>
        </div>
        
    </form>
    </h6>

</div>
    <!-- Page Footer -->
@endsection