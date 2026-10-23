<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_profil', function (Blueprint $table) {
            $table->id('id_profil');
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_faq', function (Blueprint $table) {
            $table->id('id_faq');
            $table->string('pertanyaan');
            $table->text('jawaban');
            $table->timestamps();
        });

        Schema::create('tb_koleksi', function (Blueprint $table) {
            $table->string('id_koleksi', 10)->primary();
            $table->string('nama_koleksi');
            $table->text('deskripsi_koleksi')->nullable();
            $table->string('foto_koleksi')->nullable();
            $table->string('url_koleksi')->nullable();
            $table->string('qr_code_koleksi')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_publikasi', function (Blueprint $table) {
            $table->id('id_publikasi');
            $table->string('judul');
            $table->string('author')->nullable();
            $table->string('kategori', 100)->nullable()->index();
            $table->longText('isi_publikasi')->nullable();
            $table->string('gambar')->nullable();
            $table->date('tanggal_publikasi')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_pengunjungindividu', function (Blueprint $table) {
            $table->id('id_individu');
            $table->string('nama_pengunjung');
            $table->text('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
        });

        Schema::create('tb_pengunjungkelompok', function (Blueprint $table) {
            $table->id('id_kelompok');
            $table->string('nama_ketua');
            $table->string('asal_instansi');
            $table->unsignedInteger('jumlah_rombongan');
        });

        Schema::create('tb_kunjungan', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->date('tanggal_kunjungan');
            $table->text('alasan_kunjungan')->nullable();
            $table->string('kategori_pengunjung', 20);       // individu / kelompok
            $table->unsignedBigInteger('id_individu')->nullable();
            $table->unsignedBigInteger('id_kelompok')->nullable();

            $table->foreign('id_individu')->references('id_individu')
                ->on('tb_pengunjungindividu')->nullOnDelete();
            $table->foreign('id_kelompok')->references('id_kelompok')
                ->on('tb_pengunjungkelompok')->nullOnDelete();
        });

        // Timestamps ditambahkan oleh migrasi 2024_05_26_211446
        Schema::create('tb_ulasan', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->string('nama', 25);
            $table->string('asal_kota', 25)->nullable();
            $table->text('isi_ulasan');
            $table->unsignedTinyInteger('rating_pelayanan');
            $table->unsignedTinyInteger('rating_fasilitas');
            $table->unsignedTinyInteger('rating_kebersihan');
            $table->decimal('rating_avg', 3, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_ulasan');
        Schema::dropIfExists('tb_kunjungan');
        Schema::dropIfExists('tb_pengunjungkelompok');
        Schema::dropIfExists('tb_pengunjungindividu');
        Schema::dropIfExists('tb_publikasi');
        Schema::dropIfExists('tb_koleksi');
        Schema::dropIfExists('tb_faq');
        Schema::dropIfExists('tb_profil');
    }
};
