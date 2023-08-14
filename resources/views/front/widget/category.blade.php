<div class="col-md-12">
    <div class="card">
        <div class="card-header">Kategoriyalar</div>  
        <div class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item @if (Request::segment(2)==$category->id) active @endif"> 
                <a style="color: black" href="{{route('category',$category->id)}}">{{$category->name}}</a> 
            </li>
            @endforeach
        </div>   
    </div>
</div>