@extends('admin.layout.master')
@section('content')

        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Languages/Update</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                               <li><a href="{{route('admin.dashboard')}}" class="fw-normal">Dashboard</a></li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="col-lg-8 col-xlg-9 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.sections.update',$section->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                                @csrf
                                @method('patch')
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                                @endif
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-8">
                                            <h1 class="col-md-12 p-0" >Section</h1>
                                            <input type="text" name="name" value="{{$section->name}}" placeholder="section name" class="form-control p-0 border-2" style="width: 200px">
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="add-lecture btn btn-success" >Update Section</button>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" id="create-lecture" class="add-lecture btn btn-primary" >Create Lecture</button>
                                        </div>
                                        <div id="lectures">
                                            <br>
                                            @foreach ($section->lectures as $lecture)
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2   h2 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$lecture->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                            Lecture: {{$lecture->name}}
                                                            </button>
                                                    </h2>
                                                <br>
                                                <div id="collapse-{{$lecture->id}}" class="accordion-collapse collapse show row" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="col-5">
                                                        <label for="">Lecture Name</label> 
                                                        <input type="text"  name="lecture_names[]" value="{{$lecture->name}}" required placeholder="name"
                                                        class="form-control p-0 border-2 col-md-">
                                                        <label for="">Lecture Link</label>
                                                        <input type="text" name="lecture_links[]" value="{{$lecture->link}}" required placeholder="link"
                                                            class="form-control p-0 border-2">
                                                        <input type="hidden" name="section_id" value="{{$section->id}}">
                                                        <div class="d-flex" style="gap: 20px" >
                                                            <label for="">Lecture File</label>
                                                            <input type="file" name="lecture_files[]" style="width: 100px" class="form-control ">
                                                            <label for="">Lecture Video</label>
                                                            <input type="file" name="lecture_videos[]" style="width: 100px" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="col-5" >
                                                        <label for="">Lecture Description</label> 
                                                        <textarea name="lecture_descriptions[]" style="height: 100px" required
                                                        class="form-control p-0 border-2">{{$lecture->description}}</textarea>
                                                    </div>
                                                </div>
                                            <div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@push('js')
    <script>
        var index=1
        $('#create-lecture').on('click', function ( ) {
            index+=1
            lecture = 
            '<div class="accordion" id="accordionExample">'+
                '<div class="accordion-item">'+
                '<h2 class="accordion-header">'+
                    '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'+index+'" aria-expanded="true" aria-controls="collapseOne">'+
                       ' Lecture: '+
                        '</button>'+
                '</h2>'+
                '<br>'+
                '<div id="collapse'+index+'" class="accordion-collapse collapse show row" aria-labelledby="headingOne" data-bs-parent="#accordionExample">'+
                    '<div class="col-5">'+
                        '<label for="">Lecture Name</label> '+
                        '<input type="text"  name="lecture_names[]" value="" placeholder="name" class="form-control p-0 border-2 col-md-" required>'+
                        '<label for="">Lecture Link</label>'+
                        '<input type="text" name="lecture_links[]" value=""  placeholder="link" class="form-control p-0 border-2" required>'+
                        '<input type="hidden" name="section_id" value="{{$section->id}}">'+
                        '<div class="d-flex" style="gap: 20px">'+
                            '<label for="">Lecture File</label>'+
                            '<input type="file" name="lecture_files[]" style="width: 100px" class="form-control ">'+
                            '<label for="">Lecture Video</label>'+
                            '<input type="file" name="lecture_videos[]" style="width: 100px" class="form-control " >'+
                       ' </div>'+
                    '</div>'+
                    '<div class="col-5" >'+
                       ' <label for="">Lecture Description</label> '+
                       ' <textarea name="lecture_descriptions[]" style="height: 100px" class="form-control p-0 border-2"></textarea>'+
                   ' </div>'+
                    '<div class="col-2" id="add-lecture-div">'+
                        '<button type="button" id="delete-lecture" class=" btn btn-danger" required >Delete lecture</button>'+
                   ' </div>'+
               ' </div>'+
            '<div>'
            $('#lectures').append(lecture)
        })
        $(document).on('click', '#delete-lecture', function (e) {
            e.target.parentElement.parentElement.parentElement.remove()
        })
        
    </script>
@endpush