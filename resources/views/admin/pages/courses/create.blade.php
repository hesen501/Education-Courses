
@extends('admin.layout.master')
@section('content')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Courses</h4>
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
            <div  id="parent-div" class="col-lg-12 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
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
                        <form id="form1" action="{{route('admin.courses.store')}}" method="POST" class="form-horizontal form-material">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Name</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <input type="text" name="name" placeholder=""
                                        class="form-control p-0 border-2">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Description</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <textarea name="description" placeholder=""
                                        class="form-control" style="width: 500px;height:200px">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Price</label>
                                <div class="d-flex">
                                    <input type="text" name="price" placeholder=""
                                        class="form-control p-0 border-2" style="width: 180px">
                                        <select name="currency_id" style="width: 100px">
                                            @foreach ($currencies as $currency)
                                                <option value="{{$currency->id}}">{{$currency->name.' '.$currency->symbol}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Categories</label>
                                <div class="col-md-12 border-bottom p-2">
                                <select name="category_ids[]" multiple multiselect-search="true" style="width: 100%">
                                        @foreach ($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Age Groups</label>
                                <div class="col-md-12 border-bottom p-2">
                                <select name="age_ids[]" multiple multiselect-search="true" style="width: 100%">
                                        @foreach ($ages as $age)
                                          <option value="{{$age->id}}">{{$age->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Languages</label>
                                <div class="col-md-12 border-bottom p-2">
                                <select name="language_id"  multiselect-search="true" style="width: 100%">
                                        @foreach ($languages as $language)
                                          <option value="{{$language->id}}">{{$language->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="step" value="1">
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success step2" >Next Step</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" id="create" class="btn btn-success">Add Course</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            </div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
        });
    </script>
@endpush
