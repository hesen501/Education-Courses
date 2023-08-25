@extends('admin.layout.master')
@section('content')

        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Languages</h4>
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
            <div style="" class="col-lg-12 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="{{route('admin.sections.store')}}" method="POST">
                            @csrf
                            @method('POST')
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
                                        <div class="col-10">
                                            <h1 class="col-md-12 p-0" >Section</h1>
                                            <input type="text" name="name" value="" placeholder="section name" >
                                        </div>
                                        <div class="col-2">
                                            <button type="button" id="delete_section" class="btn btn-danger">Delete Section</button>
                                        </div>
                                        <div class="lectures">
                                            <div class="lecture">
                                                <h2 class="col-md-12">Lecture</h2>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <label for="">Lecture Name</label> 
                                                        <input type="text" value="" name="lecture_names[]" placeholder="name"
                                                        class="form-control p-0 border-2 col-md-">
                                                        <label for="">Lecture Link</label>
                                                        <input type="text" value="" name="lecture_links[]" placeholder="link"
                                                            class="form-control p-0 border-2">
                                                        <input type="hidden" name="course_id" value="{{$id}}" >
                                                        <div class="d-flex" style="gap: 20px">
                                                            <label for="">Lecture File</label>
                                                            <input type="file" name="lecture_files[]" style="width: 100px">
                                                            <label for="">Lecture Video</label>
                                                            <input type="file" name="lecture_videos[]" style="width: 100px">
                                                        </div>
                                                    </div>
                                                    <div class="col-5" >
                                                        <label for="">Lecture Description</label> 
                                                        <textarea name="lecture_descriptions[]" style="height: 100px"
                                                        class="form-control p-0 border-2"></textarea>
                                                    </div>
                                                    <div class="col-2" id="add-lecture-div">
                                                        <button type="button" class="add-lecture btn btn-success" >Add lecture</button>
                                                    </div>
                                                </div>
                                            <div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Add Section</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            </div>
@endsection
@push('js')
    <script>
    $(document).ready(function () {
        $(document).on('click', ,function() {

        });
    })
    </script>
@endpush