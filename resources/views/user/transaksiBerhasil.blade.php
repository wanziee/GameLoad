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
    <link rel="stylesheet" href="{{ asset('css/transaksiBerhasil.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css?v=1.0') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>
    <header>
        <div class="nav container">
            <a href="#" class="logo">Game<span>Load</span></a>
        </div>
    </header>
    <!-- Alert Message -->
    <div class="alert" id="success-alert">
        <div class="alert-canvas">
            <div class="check-alert">
                <i class='bx bx-check' ></i>
            </div>

            <div class="message-alert">
                <h4>Payment Successfull</h4>
                <p>Your purchase has been confirmed! </p>
            </div>
        </div>
    </div>


    <div class="konfirmasi" style="color: white">
        <div class="konfirmasi-canvas">
            @if(session("success"))
            <script>
                // Set options for Toastr
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",  // Atur posisi sesuai keinginan
                    "timeOut": "5000",  // Durasi pemberitahuan dalam milidetik
                    "extendedTimeOut": "1000"
                };
                
                // Toastr Notification
                toastr.success('{{ session("success") }}');
            </script>
        @endif

            <div class="bank-pilihan">
                <h2>TRANSAKSI SUKSES</h2>
                <i class='bx bx-check-circle'></i>
            </div>



            <div class="info-detail">
                <div class="line-sec"></div>
                <div class="item">
                    <p style="color: #9b9b9b;">No Invoice</p>
                    <p class="w">{{ $transaksi->transaction_id }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Item</p>
                    <p class="w">{{ $transaksi->nama_game }} {{ $transaksi->jumlah_diamond }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Harga</p>
                    <p class="w">IDR {{ number_format($transaksi->harga_diamond, 0, ',', '.') }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Bank</p>
                    <p class="w">{{ $transaksi->metode_pembayaran }}</p>
                </div>
            </div>

            <div class="line-sec"></div>

            <div class="info-detail">

                <div class="item">
                    <p style="color: #9b9b9b;">Username</p>
                    <p class="w">{{ $transaksi->username }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">ID Game</p>
                    <p class="w">{{ $transaksi->id_game_user }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Email</p>
                    <p class="w">{{ $transaksi->email }}</p>
                </div>


                <div class="line-sec"></div>

    
                <div class="menunggu">
                    <p style="color: #9b9b9b;">Terima kasih telah melakukan top-up di GameLoad. Saldo akan segera
                        diproses dan masuk ke akun Anda dalam beberapa menit. Jika ada kendala, jangan ragu untuk
                        menghubungi layanan pelanggan kami. Terima Kasih!</span></p>
                </div>
                <div class="button-home">
                    <a href="route{{ 'home' }}" class="buttonHome">Go Back</a>
                </div>

            </div>


        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // Function to show the alert and hide it after 3 seconds
        window.onload = function() {
            var alert = document.getElementById('success-alert');
            alert.style.display = 'block';  // Show the alert

            // Hide the alert after 3 seconds (3000ms)
            setTimeout(function() {
                alert.style.display = 'none';  // Hide the alert
            }, 4000);
        };
    </script>

</body>


</html>
