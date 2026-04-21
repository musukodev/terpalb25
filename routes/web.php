<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AlbumController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::post('/chat', [ChatController::class, 'chat'])->name('chat');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('teacher', TeacherController::class)->only(['index', 'update']);
    Route::resource('students', StudentController::class)->except(['show']);
    Route::resource('albums', AlbumController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/cek-temp', function () {
    // Mencoba membuat file temp dan menangkap errornya (jika ada)
    $testFile = @tempnam(sys_get_temp_dir(), 'test_');

    return response()->json([
        '1_fungsi_sys_get_temp_dir' => sys_get_temp_dir(),
        '2_pengaturan_upload_tmp_dir' => ini_get('upload_tmp_dir') ?: 'Kosong',
        '3_pengaturan_sys_temp_dir' => ini_get('sys_temp_dir') ?: 'Kosong',
        '4_batasan_open_basedir' => ini_get('open_basedir') ?: 'Tidak ada batasan',
        '5_hasil_test_bikin_file' => $testFile ? "Berhasil di: $testFile" : "GAGAL DIBUAT!",
        '6_versi_php_web' => phpversion(),
    ]);
});
require __DIR__ . '/auth.php';
