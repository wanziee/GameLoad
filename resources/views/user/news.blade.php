<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/soonFeature.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    @include('user.navbar')

    <div class="container info-box">
        <div class="info">
            <h1>NEWS</h1>
            <H4>this feature will be launch soon</H4>
            <P>Website top-up game kami segera hadir untuk memudahkan kamu mengisi saldo dan membeli item favorit dengan cepat, aman, dan praktis. Dukung berbagai game populer dan metode pembayaran, semuanya dalam satu platform! This feature will be launched soon.</P>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>