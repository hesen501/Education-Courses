@extends('admin.layout.master')
@section('content')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Currencies</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{route('admin.dashboard')}}" class="fw-normal">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Currencies</h3>
                            <a href="{{route('admin.currencies.create')}}" class="btn btn-success">Create Currency</a>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Symbol</th>
                                            <th class="border-top-0">Code</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currencies as $currency)
                                        <tr>
                                            <td>{{$currency->name}}</td>
                                            <td>{{$currency->symbol}}</td>
                                            <td>{{$currency->code}}</td>
                                            <td>
                                                <a href="{{route('admin.currencies.edit',$currency->id)}}" class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a href="{{route('admin.currencies.show',$currency->id)}}" class="btn btn-warning" style="color: black">
                                                    Show
                                                </a>
                                                <a href="{{ route('admin.currencies.destroy', $currency->id) }}" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this resource?')) document.getElementById('delete-form').submit();">Delete</a>
                                                <form id="delete-form" action="{{ route('admin.currencies.destroy', $currency->id) }}" method="POST" style="display: none;">
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