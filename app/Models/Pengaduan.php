<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
protected $fillable = [
        'masyarakat_id',
        'isi_laporan',
        'lokasi',
        'foto_bukti',
        'status',
        'tgl_pengaduan'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(User::class, 'masyarakat_id', 'id');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id', 'id');
    }
}
