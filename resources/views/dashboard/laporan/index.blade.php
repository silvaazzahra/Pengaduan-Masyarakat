@extends('layouts.app')
@section('title','Pengaduan')

@section('title-header', 'Pengaduan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengaduan</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mt-2">
                <h2 class="text-center">Laporan Pengaduan</h2>
                <br>
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group text-center">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Tgl. Kirim Laporan</label>
                                </div>
                                <div class="col-8">
                                    {{-- <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"> --}}
                                    <div class="input-group input-daterange">
                                        <input type="date" class="form-control datepicker start_date" id="start_date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">To</span>
                                        </div>
                                        <input type="date" class="form-control datepicker end_date" id="end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 align-items-end">
                        <button class="btn btn btn-submit btn-primary form-control" onclick="filterdata()">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered zero-configuration" id="table">
                <thead>
                    <tr>
                        <th width='50px' class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Isi Laporan</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $laporan)
                        <tr>
                            <td width='50px' class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $laporan->masyarakat->fullname }}</td>
                            <td class="text-center">{{ $laporan->isi_laporan }}</td>
                            <td class="text-center">{{ date('d-M-Y', strtotime($laporan->tgl_pengaduan)) }}</td>
                            <td class="text-center">
                                @if ($laporan->status == 'pending')
                                <span class="badge badge-secondary">Pending</span>
                                @elseif($laporan->status == 'proses')
                                <span class="badge badge-primary">Proses</span>
                                @elseif($laporan->status == 'selesai')
                                <span class="badge badge-success">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function filterdata() {
        var start_date = $('#start_date').val()
        var end_date = $('#end_date').val()
        window.location.href = `?start_date=${start_date}&end_date=${end_date}`
    }

    $('.export-pdf').on('click', function(){
        var ahref = '{{ route('cetak_pdf') }}' + '?start_date=' + $('#start_date').val() +
            '&end_date=' + $('#end_date').val();
        window.open(ahref);
    })
</script>
