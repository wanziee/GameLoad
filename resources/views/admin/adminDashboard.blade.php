@extends('layouts.layout')

@section('content')
    <style>
        .box {
            height: auto;
            background-color: #191C24;
            padding: 10px;
            position: relative;
        }

        .text-total {
            color: white;
        }

        .bi {
            color: white;
            position: absolute;
            left: 63px;
            top: 34px;
            font-size: 26px
        }

        .desx-total{
            font-size: 15px !important;
            color: rgb(162, 162, 162);
        }
        .jumlah-total{
            font-size: 20px;
        }
        .img-total {
            max-width: 100px;
            max-height: 100px;
            width: auto;
            height: auto;
        }

        canvas {
            width: 150px !important;
            height: 150px !important;
        }

        .chart-box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text-chart {
            font-size: 13px;
        }

        .badge-mobile {
            background-color: #ff433a;
        }

        .badge-pc {
            background-color: #00D25B;
        }

        .badge-voucher {
            background-color: #0D6EFD;
        }

        .table {
            border-color: rgb(100, 100, 100);
            border-width: 1px;
        }
      
        .isi-table{   
            font-weight: 100;
            font-size: 12px;
        }
        .transaction-status{
            padding: 5px 7px;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 12px;
            color: white;
        }
        .status-paid {
            background-color: #00D25B !important; /* Warna hijau untuk PAID */
        }

        .status-unpaid {
            background-color: rgb(255, 74, 74) !important; /* Warna merah untuk UNPAID */
        }

        @media (max-width: 600px){
            .img-total {
            max-width: 70px;
            max-height: 70px;
            width: auto;
            height: auto;
        }

        .bi {
            color: white;
            position: absolute;
            left: 48px;
            top: 30px;
            font-size: 16px
        }

        .jumlah-topup{
            text-align: center;
        }



        }
    </style>
    <div class="p-4 ">
        <div class="row">
            <!-- First Row (3 Boxes) -->
            <div class="col-6 col-md-3 col-lg-3 mb-4 align-items-stretch">
                <div class="box h-100 d-flex">
                    <img src="{{ asset('img/shape1.png') }}" alt="" class="img-total img-fluid">
                    <i class="bi bi-people-fill"></i>
                    <div class="text-total d-flex flex-column justify-content-center ms-2">
                        <p class="desx-total m-0">users</p>
                        <p class="jumlah-total m-0">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 mb-4 align-items-stretch">
                <div class="box h-100 d-flex">
                    <img src="{{ asset('img/shape2.png') }}" alt="" class="img-total img-fluid">
                    <i class="bi bi-phone"></i>
                    <div class="text-total d-flex flex-column justify-content-center ms-2">
                        <p class="desx-total m-0">Mobile Games</p>
                        <p class="jumlah-total m-0">{{ $totalMobileGames }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 mb-4 align-items-stretch">
                <div class="box h-100 d-flex">
                    <img src="{{ asset('img/shape3.png') }}" alt="" class="img-total img-fluid">
                    <i class="bi bi-pc-display"></i>
                    <div class="text-total d-flex flex-column justify-content-center ms-2">
                        <p class="desx-total m-0">PC Games</p>
                        <p class="jumlah-total m-0">{{ $totalPCGames }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-3 mb-4 align-items-stretch">
                <div class="box h-100 d-flex">
                    <img src="{{ asset('img/shape4.png') }}" alt="" class="img-total img-fluid">
                    <i class="bi bi-gift"></i>
                    <div class="text-total d-flex flex-column justify-content-center ms-2">
                        <p class="desx-total m-0">Vouchers</p>
                        <p class="jumlah-total m-0">{{ $totalVouchers }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <!-- Second Row (3 Boxes) -->
            <div class="col-md-4 col-lg-4 mb-4">
                <div class="box h-100">
                    <p class="text-light">Games Chart</p>
                    <div class="chart-box">
                        <canvas id="categoryChart"></canvas>
                    </div>
                    <div class="text-chart text-light row mt-4">
                        <div class="top col-12 d-flex justify-content-around align-items-center ">
                            <p>Mobile Games <span
                                    class="badge badge-mobile rounded-pill  ms-2">{{ $totalMobileGames }}</span></p>
                            <p>PC Games <span class="badge badge-pc rounded-pill  ms-2">{{ $totalPCGames }}</span></p>
                        </div>
                        <p class="col-12 text-center ">Vouchers <span
                                class="badge badge-voucher rounded-pill  ms-2">{{ $totalVouchers }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 mb-4">
                <div class="box h-100">
                    <p class="text-light">Top 5 Games</p>
                    <table class="table mt-2">
                        <thead>
                            <tr class="text-white ">
                                <th>No.</th>
                                <th>Nama Game</th>
                                <th>Kategori</th>
                                <th class="text-center">Jumlah Top-Up</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $badgeColors = ['primary', 'success', 'info', 'warning', 'danger'];
                        @endphp
                        
                        @foreach ($popularGames as $index => $popularGame)
                            @php
                                $badgeColor = $badgeColors[$index % count($badgeColors)];
                            @endphp
                            <tr class="align-middle isi-table">
                                <td class="text-white detail-td">{{ $index + 1 }}</td>
                                <td class="text-white detail-td">{{ $popularGame->nama_game }}</td>
                                <td class="text-white detail-td">{{ $popularGame->kategori }}</td>
                                <td class="text-white detail-td text-center">
                                    <span class="badge bg-{{ $badgeColor }}">{{ $popularGame->total_transaksi }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="box h-100">
                    <p class="text-light">Latest Transactions</p>
                    <table  class="table mt-2">
                        <thead>
                            <tr class="text-white">
                                <th>No.</th>
                                <th>Email</th>
                                <th>Nama Game</th>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transaksi as $index => $transaksi)
                            <tr class="align-middle isi-table">
                                <td class="text-white">{{ $index + 1 }}</td>
                                <td class="text-white">{{ $transaksi->email }}</td>
                                <td class="text-white">{{ $transaksi->nama_game }}</td>
                                <td class="text-white">{{ $transaksi->jumlah_diamond }}</td>
                                <td class="text-white">Rp.{{ number_format($transaksi->harga_diamond, 0, ',', '.') }}</td>
                                <td><div class="transaction-status @if ($transaksi->status == 'PAID') 
                                    status-paid 
                                @elseif ($transaksi->status == 'UNPAID') 
                                    status-unpaid 
                                @endif">
                                {{ $transaksi->status }}
                            </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var totalGames = {{ $totalMobileGames }} + {{ $totalPCGames }} + {{ $totalVouchers }}; // Total semua kategori

        var categoryChart = new Chart(ctx, {
            type: 'doughnut',
            data: {

                datasets: [{
                    label: 'Category Counts',
                    data: [{{ $totalMobileGames }}, {{ $totalPCGames }}, {{ $totalVouchers }}],
                    backgroundColor: ['#ff433a', '#00D25B', '#0D6EFD'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' games';
                            }
                        }
                    },
                },
                // Mengatur ketebalan cincin donat
                cutout: '70%', // Semakin besar nilai persentasenya, semakin tipis donat
            },
            // Custom plugin untuk menambahkan total ke tengah donut chart
            plugins: [{
                afterDraw: function(chart) {
                    var ctx = chart.ctx;
                    var width = chart.width;
                    var height = chart.height;
                    var fontSize = (height / 150).toFixed(2); // Menentukan ukuran font lebih kecil

                    ctx.restore();
                    ctx.font = (fontSize * 1.9) + "em sans-serif";
                    ctx.fillStyle = '#FFF'; // Warna teks total (putih)
                    ctx.textBaseline = 'middle';

                    var text = totalGames; // Menampilkan total games
                    var textX = Math.round((width - ctx.measureText(text).width) / 2);
                    var textY = height / 2.2; // Teks total di tengah

                    // Menulis teks total
                    ctx.fillText(text, textX, textY);

                    // Menulis "games" di bawah total
                    ctx.font = (fontSize * 0.7) +
                        "em sans-serif"; // Font yang lebih kecil untuk "games"
                    var gamesText = 'games'; // Teks "games"
                    ctx.fillStyle = '#6c7293';
                    var gamesTextX = Math.round((width - ctx.measureText(gamesText).width) / 2);
                    var gamesTextY = height / 1.55 + fontSize *
                        0; // Menempatkan teks "games" sedikit di bawah total (penyesuaian lebih tepat)

                    ctx.fillText(gamesText, gamesTextX, gamesTextY); // Menulis teks "games"
                    ctx.save();
                }
            }]
        });

        // Menambahkan event listener untuk resize window agar menyesuaikan ukuran font dan posisi
        window.addEventListener('resize', function() {
            categoryChart.update(); // Memperbarui chart saat window diresize
        });
    </script>
@endsection
