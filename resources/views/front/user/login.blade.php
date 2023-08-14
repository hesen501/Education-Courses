@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
    <div class="container" style="text-align: center" >        
        <h2 style="color: aliceblue">Daxil ol</h2>
    </div>

            <form method="POST" action="{{route('user.login.submit')}}" >
                @csrf
                <div class="container" style="text-align:center">
                    <div class="subscribe-wrapper " style="max-width: 850px">
                        <input name="name" type="text"   class="form-control" placeholder="Ad">
                        <input name="password" type="password" class="form-control" placeholder="Parol"> 
                    </div>
                </div>
                <div class="mt-3 text-center" >
                    <button type="submit" class="btn btn-primary">Daxil ol</button>
                </div>
            </form>
            
        
@endsection