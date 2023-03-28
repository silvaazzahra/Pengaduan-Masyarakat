@extends('layouts.app')
@section('title','Pengaduan')

@section('title-header', 'Pengaduan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengaduan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Pengaduan</h2>
                    @if (Auth::user()->role == 'masyarakat')
                    <a href="{{ route('pengaduan.create' ) }}" class="btn btn-primary float-right">Ajukan Pengaduan</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Pelapor</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Isi Laporan</th>
                                    <th>Foto Bukti</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduans as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->masyarakat->nik ?? 'Tidak Ada NIK'}}</td>
                                        <td>{{ $user->masyarakat->fullname }}</td>
                                        <td>{{ $user->tgl_pengaduan }}</td>
                                        <td>{{ str()->words($user->isi_laporan, 5) }}</td>
                                        <td>
                                            <img src="{{ asset('/uploads/images/'.$user->foto_bukti) }}" alt="{{ $user->name }}" width="100">
                                        </td>
                                        <td>
                                            @if ($user->status == 'pending')
                                                <a href="" class="badge badge-danger">Pending</a>
                                            @elseif($user->status == 'diproses')
                                                <a href="" class="badge badge-warning">Diproses</a>
                                            @else
                                                <a href="" class="badge badge-success">Selesai</a>
                                            @endif
                                        </td>
                                        <td class="d-flex jutify-content-center">

                                            <a href="{{ route('pengaduan.show', ['pengaduan'=>$user->id]) }}" class="btn btn-outline-primary">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $pengaduans->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
@endsection
