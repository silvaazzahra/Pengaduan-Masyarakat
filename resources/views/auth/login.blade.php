@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card shadow-lg my-5">
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Selamat Datang!</h1>
                                    <p class="mb-4">Pengaduan Masyarakat Tenjoayu</p>
                                </div>
                                <form class="user" role="form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/forgot-password">Lupa kata sandi</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Belum punya akun? Daftar sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
