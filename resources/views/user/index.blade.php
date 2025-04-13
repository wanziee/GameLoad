<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

</head>
<body>
    @include('user.navbar') <!-- Gunakan Laravel blade untuk menyertakan navbar -->

    <!-- home section -->
    <section class="home container banner" id="home">
        <img src="{{ asset('img/fortnite banner2.jpeg') }}" alt="">
        <div class="home-text">
            <h1>SEASON 4</h1>
            <p>Lars Ulrich, James Hetfield, Kirk <br>Hammett, and Robert Trujillo from <br>Metallica are Icons of
                Fortnite Festival Season 4!</p>
            <a href="{{ url('game') }}" class="btn">TopUp Now</a>
        </div>
    </section>

    <!-- trending section -->
    <section class="trending container" id="trending" >
        
        <div class="heading">
            <p style="color: white;">Trending Games 🔥</p>
            <div class="swiper-buttons">
                <div class="swiper-button-prev">
                    <i class='bx bx-left-arrow-alt slider-arrow'></i>
                </div>
                <div class="swiper-button-next">
                    <i class='bx bx-right-arrow-alt slider-arrow'></i>
                </div>
            </div>
            
        </div>

        <div class="trending-content swiper">
            <div class="swiper-wrapper">
                <!-- swiper 1 -->
                @foreach ($popularGames as $popularGame)
                    <div class="swiper-slide">
                        <div class="game-card">
                            <a href="{{ route('game.detail', ['slug' => $popularGame->slug]) }}" class="popularGcard-link">
                                <div class="game-image">
                                    <img src="{{ asset('img/' . $popularGame->foto) }}" alt="{{ $popularGame->nama_game }}" class="img1">
                                </div>
                                <div class="game-details">
                                    <div class="game-kategori">{{  $popularGame->kategori->nama_kategori }}</div>
                                    <div class="game-title">{{ $popularGame->nama_game }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- new content -->
    <section class="new container" id="new" >
        <div class="heading">
            <p style="color: white;">Games 🎮</p>
        </div>

        <div class="new-content" >
            @foreach ($allGamesHome as $allGame)
                <div class="game-card">
                    <a href="{{ route('game.detail', ['slug' => $allGame->slug]) }}" class="game-card-link">
                        <div class="game-image">
                            <img src="{{ asset('img/' . $allGame->foto) }}" alt="{{ $allGame->nama_game }}" class="img1">
                        </div>
                        <div class="game-details">
                            <div class="game-kategori">{{ $allGame->kategori->nama_kategori }}</div>
                            <div class="game-title">{{ $allGame->nama_game }}</div>
                        </div>
                    </a>
                </div>
            @endforeach

            <!-- see more game -->
            <a href="{{ route('game.all') }}">
            <div class="game-cards game-card" onclick="location.href='{{ url('game') }}'">
                
                <div class="pita">
                    <i class="bx bxs-joystick" style="color:#f9f7f7"></i>
                    <h2 style="color: white;">SHOW ALL GAMES</h2>
                </div>
                <i class="bx bx-right-arrow-alt arrow" style="color:white"></i>
                <div class="seemore"></div>
            
            </div>
        </a>
        </div>
    </section>

@include('user.footer')

    {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
