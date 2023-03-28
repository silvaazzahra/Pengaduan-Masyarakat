@extends('layouts.app')
@section('title', 'Dashboard')
@php
    $auth = Auth::user();
@endphp

@section('breadcrumb')
<li class="breadcrumb-item active"><a
href="{{ route('home') }}">Dashboard</a></li>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Pengaduan pending -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-danger shadow h-100 py-2" href="">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pengaduan pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($data['pengaduan']['pending']) ? $data['pengaduan']['pending']->count() : 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pengaduan ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-warning shadow h-100 py-2" href="/pengaduan?status=diproses">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pengaduan Diproses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($data['pengaduan']['diproses']) ? $data['pengaduan']['diproses']->count() : 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- pengaduan selesai -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-success shadow h-100 py-2" href="/pengaduan?status=selesai">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengaduan selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ isset($data['pengaduan']['selesai']) ? $data['pengaduan']['selesai']->count() : 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- total pengaduan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="card border-left-primary shadow h-100 py-2" href="/pengaduan">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pengaduan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['total_pengaduan']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
