<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
     <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="({{config('midtrans.client_key')}})"></script> --}}
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>invoice</title>

    <link rel="stylesheet" href="{{ asset('css/index.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/invoice.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  

</head>

<body>
    @include('user.navbar') 

    <img class="background-invoice" src="{{asset('img/background-invoice.png')}}" alt="">

    <div class="konfirmasi" style="color: white">

        <h1>Cek Invoice Kamu dengan Mudah dan Cepat.</h1>
        <p>Lihat detail pembelian kamu menggunakan nomor Invoice.</p>


        <div class="konfirmasi-canvas">
            <h5>Cari detail pembelian kamu disini</h5>
            <form method="POST" action="{{ route('invoice.find')}}">
                @csrf
                <div class="form">
                    @error('transaction_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                    
                    <input 
                        type="text" 
                        class="form-input @error('transaction_id') is-invalid @enderror" 
                        id="transaction_id" 
                        name="transaction_id" 
                        value=""
                        placeholder="Masukkan nomor invoice kamu (Contoh: TXXXXXXXXXXXX)"
                    >
   
                </div>
                <button type="submit" class="button-search">
                    <img src="{{ asset('img/searchFile.svg') }}" alt="Deskripsi Ikon" class="svg-icon"></i> Cari Invoice
                </button>
     
            </form>
            
    </div>



    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
   
</body>


</html>
