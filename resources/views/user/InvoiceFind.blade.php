<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="({{config('midtrans.client_key')}})"></script> --}}
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>konfirmasi</title>

    <link rel="stylesheet" href="{{ asset('css/index.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/invoiceBerhasil.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css?v=1.0') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
    @include('user.navbar')
    <!-- Alert Message -->



    <div class="konfirmasi" style="color: white">
        <div class="konfirmasi-canvas">


            <div class="bank-pilihan">
                <h2>INVOICE</h2>
            </div>


            <div class="info-detail">
                <table class="invoice-table">
                    <tr>
                        <th>No Invoice</th>
                        <td>{{ $invoice->transaction_id }}</td>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <td>{{ $invoice->nama_game }} {{ $invoice->jumlah_diamond }}</td>
                    </tr>
                    <tr>
                        <th>ID Game</th>
                        <td>{{ $invoice->id_game_user }}</td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>{{ $invoice->metode_pembayaran }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>IDR {{ number_format($invoice->harga_diamond, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $invoice->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $invoice->email }}</td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran</th>
                        <td>
                            <span class="
                                @if($invoice->status == 'PAID') 
                                    text-white bg-success 
                                @elseif($invoice->status == 'UNPAID') 
                                    text-white bg-danger 
                                @endif
                            ">
                                {{ $invoice->status }}
                            </span>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>Status Transaksi</th>
                        <td>
                            <span class="
                                @if($statusTransaksi == 'SUCCESS') 
                                    text-white bg-success 
                                @elseif($statusTransaksi == 'PENDING') 
                                    text-dark bg-warning 
                                @endif
                            ">
                                {{ $statusTransaksi }}
                            </span>
                        </td>
                    </tr>
                    
                        
                    <tr></tr>
                </table>
            </div>

    
                <div class="menunggu">
                    <p style="color: #9b9b9b;">Terima kash sudah order di GAMELOAD, semoga Braderpedia sehat selalu dan lancar rezekinya....:)</span></p>
                </div>
                <div class="button-home">
                    <a href="{{route('home')}}" class="buttonHome">Go Back</a>
                </div>

            </div>


        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>


</html>
