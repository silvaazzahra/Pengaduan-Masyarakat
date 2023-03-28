<?php

namespace App\Http\Controllers;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function dashboard()
    {
        $pengaduan = Pengaduan::orderByDesc('id')->get();
        $tanggapan = collect($pengaduan)->groupBy('status');

        $data = [
            'total_pengaduan' => $pengaduan->count(),
            'pengaduan' => $tanggapan,  
        ];
        
        return view('dashboard.index', compact('data'));
    }
}


