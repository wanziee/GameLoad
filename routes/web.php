<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\gameController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\HandlePaymentNotifController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\GamesController as AdminGamesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersControler;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;

// User Routes 
Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('game/{slug}', [gameController::class, 'show'])->name('game.detail');
Route::get('/libraryGame/all-games', [GameController::class, 'showAllGames'])->name('game.all');
Route::get('/libraryGame/pc-games', [GameController::class, 'showPCGames'])->name('game.pc');
Route::get('/libraryGame/mobile-games', [GameController::class, 'showMobileGames'])->name('game.mobile');
Route::get('/libraryGame/vouchers', [GameController::class, 'showVouchers'])->name('game.vouchers');
Route::get('news', [newsController:: class, 'showNews'])->name('show_news');
Route::get('contact', [contactController:: class, 'showContact'])->name('show_contact');
Route::get('login', [loginController:: class, 'showLogin'])->name('show_login');
Route::post('/konfirmasi', [KonfirmasiController::class, 'createTransaction'])->name('konfirmasi');
Route::get('/invoice', [InvoiceController::class, 'invoiceShow'])->name('invoice.show');
Route::post('/invoice/find', [InvoiceController::class, 'invoiceFind'])->name('invoice.find');

// Admin Routes
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('show.login');
Route::post('admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
Route::post('admin/logout', [AdminloginController::class, 'logout'])->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'showDashboard'])->name('show.adminDashboard');
    Route::get('games', [AdminGamesController::class, 'showAllGames'])->name('show.adminAllGames');
    Route::get('Users', [AdminUsersControler::class, 'showUsers'])->name('show.adminUsers');
    Route::get('/admin/games/{id}/edit', [AdminGamesController::class, 'edit'])->name('admin.games.edit');
    Route::put('/admin/games/{id}', [AdminGamesController::class, 'update'])->name('admin.games.update');
    Route::post('/admin/games/', [AdminGamesController::class, 'create'])->name('admin.games.create');
    Route::get('/admin/games/tambah', [AdminGamesController::class, 'showTambahGame'])->name('show.adminTambahGame');
    Route::get('Transaksi', [AdminTransaksiController::class, 'showTransaksi'])->name('show.adminTransaksi');
});


