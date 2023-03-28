@extends('layouts.auth')
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
                                    <h1 class="h4 text-gray-900 mb-2">Lupa Kata Sandi</h1>
                                    <p class="mb-4">Masukan Email anda untuk mengatur ulang kata sandi</p>
                                </div>
                                <form method="POST" action="{{ route('password.email') }}" class="user">
                                    @csrf
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <input type="email" name="email" class="form-control form-control-user form-control-block" id="exampleFirstName"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Atur ulang kata sandi
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Belum punya akun? Daftar sekarang</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Masuk</a>
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