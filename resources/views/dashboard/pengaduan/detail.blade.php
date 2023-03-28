@extends('layouts.app')
@section('title', 'Tambah Data Pengaduan')

@section('title-header', 'Tambah Data Pengaduan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Data Pengaduan</a></li>
    <li class="breadcrumb-item active">Tambah Data Pengaduan</li>
@endsection

@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #6c757d;
        }

        .text-grey:hover {
            color: #6c757d;
        }

        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengaduan</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Pengaduan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Pengaduan Masyarakat
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $pengaduan->masyarakat->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Masyarakat</th>
                                <td>:</td>
                                <td>{{ $pengaduan->masyarakat->fullname }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengaduan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>:</td>
                                <td><img src="{{ asset('/uploads/images/'.$pengaduan->foto_bukti) }}" alt="Foto Bukti" class="embed-responsive"></td>
                            </tr>
                            <tr>
                                <th>Isi Laporan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($pengaduan->status == 'pending')
                                        <a href="" class="badge badge-danger">Pending</a>
                                    @elseif($pengaduan->status == 'diproses')
                                        <a href="" class="badge badge-warning">Diproses</a>
                                    @else
                                        <a href="" class="badge badge-success">Selesai</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Lokasi Kejadian</th>
                                <td>:</td>
                                <td><a href="{{$pengaduan->lokasi }}">Lihat di sini.</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if (Auth::user()->role != 'masyarakat')
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Tanggapan Petugas
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaduan.store-tanggapan', ['pengaduanId' => $pengaduan->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status" class="custom-select">
                                    @php
                                        $roles = ['pending', 'selesai', 'diproses'];
                                    @endphp
                                    <option value="" selected>Status</option>
                                    @foreach ($roles as $status)
                                            <option value="{{ $status }}" @if (old('status', $pengaduan->status) == $status) selected @endif>
                                                {{ ucfirst($status)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $pengaduan->tanggapan()?->first()?->tanggapan}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">KIRIM</button>
                    </form>
                    @if (Session::has('status'))
                        <div class="alert alert-success mt-2">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Tanggapan Petugas
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <input disabled type="text" name="" class="form-control" value="{{$pengaduan->status}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea disabled name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $pengaduan->tanggapan()?->first()?->tanggapan}}</textarea>
                        </div>
                    </form>
                    @if (Session::has('status'))
                        <div class="alert alert-success mt-2">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection
