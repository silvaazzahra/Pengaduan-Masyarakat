<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masyarakat_id');
            $table->foreign('masyarakat_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('isi_laporan');
            $table->string('lokasi')->nullable();
            $table->string('foto_bukti')->nullable();
            $table->enum('status', ['selesai', 'diproses', 'pending'])->default('pending');
            $table->date('tgl_pengaduan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
