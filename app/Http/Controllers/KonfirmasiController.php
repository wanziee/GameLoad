<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use App\Models\Transaksi;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;




class KonfirmasiController extends Controller
{

    public function createTransaction(Request $request)
    {
        // Atur konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');

        // Ambil harga diamond dan ubah ke integer
        $harga_diamond = intval(str_replace('.', '', $request->input('harga_diamond')));

        // Cari metode pembayaran
        $metode_pembayaran = $request->input('metode_pembayaran');
        $pembayaran = MetodePembayaran::where('nama_pembayaran', $metode_pembayaran)->first();

        if (!$pembayaran) {
            return response()->json(['error' => 'Metode pembayaran tidak valid'], 400);
        }

        $bankSlug = $pembayaran->bank_slug;
        $request->request->add(['status' => 'UNPAID', 'bank_slug' => $bankSlug]);

        // Simpan transaksi ke database
        $transaction = Transaksi::create([
            'transaction_id' => uniqid('T'),
            'id_game_user' => $request->input('id'),
            'email' => $request->input('email'),
            'nama_game' => $request->input('nama_game'),
            'metode_pembayaran' => $metode_pembayaran,
            'jumlah_diamond' => $request->input('jumlah_diamond'),
            'harga_diamond' => $harga_diamond,
            'status' => 'UNPAID', // Set default status
        ]);

        // Data transaksi untuk Midtrans
        $transactionDetails = [
            'order_id' => $transaction->transaction_id,
            'gross_amount' => $harga_diamond,
        ];

        $customerDetails = [
            'email' => $request->input('email'),
        ];

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'payment_type' => 'bank_transfer',
            'bank_transfer' => [
                'bank' => $bankSlug, // Pilih bank: bca, bri, dll.
            ],
        ];

        try {
            // Kirim data ke Midtrans dan dapatkan response
            $midtransResponse = \Midtrans\CoreApi::charge($transactionData);

            // Update transaksi dengan data response Midtrans
            $transaction->update([
                'midtrans_response' => json_encode($midtransResponse),
            ]);

            // Mengambil nomor VA dari response
            $vaNumber = $midtransResponse->va_numbers[0]->va_number;
            $expiryTime = $midtransResponse->expiry_time;

            // Return langsung dengan view untuk menampilkan halaman pembayaran
            return view('user.konfirmasi', [
                'transaction_id' => $transaction->transaction_id,
                'order_id' => $transaction->transaction_id,
                'va_number' => $vaNumber,
                'expiry_time' => $expiryTime,
                'gross_amount' => $harga_diamond,
                'id_game_user' => $request->input('id'),
                'data_pembayaran' =>$pembayaran,
                'email' => $request->input('email'),
                'nama_game' => $request->input('nama_game'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'jumlah_diamond' => $request->input('jumlah_diamond'),
                'harga_diamond' => $request->input('harga_diamond'),
                'status' => 'UNPAID',  // bisa ditambahkan jika diperlukan
          
            ]);
        } catch (\Exception $e) {
            // Log error
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat transaksi.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
