<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Transaksi;
use Midtrans\Notification;
use Illuminate\Support\Facades\Mail;
use Midtrans\CoreApi;
use App\Mail\PaymentSuccessMail;
use Midtrans\Config;
use Log;

class MidtransController extends Controller
{
    public function handleMidtransNotification(Request $request)
    {
        
    }
}