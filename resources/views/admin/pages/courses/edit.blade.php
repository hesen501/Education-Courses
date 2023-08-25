
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
                        <div  style="@if(session()->get('step')!=1) display: none @endif">
                        <form id="form1" action="{{route('admin.courses.editStepOne',$course->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material" style="@if(session()->get('step')==1) display:block @else display:none @endif">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Name</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <input type="text" name="name" placeholder="" value="{{$course->name}}"
                                        class="form-control p-0 border-2">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Description</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <textarea name="description" placeholder=""
                                        class="form-control" style="width: 500px;height:200px"> {{$course->description}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Price</label>
                                <div class="d-flex">
                                    <input type="text" name="price" placeholder="" value="{{$course->price}}"
                                        class="form-control p-0 border-2" style="width: 180px">
                                        <select name="currency_id" style="width: 100px">
                                            @foreach ($currencies as $currency)
                                                <option value="{{$currency->id}}" @if($course->currency_id == $currency->id) selected @endif>{{$currency->name.' '.$currency->symbol}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Categories</label>
                                <div class="col-md-12 border-bottom p-2">
                                <select name="category_ids[]" multiple multiselect-search="true" style="width: 100%">
                                        @foreach ($categories as $category)
                                          <option value="{{$category->id}}"
                                            @foreach ($category_ids as $id)
                                            @if (in_array($category->id,$category_ids))
                                                selected
                                            @endif
                                            @endforeach>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Age Groups</label>
                                <div class="col-md-12 border-bottom p-2">
                                <select name="age_ids[]" multiple multiselect-search="true" style="width: 100%">
                                        @foreach ($ages as $age)
                                          <option value="{{$age->id}}"
                                            @if (in_array($age->id,$age_ids)) selected @endif>
                                            {{$age->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Languages</label>
                                <div class="col-md-12 border-bottom p-2">
                                <select name="language_id"  multiselect-search="true" style="width: 100%">
                                        @foreach ($languages as $language)
                                          <option value="{{$language->id}}"
                                            @if ($language->id == $course->language_id) selected @endif>
                                            {{$language->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success" name="button" value="2">Next Step</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div  style="@if(session()->get('step')==2) display: block @else display: none @endif">
                            <form id="form2" action="{{route('admin.courses.editStepTwo',$course->id)}}" enctype="multipart/form-data" method="POST" class="form-horizontal form-material">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-4" id="summary">
                                <label class="col-md-12 p-0">What will the student learn from your course</label>
                                @foreach ($course_summaries as $summary)
                                <div class="row">
                                    <div class="col-8">
                                    <textarea name="course_summaries[]" style="width: 800px"> {{$summary->description}}
                                    </textarea>
                                    </div>
                                    <div class="col-1">
                                    @if ($loop->iteration==1)
                                    <button type="button" id="create" class="summary-add col" ><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    @else
                                    <button type="button" id="delete" class="summary-delete col-md-8"><i class="fa fa-minus" id="summary-delete" aria-hidden="true" disable></i></button>
                                    @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group mb-4" >
                                <label class="col-md-12 p-0" >What does the Student require to know</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <textarea name="requirements" placeholder=""
                                        class="form-control" >
                                        {{$course->requirements}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">What is your Audience </label>
                                <div class="col-md-12 border-bottom p-2">
                                    <textarea name="target_student" placeholder=""
                                        class="form-control" >
                                        {{$course->target_student}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Perma-link</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <input type="text" name="permalink" placeholder="php-full-course" value="{{$course->permalink}}"
                                        class="form-control p-0 border-2">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success" name="button" value="3">Next Step</button>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success step1" name="button" value="1">Back</button>
                            </div>
                        </form>
                        </div>
                        <div  style="@if(session()->get('step')==3) display: block @else display: none @endif">
                        <form id="form3" action="{{route('admin.courses.editStepThree',$course->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material" style="@if(session()->get('step')==3) display: block @else display: none @endif">
                            @csrf
                            @method('PATCH')
                            <table class="table text-nowrap">
                                <a href="{{route('admin.sections.create',$course->id)}}" class="btn btn-primary" >Add Section</a>
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $section)
                                    <tr>
                                        <td>{{$section->name}}</td>
                                        <td>
                                            <a href="{{route('admin.sections.edit',$section->id)}}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            {{-- <a href="{{route('admin.sections.show',$section->id)}}" class="btn btn-warning" style="color: black">
                                                Show
                                            </a> --}}
                                            <a href="{{ route('admin.sections.destroy', $section->id) }}" class="btn btn-danger confirmationDelete" >Delete</a>
                                            <!-- Create a hidden form that will be submitted when the link is clicked -->
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success " name="button" value="4">Next Step</button>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success " name="button" value="2">Back</button>
                            </div>
                        </form>
                        </div>
                        <div  style="@if(session()->get('step')==4) display: block @else display: none @endif">
                        <form id="form4" action="{{route('admin.courses.editStepFour', $course->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material" style=" @if(session()->get('step')==4) display: block @else display: none @endif">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Image</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <img src="{{asset('storage/' . $course->image)}}"  height="200px">
                                    <input type="file" name="image" placeholder=""
                                        class="form-control p-0 border-2">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Background Image</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <img src="{{asset('storage/'.$course->background_image)}}"  height="200px">
                                    <input type="file" name="background_image" placeholder=""
                                        class="form-control p-0 border-2">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Certificate test</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <label for="yes"  style="color: rgb(43, 218, 43)">Yes</label>
                                    <input type="radio" name="certificate_status" value='1' @if($course->certificate_status==1) checked @endif >
                                    <label for="no" style="color: red">No</label>
                                    <input type="radio" name="certificate_status" value='0'  @if($course->certificate_status==0) checked @endif >
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Time Limit</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <label for="yes"  style="color: rgb(43, 218, 43)">Yes</label>
                                    <input type="radio" name="time_limit_status" value='1' @if($course->time_limit_status==1) checked @endif  >
                                    <label for="no" style="color: red">No</label>
                                    <input type="radio" name="time_limit_status" value='0' @if($course->time_limit_status==0) checked @endif >
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Final Exam</label>
                                <div class="col-md-12 border-bottom p-2">
                                    <label for="yes"  style="color: rgb(43, 218, 43)">Yes</label>
                                    <input type="radio" name="quiz_status" value='1'  @if($course->quiz_status==1) checked @endif >
                                    <label for="no" style="color: red">No</label>
                                    <input type="radio" name="quiz_status" value='0'  @if($course->quiz_status==0) checked @endif >
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Min required points to pass</label>
                                <div class="col-md-1 border-bottom p-2">
                                    <input type="number" name="min_point" placeholder="" value="{{$course->min_point}}"
                                        class="form-control p-0 border-2">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success step3" value="3" name="button">Back</button>
                            </div>
                        </form>
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
        // $(document).on('click', ,function() {

        // });
    })
    </script>
    <script>
    </script>
    <script>
        $(document).on('click', '#delete', function (e) {
            if(e.target.id=="summary-delete"){
                e.target.parentElement.parentElement.parentElement.remove()
            }
            e.target.parentElement.parentElement.remove()
        })
    </script>
    <script>

    </script>
@endpush
