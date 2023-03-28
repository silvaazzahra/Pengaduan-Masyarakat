<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengaduans = [
            [
                'masyarakat_id' => 2,
                'isi_laporan' => 'blabla',
                'created_at' => now(),
                'tgl_pengaduan' => now()
            ],
        ];

        Pengaduan::insert($pengaduans);
    }
}
