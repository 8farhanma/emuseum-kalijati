<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\C_FAQ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Koleksi;
use App\Http\Controllers\C_Kunjungan;
use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Profil;
use App\Http\Controllers\C_Publikasi;
use App\Http\Controllers\C_Review;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/user', 'index')->name('dashboard.user');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/credentials', 'credentials')->name('credentials');
});

Route::get('/Home', [C_Home::class, 'index'])->name('home');
Route::get('/styles', [C_Page::class, 'styles'])->name('styles');
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/Tentang', [C_Profil::class, 'show'])->name('about');
Route::get('/Koleksi', [C_Koleksi::class, 'tampilankoleksi'])->name('v_koleksi');
Route::get('/Koleksi/{id_koleksi}', [C_Koleksi::class, 'show'])->name('koleksi.show');
Route::get('/Koleksi/Detail/{id_koleksi}', [C_Koleksi::class, 'detailKoleksi'])->name('koleksi.detail');
Route::get('/Publikasi', [C_Publikasi::class, 'tampilanPublikasi'])->name('v_publikasi');
Route::get('/Publikasi/{id_publikasi}', [C_Publikasi::class, 'show'])->name('publikasi.show');
Route::get('/FAQ', [C_FAQ::class, 'tampilanFAQ'])->name('v_faq');
Route::get('/Ulasan', [C_Review::class, 'index'])->name('review');
Route::get('/ulasan/tambah', [C_Review::class, 'create'])->name('ulasan.create');
Route::post('/ulasan', [C_Review::class, 'store'])->name('ulasan.store');

Route::middleware('auth')->group(function () {

    Route::get('/koleksi', [C_Koleksi::class, 'index'])->name('koleksi');
    Route::get('/koleksi/detail/{id_koleksi}', [C_Koleksi::class, 'detail']);
    Route::get('/koleksi/add', [C_Koleksi::class, 'add']);
    Route::post('/koleksi/insert', [C_Koleksi::class, 'insert']);
    Route::get('/koleksi/edit/{id_koleksi}', [C_Koleksi::class, 'edit']);
    Route::post('/koleksi/update/{id_koleksi}', [C_Koleksi::class, 'update']);
    Route::get('/koleksi/delete/{id_koleksi}', [C_Koleksi::class, 'delete']);
    Route::get('/koleksi/cetak/{id_koleksi}', [C_Koleksi::class, 'cetakQR']);

    Route::get('/publikasi', [C_Publikasi::class, 'index'])->name('publikasi');
    Route::get('/publikasi/detail/{id_publikasi}', [C_Publikasi::class, 'detail']);
    Route::get('/publikasi/add', [C_Publikasi::class, 'add']);
    Route::post('/publikasi/insert', [C_Publikasi::class, 'insert']);
    Route::get('/publikasi/edit/{id_publikasi}', [C_Publikasi::class, 'edit']);
    Route::post('/publikasi/update/{id_publikasi}', [C_Publikasi::class, 'update']);
    Route::get('/publikasi/delete/{id_publikasi}', [C_Publikasi::class, 'delete']);

    Route::get('/profil', [C_Profil::class, 'index'])->name('profil');
    Route::get('/profil/detail/{id_profil}', [C_Profil::class, 'detail']);
    Route::get('/profil/edit/{id_profil}', [C_Profil::class, 'edit']);
    Route::post('/profil/update/{id_profil}', [C_Profil::class, 'update']);

    Route::get('/faq', [C_FAQ::class, 'faq'])->name('faq');
    Route::get('/faq/detail/{id_faq}', [C_FAQ::class, 'detail']);
    Route::get('/faq/edit/{id_faq}', [C_FAQ::class, 'edit']);
    Route::post('/faq/update/{id_faq}', [C_FAQ::class, 'update']);

    Route::get('/kunjungan', [C_Kunjungan::class, 'index'])->name('kunjungan');
    Route::get('/kunjungan/{id_kunjungan}', [C_Kunjungan::class, 'detail'])->name('kunjungan.detail');
    Route::get('/cetak_individu', [C_Kunjungan::class, 'cetakIndividu'])->name('cetakIndividu');
    Route::get('/cetak_kelompok', [C_Kunjungan::class, 'cetakKelompok'])->name('cetakKelompok');
});

Route::get('/Kunjungan', [C_Kunjungan::class, 'add'])->name('isiankunjungan');
Route::post('/Kunjungan', [C_Kunjungan::class, 'store'])->name('isiankunjungan.post');
