<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\staffGudangController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\userController;
use App\Http\Controllers\VerificationController;
use App\Mail\VerificationMail;
use App\Models\Tugas;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('verification-notice', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {

    Route::post('/login', [RegisterController::class, 'login'])->name('auth.login.post');
    Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('auth.login');
    Route::get('email/verify', [RegisterController::class, 'showVerificationNotice'])->name('verify.email');
    Route::post('email/resend-verification', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::post('email/verify', [VerificationController::class, 'verify'])->name('email.verify');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [RegisterController::class, 'home'])->name('main.home');
    Route::get('/sidebar', [AuthController::class, 'sidebar'])->name('main.sidebar');
    Route::get('/data-master', [AuthController::class, 'datamaster'])->name('main.datamaster');
    Route::get('/data-master/tambah', [BarangController::class, 'tambahbarang'])->name('barang.tambah-barang');
    Route::post('/data-master/tambah', [BarangController::class, 'barangstore'])->name('barang.barangstore');
    Route::get('/transaksi', [AuthController::class, 'transaksi'])->name('main.transaksi');
    Route::get('/profile', [AuthController::class, 'profile'])->name('main.profile');
    Route::put('/profile/update-foto/{user}', [RegisterController::class, 'fotostore'])->name('main.fotostore');
    Route::get('/data-master/edit/{id}', [BarangController::class, 'editbarang'])->name('barang.edit-barang');
    Route::put('/data-master/edit/{barang}', [BarangController::class, 'editBarangStore'])->name('barang.editBarangStore');
    Route::post('/transaksi/simpan', [BarangController::class, 'simpan']);
    Route::get('/history', [HistoryController::class, 'history'])->name('main.history');

    Route::delete('/data-master/edit/{barang}', [BarangController::class, 'hapusBarangStore'])->name('barang.hapusBarangStore');

    Route::get('/akun-management', [AuthController::class, 'managementAkun'])->name('main.akun-manager');
    Route::put('/akun-management/simpan/{user}', [RegisterController::class, 'update'])->name('user.update');
    Route::delete('/akun-management/Delete/{user}', [RegisterController::class, 'Delete'])->name('user.delete');
    Route::put('/profile/simpan/{id}', [RegisterController::class, 'updateProfile'])->name('user.updateProfile');
    Route::put('/profile/password/{id}', [RegisterController::class, 'updatePassword'])->name('user.updatePassword');


    Route::post('/profile/verify-password', [AuthController::class, 'verifyPassword'])->name('main.profile.verify');
    
    Route::post('/akun-management/create', [RegisterController::class, 'createUser'])->name('main.createUser');
    
    
    
    
    Route::get('/tugas', [AuthController::class, 'tugas'])->name('main.tugas');
    Route::Post('/tugas/post', [TugasController::class, 'tugasPost'])->name('main.tugasPost');
    Route::Post('/tugas/pick/{id}', [TugasController::class, 'tugasPicker'])->name('main.tugasPicker');
    Route::delete('/tugas/delete/{id}', [TugasController::class, 'hapusTugas'])->name('tugas.delete');


    
    
    
    
    
    
    Route::get('/home-user', [userController::class, 'user'])->name('user.main');
});








Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
