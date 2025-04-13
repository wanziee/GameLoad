<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Menampilkan form pembayaran
    public function show($transactionId)
    {
        $transaction = Transaksi::findOrFail($transactionId);
        $paymentMethods = MetodePembayaran::all();

        return view('payment.show', compact('transaction', 'paymentMethods'));
    }

    // Proses pembayaran
    public function process(Request $request, $transactionId)
    {
        // Validasi input
        $validated = $request->validate([
            'payment_method' => 'required|exists:payment_methods,id',
        ]);

        // Temukan transaksi berdasarkan ID
        $transaction = Transaksi::findOrFail($transactionId);

        // Simulasi proses pembayaran (misalnya, integrasi dengan API gateway)
        $transaction->status = 'paid';
        $transaction->payment_method_id = $validated['payment_method'];
        $transaction->save();

        // Redirect ke halaman konfirmasi
        return redirect()->route('transaction.show', ['id' => $transaction->id]);
    }
}
