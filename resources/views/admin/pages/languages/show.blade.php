@extends('admin.layout.master')
@section('content')

        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Language</h4>
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
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-8 col-sm-4 col-xs-12">
                        <h4 class="page-title">Language</h4>
                            <li class="list-group-item">{{$language->name}}</</li>
                    </div>
                </div>
            </div>
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-8 col-sm-4 col-xs-12">
                        <h4 class="page-title">Slug</h4>
                            <li class="list-group-item">{{$language->slug}}</</li>
                    </div>
                </div>
            </div>
            </div>
@endsection