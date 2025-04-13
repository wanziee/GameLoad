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
    <link rel="stylesheet" href="{{ asset('css/konfirmasi.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css?v=1.0') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  

</head>

<body>
    {{-- <header>
        <div class="nav container">
            <a href="#" class="logo">Game<span>Load</span></a>
        </div>
    </header> --}}
    @include('user.navbarNoBack')



    <div class="konfirmasi" style="color: white">
        <div class="konfirmasi-canvas">
            <div class="back">
                <a href="#" onclick="goBack()">
                    <i class='bx bx-chevron-left'></i>
                </a>
            </div>


                <div class="bank-pilihan">
                    <div class="img-pembayaran">
                        <img src="{{ asset('metode pembayaran/' . $data_pembayaran->foto_pembayaran) }}" alt="">
                    </div>
                    <p>{{ $metode_pembayaran }}</p>
                </div>
     
    
                <div class="harga-pilihan">
                    <p style="color: #9b9b9b;">Jumlah total</p>
                    <h2>IDR {{ number_format($gross_amount, 0, ',', '.')}}</h2>
                </div>

            <div class="line-sec"></div>

            <div class="info-detail">
                <div class="item">
                    <p style="color: #9b9b9b;">No Invoice</p>
                    <p class="w">{{$transaction_id}}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Item</p>
                    <p class="w">{{ $nama_game }} {{ $jumlah_diamond }}</p>
                </div>
                <div class="harga">
                    <p style="color: #9b9b9b;">Harga</p>
                    <p class="w">IDR {{ $harga_diamond }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Bank</p>
                    <p class="w">{{ $metode_pembayaran }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Virtual Account</p>
                    <p class="w">{{ $va_number }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Expiry Tme</p>
                    <p class="w"> {{ $expiry_time }}</p>
                </div>
            </div>

            <div class="line-sec"></div>

            <div class="info-detail">
                <div class="item">
                    <p style="color: #9b9b9b;">Username</p>
                    <p class="w"></p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Email</p>
                    <p class="w">{{ $email }}</p>
                </div>
                <div class="harga">
                    <p style="color: #9b9b9b;">Id game</p>
                    <p class="w">{{ $id_game_user }}</p>
                </div>

                <div class="line-sec"></div>
                <div class="menunggu">
                    <p style="color: #9b9b9b;">Anda sedang melakukan TOPUP Game di GameLoad segera selesaikan
                        pembayaran,<span style="color: white;"> session akan berakhir dalam 24 jam.</span></p>
                </div>
                <div id="timer">24:00:00</div>
            </div>



        </div>
    </div>

    <script>
        var transactionId = "{{ $transaction_id }}"; // Pastikan ini dikirimkan dari server
        setInterval(function() {
            fetch('/api/cek-status-transaksi/' + transactionId)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'PAID') {
                        window.location.href = '/api/transaksi-success/' + transactionId;
                    }
                })
                .catch(error => console.error('Error fetching transaction status:', error));
        }, 3000); // Cek setiap 5 detik
    </script>
    

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        var timerDisplay = document.getElementById('timer');
        var timeLeft = 24 * 60 * 60; // 24 hours in seconds
    
        function updateTimer() {
            var hours = Math.floor(timeLeft / 3600); // Hitung jam
            var minutes = Math.floor((timeLeft % 3600) / 60); // Hitung menit
            var seconds = timeLeft % 60; // Hitung detik
    
            var displayHours = hours < 10 ? '0' + hours : hours;
            var displayMinutes = minutes < 10 ? '0' + minutes : minutes;
            var displaySeconds = seconds < 10 ? '0' + seconds : seconds;
    
            timerDisplay.textContent = displayHours + ':' + displayMinutes + ':' + displaySeconds;
    
            if (timeLeft === 0) {
                clearInterval(timerInterval);
                timerDisplay.textContent = 'Time\'s up!';
            } else {
                timeLeft--;
            }
        }
    
        var timerInterval = setInterval(updateTimer, 1000);
    
        function goBack() {
            window.history.back();
        }
    </script>



    
</body>


</html>
