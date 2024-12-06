<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LmsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\PeribumiController;
use App\Http\Controllers\AdminTransaksiController;

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/manajemen', [PeribumiController::class, 'manajemen'])->name('manajemen');
        Route::get('/training', [PeribumiController::class, 'training'])->name('training');
        Route::get('/digital', [PeribumiController::class, 'digital'])->name('digital');
        Route::get('/personal', [PeribumiController::class, 'personal'])->name('personal');
        Route::get('/event', [PeribumiController::class, 'event'])->name('event');
        Route::get('/edit/profile{id}', [CrudController::class, 'editProfile'])->name('editProfile');
        Route::post('/edit/profile/delete{id}', [CrudController::class, 'deleteAccount'])->name('deleteAccount');
        Route::post('/edit/profile/update{id}', [CrudController::class, 'update'])->name('update.profile');
        Route::delete('/edit/profile/delete-image/{id}', [CrudController::class, 'deleteImageProfle'])->name('delete.image.profile');
        Route::get('/produk-aktif', [ProdukController::class, 'produkAktif'])->name('produk.aktif');
        Route::get('/forgot-password', [CrudController::class, 'forgotView'])->name('password.request');
        Route::post('/forgot-password', [CrudController::class, 'forgotSend'])->name('password.email');
        Route::get('/reset-password/{token}', [CrudController::class, 'forgotHandler'])->name('password.reset');
        Route::post('/reset-password', [CrudController::class, 'forgotUpdate'])->name('password.update');
        Route::post('/restore-user', [CrudController::class, 'restoreByEmail'])->name('restore.user');
        Route::get('/restore-confirm', [CrudController::class, 'confirmRestore'])->name('restore.confirm');
        Route::get('/trash', [CrudController::class, 'trash'])->name('trash');
        Route::get('/after-restore', [CrudController::class, 'afterRestore'])->name('after.restore');
        Route::post('/profile/change-password/{id}', [CrudController::class, 'changePassword'])->name('change.password');
        Route::post('review-store', [ReviewController::class, 'reviewStore'])->name('review.store');
    });
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin');
        Route::get('/profile/admin', [AdminController::class, 'profileAdmin'])->name('profile.admin');
        Route::get('/manajemen-admin', [AdminController::class, 'manajemenAdmin'])->name('manajemen.admin');
        Route::get('/training-admin', [AdminController::class, 'trainingAdmin'])->name('training.admin');
        Route::get('/digital-admin', [AdminController::class, 'digitalAdmin'])->name('digital.admin');
        Route::get('/personal-admin', [AdminController::class, 'personalAdmin'])->name('personal.admin');
        Route::get('/organizer-admin', [AdminController::class, 'organizerAdmin'])->name('organizer.admin');
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/post/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}/edit/update', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
        Route::get('/whatssapp/notice/{id}', [ProdukController::class, 'konfirmasiPembelian'])->name('whatsapp.notice');
        Route::post('/proses-pembelian/{id}', [ProdukController::class, 'prosesPembelian'])->name('proses.pembelian');
        Route::post('/admin/konfirmasi/{id}', [AdminController::class, 'konfirmasiTransaksi'])->name('admin.konfirmasi');
        Route::post('/admin/tolak/{id}', [AdminController::class, 'tolakTransaksi'])->name('admin.tolak');
    });
    
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware('throttle:6,1')->name('verification.send');
});

Route::get('/', [PeribumiController::class, 'beranda'])->middleware('record.visitor')->name('beranda');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/auth/login', [PeribumiController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/lms', [LmsController::class, 'lmshome'])->name('lmshome');
Route::get('/lms/course', [LmsController::class, 'lmscourse'])->name('lmscourse');
