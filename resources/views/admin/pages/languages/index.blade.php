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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Languages</h3>
                            <a href="{{route('admin.languages.create')}}" class="btn btn-success">Create Language</a>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $language)
                                        <tr>
                                            <td>{{$language->name}}</td>
                                            <td>
                                                <a href="{{route('admin.languages.edit',$language->id)}}" class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a href="{{route('admin.languages.show',$language->id)}}" class="btn btn-warning" style="color: black">
                                                    Show
                                                </a>
                                                <a href="{{ route('admin.languages.destroy', $language->id) }}" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this resource?')) document.getElementById('delete-form').submit();">Delete</a>
                                                <!-- Create a hidden form that will be submitted when the link is clicked -->
                                                <form id="delete-form" action="{{ route('admin.languages.destroy', $language->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection