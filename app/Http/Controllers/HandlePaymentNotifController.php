<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Transaction;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB; // Pastikan DB facade tersedia

class HandlePaymentNotifController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        try {
            // Menyimpan payload notifikasi untuk debugging
            Log::info('Midtrans Notification Received', $request->all());

            // Ambil data notifikasi dari payload
            $payload = $request->all();

            // Validasi data yang diperlukan
            if (!isset($payload['order_id'], $payload['status_code'], $payload['transaction_status'])) {
                Log::warning("Invalid payload: " . json_encode($payload));
                return response()->json(['message' => 'Invalid payload'], 400);
            }

            // Mendapatkan nilai dari payload
            $orderId = $payload['order_id'];  // order_id dari Midtrans
            $transactionStatus = $payload['transaction_status'];  // status transaksi dari Midtrans

            // Tentukan status transaksi yang diinginkan, misalnya 'paid' jika status transaksi adalah 'settlement'
            if ($transactionStatus == 'settlement') {
                // Pastikan transaksi ada di database dan update statusnya
                $updated = DB::table('transaksi')
                    ->where('transaction_id', $orderId)  // Ganti dengan 'order_id' jika menggunakan order_id
                    ->update(['status' => 'PAID']);  // Update status menjadi 'paid'

                if ($updated) {
                    Log::info("Transaction status updated to 'paid' for Order ID: $orderId");
                    return response()->json(['message' => 'Transaction status updated successfully'], 200);
                } else {
                    Log::warning("No transaction found or update failed for Order ID: $orderId");
                    return response()->json(['message' => 'Failed to update transaction status'], 400);
                }
            } else {
                Log::info("Transaction not settled, skipping update for Order ID: $orderId");
                return response()->json(['message' => 'Transaction not settled'], 200);
            }
        } catch (\Exception $e) {
            // Tangani error tak terduga
            Log::error('Error processing Midtrans notification: ' . $e->getMessage(), [
                'exception' => $e,
                'payload' => $request->all(),
            ]);
            return response()->json(['message' => 'Server error'], 500);
        }
    }

    
    public function transaksiBerhasil($transaction_id)
    {
        $transaksi = Transaksi::where('transaction_id', $transaction_id)->first();
        if (!$transaksi) {
            return redirect()->route('home')->withErrors('Transaksi tidak ditemukan.');
        }
        return view('user.transaksiBerhasil', compact('transaksi'))->with('success', 'Transaksi berhasil!');
    }

    public function cekStatusTransaksi($transaction_id)
    {
        $transaksi = Transaksi::where('transaction_id', $transaction_id)->first();
        if (!$transaksi) {
            return response()->json(['status' => 'NOT_FOUND'], 404);
        }
        return response()->json(['status' => $transaksi->status]);
    }
}
