<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{



    public function showTransaksi(){

        $transaksi = Transaksi::all();
        return view('admin.adminTransaksi', compact('transaksi'));
    }
}
