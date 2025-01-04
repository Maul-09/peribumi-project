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
        Route::post('/whatssapp/notice/{id}', [ProdukController::class, 'konfirmasiPembelian'])->name('whatsapp.notice');
        Route::get('/whatssapp/{id}', [ProdukController::class, 'WhatsappBlank'])->name('whatsapp.blank');
        Route::get('/edit/profile{id}', [CrudController::class, 'editProfile'])->name('editProfile');
        Route::post('/edit/profile/delete{id}', [CrudController::class, 'deleteAccount'])->name('deleteAccount');
        Route::post('/edit/profile/update{id}', [CrudController::class, 'update'])->name('update.profile');
        Route::delete('/edit/profile/delete-image/{id}', [CrudController::class, 'deleteImageProfle'])->name('delete.image.profile');
        Route::get('/profile/show/{id}', [CrudController::class, 'showProfile'])->name('profile.show');
        Route::get('/produk/user/{id}', [ProdukController::class, 'produkUser'])->name('produk.user');
        // Route::post('/restore-user', [CrudController::class, 'restoreByEmail'])->name('restore.user');
        // Route::get('/restore-confirm', [CrudController::class, 'confirmRestore'])->name('restore.confirm');
        // Route::get('/trash', [CrudController::class, 'trash'])->name('trash');
        // Route::get('/after-restore', [CrudController::class, 'afterRestore'])->name('after.restore');
        Route::post('/profile/change-password/{id}', [CrudController::class, 'changePassword'])->name('change.password');
        Route::post('review-store', [ReviewController::class, 'reviewStore'])->name('review.store');
        Route::delete('/produk/{produkId}/user/{userId}/cancel', [ProdukController::class, 'cancleTransaction'])->name('cancel.transaction');
    });
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin');
        Route::get('/admin/profile/{id}', [AdminController::class, 'profileAdmin'])->name('profile.admin');
        Route::get('/admin/manajemen-admin', [AdminController::class, 'manajemenAdmin'])->name('manajemen.admin');
        Route::get('/admin/training-admin', [AdminController::class, 'trainingAdmin'])->name('training.admin');
        Route::get('/admin/digital-admin', [AdminController::class, 'digitalAdmin'])->name('digital.admin');
        Route::get('/admin/personal-admin', [AdminController::class, 'personalAdmin'])->name('personal.admin');
        Route::get('/admin/organizer-admin', [AdminController::class, 'organizerAdmin'])->name('organizer.admin');
        Route::get('/admin/produk-create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/admin/post/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/admin/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/admin/produk/{id}/edit/update', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
        Route::post('/admin/proses-pembelian/{id}', [ProdukController::class, 'prosesPembelian'])->name('proses.pembelian');
        Route::post('/admin/konfirmasi/{id}', [AdminController::class, 'konfirmasiTransaksi'])->name('admin.konfirmasi');
        Route::post('/admin/tolak/{id}', [AdminController::class, 'tolakTransaksi'])->name('admin.tolak');
        Route::delete('/admin/delete/users/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
        Route::get('/admin/akun/setting/', [AdminController::class, 'settingAkun'])->name('setting.akun');
        Route::patch('/admin/restore/users/{id}/restore', [AdminController::class, 'restore'])->name('users.restore');
        Route::post('/admin/new/account/admin', [AdminController::class, 'addAccount'])->name('add.account');
        Route::delete('/admin/users/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
        Route::get('/admin/produk/aktif/settings', [AdminController::class, 'produkAktif'])->name('produk.aktif');
        Route::put('/admin/produk/{id}/nonaktifkan/{nomorTransaksi}', [AdminController::class, 'nonaktifkan'])->name('produk.nonaktifkan');
        Route::get('/admin/search-transaksi', [AdminController::class, 'searchTransaksi'])->name('admin.search-transaksi');
    });

    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware('throttle:6,1')->name('verification.send');
});

Route::get('/', [PeribumiController::class, 'beranda'])->middleware('record.visitor')->name('beranda');
Route::get('/beranda/about', [PeribumiController::class, 'aboutUs'])->name('about.us');
Route::get('/manajemen', [PeribumiController::class, 'manajemen'])->name('manajemen');
Route::get('/training', [PeribumiController::class, 'training'])->name('training');
Route::get('/digital', [PeribumiController::class, 'digital'])->name('digital');
Route::get('/personal', [PeribumiController::class, 'personal'])->name('personal');
Route::get('/event', [PeribumiController::class, 'event'])->name('event');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/auth/login', [PeribumiController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [CrudController::class, 'forgotView'])->name('password.request');
Route::post('/forgot-password', [CrudController::class, 'forgotSend'])->name('password.email');
Route::get('/reset-password/{token}', [CrudController::class, 'forgotHandler'])->name('password.reset');
Route::post('/reset-password', [CrudController::class, 'forgotUpdate'])->name('password.update');

Route::get('/lms', [LmsController::class, 'lmshome'])->name('lmshome');
Route::get('/lms/course', [LmsController::class, 'lmscourse'])->name('lmscourse');
