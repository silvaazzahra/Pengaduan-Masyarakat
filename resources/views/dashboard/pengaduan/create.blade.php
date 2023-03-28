@extends('layouts.app')
@section('title', 'Tambah Data Pengaduan')

@section('title-header', 'Tambah Data Pengaduan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Data Pengaduan</a></li>
    <li class="breadcrumb-item active">Tambah Data Pengaduan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Tambah Data Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaduan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">

                             <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan"
                             placeholder="Isi Laporan"  name="isi_laporan" cols="30" rows="10">{{ old('isi_laporan') }}</textarea>

                            @error('isi_laporan')
                                <div class="d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="avatar">Foto Bukti</label>
                            <input type="file" class="form-control @error('foto_bukti') is-invalid @enderror"
                                id="foto_bukti" placeholder="Foto Bukti"
                                name="foto_bukti">

                            @error('foto_bukti')
                                <div class="d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                            <input type="date" class="form-control @error('tgl_pengaduan') is-invalid @enderror"
                                id="tgl_pengaduan" placeholder="Masukkan Tanggal Pengaduan"
                                name="tgl_pengaduan">

                            @error('tgl_pengaduan')
                                <div class="d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="lokasi">Lokasi Kejadian</label>
                            <input type="url" class="form-control @error('lokasi') is-invalid @enderror"
                                id="lokasi" placeholder="Masukkan Lokasi"
                                name="lokasi">

                            @error('lokasi')
                                <div class="d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('pengaduan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
