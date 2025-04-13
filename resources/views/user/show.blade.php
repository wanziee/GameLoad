<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->nama_game }}</title>
    <link rel="stylesheet" href="{{ asset('css/show.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    @include('user.navbar') <!-- Include Laravel Blade navbar -->

    <div class="detail container">
        <div class="left-container">
            <div class="imgcover">
                <img class="imgright" src="{{ asset('img/' . $game->banner) }}" alt="">
                <div class="detailhp">
                    <div class="logo-wrap"><img src="{{ asset('img/' . $game->logo) }}" alt=""></div>
                </div>
            </div>

            <form action="{{ url('konfirmasi') }}" method="post" enctype="multipart/form-data" id="form-konfirmasi">
                @csrf
                @if ($needsId)
                    <div class="masukkan-id">
                        <div class="atas">
                            <div class="urutan3">1</div>
                            <div class="urutan-huruf">MASUKKAN ID</div>
                        </div>
                        <div class="bawah">
                            <label for="id"></label>
                            <i class='bx bx-user' style="color: white;"></i>
                            <input type="text" class="id" name="id" id="id" placeholder="Id Pengguna" autocomplete="off" required>
                        </div>
                    </div>
                @endif



                <div class="masukkan-email">
                    <div class="atas">
                        <div class="urutan2">{{ $needsId ? '2' : '1' }}</div>
                        <div class="urutan-huruf">MASUKKAN EMAIL</div>
                    </div>
                    <div class="bawah">
                        <label for="email"></label>
                        <i class='bx bx-envelope' style="color: white;"></i>
                        <input type="email" class="email" name="email" id="email" placeholder="user@gmail.com" autocomplete="off" required>
                    </div>
                </div>

                <div class="pilih-jumlah">
                    <div class="atas">
                        <div class="urutan1">{{ $needsId ? '3' : '2' }}</div>
                        <div class="urutan-huruf">PILIH JUMLAH</div>
                    </div>
                    <div class="detail-jumlah">
                        @foreach ($prices as $data) <!-- Assuming $prices is passed as an array -->
                            <ul>
                                <input type="radio" class="jumlah-item" name="jumlah_diamond" id="jumlah_{{ $data->id }}" data-harga="{{ $data->harga_diamond }}" value="{{ $data->jumlah_diamond }} {{ $data->nama_diamond }}">
                                <label for="jumlah_{{ $data->id }}">
                                    <li>
                                        <h3>{{ $data->jumlah_diamond }} {{ $data->nama_diamond }}</h3>
                                    </li>
                                </label>
                            </ul>
                        @endforeach
                    </div>
                </div>

                <div class="pilih-pembayaran">
                    <div class="atas">
                        <div class="urutan4">{{ $needsId ? '4' : '3' }}</div>
                        <div class="urutan-huruf">PILIH SALURAN PEMBAYARAN</div>
                    </div>
                    <div class="bawah-pembayaran">
                        <div class="detail-harga">
                            <h2 class="hargas harga">IDR 0</h2>
                        </div>
                        <div class="metode-pembayaran">
                            @foreach ($paymentMethods as $data) <!-- Assuming $pembayaran is an array -->
                                <ul>
                                    <input type="radio" class="jumlah-harga" id="metode_{{ $data->id }}" name="metode_pembayaran" value="{{ $data->nama_pembayaran }}" required>
                                    <label for="metode_{{ $data->id }}">
                                        <li>
                                            <div class="wrap active" data-target="wrap-line">
                                                <div class="wrap-atas">
                                                    <img src="{{ asset('metode pembayaran/' . $data->foto_pembayaran) }}" alt="">
                                                    <div class="wrap-harga">
                                                        <p>IDR</p>
                                                        <h3 class="harga">0</h3>
                                                    </div>
                                                </div>
                                                <div class="wrap-bawah">
                                                    <div class="wrap-line"></div>
                                                    <p>{{ $data->nama_pembayaran }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </label>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>

                <input type="hidden" name="harga_diamond" id="harga_diamond">

                <input type="hidden" name="nama_game" value="{{ $game->nama_game }}">
     


                <div class="konfirmasi-pembayaran">
                    <div class="atas">
                        <div class="urutan2">{{ $needsId ? '5' : '4' }}</div>
                        <div class="urutan-huruf">KONFIRMASI PEMBAYARAN</div>
                    </div>
                    <div class="bawah">
                        <input type="submit" name="konfirmasi" value="Konfirmasi">
                        <p>Dengan klik "Konfirmasi", berarti Anda setuju dengan <span style="color:orange">Syarat dan Ketentuan Pengguna & Kebijakan Privasi.</span></p>
                    </div>
                </div>
            </form>
        </div>


        
        <div class="right-container">
            <div class="sticky">
                <div class="logo-detail">
                    <img src="{{ asset('img/' . $game->logo) }}" alt="">
                </div>

                <div class="kategori-detail">
                    <div class="kategorii">
                        <p>{{ $category->nama_kategori }}</p>
                    </div>
                    <div class="detail-game">
                        <p>{{ $game->detail }}</p>
                    </div>
                </div>

                <div class="kelebihan-topup">
                    <div class="garis">
                        <div class="line"></div>
                    </div>
                    <h3>Kenapa TOPUP di GameLoad?</h3>
                    <p>Dijamin Hemat. Pasti ada promo setiap hari 🔥</p>
                    <p>Mudah & Otomatis. Tidak perlu kirim bukti transfer.</p>
                    <p>Dijamin Resmi. Pasti dikirim dalam hitungan detik.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('#form-konfirmasi').addEventListener('submit', (e) => {
  const hargaDiamondInput = document.querySelector('#harga_diamond');
  if (!hargaDiamondInput.value) {
      alert('Harga diamond belum dipilih!');
      e.preventDefault();
  }
  });
    </script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
