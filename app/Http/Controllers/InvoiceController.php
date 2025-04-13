<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class InvoiceController extends Controller
{

    public function invoiceShow()
    {
        return view('user.invoice');
    }


    public function invoiceFind(Request $request){
        $request->validate([
            'transaction_id' => 'required',
        ]);
        $invoice = Transaksi::where('transaction_id', $request->transaction_id)->first();
        $statusTransaksi = ($invoice && $invoice->status == 'PAID') ? 'SUCCESS' : 'PENDING';
        return view('user.invoiceFind', [
            'invoice' => $invoice,
            'transaction_id' => $request->transaction_id,
            'statusTransaksi' => $statusTransaksi,  // Kirim status transaksi ke view
        ]);
    }
}
