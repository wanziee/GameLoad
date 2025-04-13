<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <!-- Use Laravel's asset() helper to link to assets -->
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <!-- Include the navbar using Laravel Blade -->
    @include('user.navbar')

    <!-- kategori -->
    <div class="kategori-game">
        <div class="container">
            <p style="color: white;">Category</p>
            <div class="kategori" id="swiper-container">
                <div class="swiper-wrapper">

                    <div class="kategori-card swiper-slide">
                        <a href="{{ route('game.all') }}">
                            <div class="foto-kategori">
                                <div><img src="{{ asset('img/valorant.jpg.webp') }}" alt=""></div>
                                <div class="depan"><img src="{{ asset('img/hoc card.webp') }}" alt=""></div>
                                <div><img src="{{ asset('img/netflix.png') }}" alt=""></div>
                            </div>
                            <div class="teks-kategori">
                                <h2>ALL GAMES</h2>
                            </div>
                        </a>
                    </div>
                    <div class="kategori-card swiper-slide">
                        <a href="{{ route('game.mobile') }}">
                            <div class="foto-kategori">
                                <div><img src="{{ asset('img/mobile legends.jpeg') }}" alt=""></div>
                                <div class="depan"><img src="{{ asset('img/brawl stars.webp') }}" alt=""></div>
                                <div><img src="{{ asset('img/cr.jpeg') }}" alt=""></div>
                            </div>
                            <div class="teks-kategori">
                                <h2>MOBILE GAMES</h2>
                            </div>
                        </a>
                    </div>
                    <div class="kategori-card swiper-slide">
                        <a href="{{ route('game.pc') }}">
                            <div class="foto-kategori">
                                <div><img src="{{ asset('img/pubg.jpg') }}" alt=""></div>
                                <div class="depan"><img src="{{ asset('img/fortnite.jpg') }}" alt=""></div>
                                <div><img src="{{ asset('img/point blank.jpeg') }}" alt=""></div>
                            </div>
                            <div class="teks-kategori">
                                <h2>PC GAMES</h2>
                            </div>
                        </a>
                    </div>
                    <div class="kategori-card swiper-slide">
                        <a href="{{ route('game.vouchers') }}">
                            <div class="foto-kategori">
                                <div><img src="{{ asset('img/netflix.png') }}" alt=""></div>
                                <div class="depan"><img src="{{ asset('img/apex.jpeg') }}" alt=""></div>
                                <div><img src="{{ asset('img/vidio.jpg') }}" alt=""></div>
                            </div>
                            <div class="teks-kategori">
                                <h2>VOUCHERS</h2>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic content based on category -->
    <div class="container">
        <div class="heading">
            <p style="color: white;">Mobile Games</p>
        </div>
    <div class="new-content ">
        
        @foreach ($games as $allGame)
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

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('#swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 20,
        });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

<!-- Include footer using Laravel Blade -->
@include('user.footer')

</html>
