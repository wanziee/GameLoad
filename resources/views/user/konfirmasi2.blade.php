
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konfirmasi</title>
    <link rel="stylesheet" href="{{ asset('css/index.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/konfirmasi.css?v=1.0') }}">
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

    <div class="konfirmasi" style="color: white">
        <div class="konfirmasi-canvas">
            <div class="back">
                <a href="#" onclick="goBack()">
                    <i class='bx bx-chevron-left'></i>
                </a>
            </div>
            <div class="bank-pilihan">
                <div class="img-pembayaran">
                    <img src="{{ asset('metode pembayaran/' . $foto_pembayaran) }}" alt="">
                </div>
                <p>{{ $metode_pembayaran }}</p>
            </div>

            <div class="harga-pilihan">
                <p style="color: #9b9b9b;">Jumlah total</p>
                <h1>IDR {{ $harga_diamond }}</h1>
            </div>

            <div class="info-detail">
                <div class="item">
                    <p style="color: #9b9b9b;">Item</p>
                    <p class="w">{{ $nama_game }} {{ $jumlah_diamond }}</p>
                </div>
                <div class="harga">
                    <p style="color: #9b9b9b;">Harga</p>
                    <p class="w">IDR {{ $harga_diamond }}</p>
                </div>
                <div class="harga">
                    <p style="color: #9b9b9b;">{{ $pembayaran->nama_metode }}</p>
                    <p class="w">{{ $pembayaran->detail_metode }}</p>
                </div>
            </div>

            <div class="line-sec"></div>

            <div class="info-detail">
                <div class="harga">
                    <p style="color: #9b9b9b;">Id game</p>
                    <p class="w">{{ $id }}</p>
                </div>
                <div class="item">
                    <p style="color: #9b9b9b;">Email</p>
                    <p class="w">{{ $email }}</p>
                </div>

                <div class="line-sec"></div>
                <div class="menunggu">
                    <p style="color: #9b9b9b;">Anda sedang melakukan TOPUP Game di GameLoad segera selesaikan pembayaran,<span style="color: white;"> session akan berakhir dalam 30 menit.</span></p>
                </div>
            </div>

            <div class="last">
                <div class="col">
                    <div><img src="https://static-00.iconduck.com/assets.00/security-high-symbolic-icon-1793x2048-29b4a8wi.png" alt=""></div>
                    <div class="cols">
                        <p>Payment</p>
                        <p>secured</p>
                    </div>
                </div>
                <div id="timer">30:00</div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        var timerDisplay = document.getElementById('timer');
        var timeLeft = 30 * 60; // 30 minutes in seconds

        function updateTimer() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            var displayMinutes = minutes < 10 ? '0' + minutes : minutes;
            var displaySeconds = seconds < 10 ? '0' + seconds : seconds;

            timerDisplay.textContent = displayMinutes + ':' + displaySeconds;

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
