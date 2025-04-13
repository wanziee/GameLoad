<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HandlePaymentNotifController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans/notif-hook', [HandlePaymentNotifController::class, '__invoke']);
Route::get('/cek-status-transaksi/{transaction_id}', [HandlePaymentNotifController::class, 'cekStatusTransaksi']);
Route::get('/transaksi-success/{transaction_id}', [HandlePaymentNotifController::class, 'transaksiBerhasil'])->name('transaksi.berhasil');

