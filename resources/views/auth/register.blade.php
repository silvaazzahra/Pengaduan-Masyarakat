@extends('layouts.auth')
@section('title', 'register')

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
                                    <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                </div>
                                <form class="user" role="form" action="/register" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="number" name="nik" class="form-control form-control-user" id="exampleInputEmail" placeholder="NIK">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" name="fullname" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="number" name="nohp" class="form-control form-control-user" id="exampleInputEmail" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="http://127.0.0.1:8000/forgot-password">Lupa kata sandi</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="http://127.0.0.1:8000/login ">Masuk</a>
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
