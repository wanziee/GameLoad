<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admincss/adminLayout.css')}}">
    <link rel="stylesheet" href="{{asset('admincss/Dashboard.css')}}">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
    display: flex;
    background-color: rgb(0, 0, 0);
    margin: 0;
}
    </style>
   
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="title">GameLoad</h4>
        <p class="navigation">Navigation</p>
        <a href="{{route('show.adminDashboard')}}" class="{{ request()->routeIs('show.adminDashboard') ? 'active' : '' }}"><i class=' box-sidebar bx bxs-dashboard'></i>Dashboard</a>
        <a href="{{route('show.adminUsers')}}" class="{{ request()->routeIs('show.adminUsers') ? 'active' : '' }}"><i class=' box-sidebar bx bxs-user-account'></i>Users</a>
        <a href="{{route('show.adminTransaksi')}}" class="{{ request()->routeIs('show.adminTransaksi') ? 'active' : '' }}"><i class=' box-sidebar bx bxs-message-square-dots'></i>Transaksi</a>
        <a href="{{route('show.adminAllGames')}}" class="{{ request()->routeIs('show.adminAllGames') ? 'active' : '' }}"><i class=' box-sidebar bx bxs-game'></i>Games</a>
        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-link ">
                <i class=' box-sidebar bx bx-log-out'></i> Logout
            </button>
        </form>
        
        
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center">
                <span class="hamburger" id="hamburger">&#9776;</span>

                <div>
                    <a href="#" class="text-light me-3">Profile</a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link ">Logout</button>
                    </form>
                    
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       const hamburger = document.getElementById('hamburger');
const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('.content');
const sidebarLinks = document.querySelectorAll('.sidebar a');

// Fungsi untuk mengecek lebar layar dan menutup sidebar jika lebar < 1079px
function checkScreenWidth() {
    if (window.innerWidth <= 1079) {
        sidebar.classList.add('hidden');
        content.classList.add('full-width');
    } else {
        sidebar.classList.remove('hidden');
        content.classList.remove('full-width');
    }
}

// Panggil fungsi saat halaman dimuat
checkScreenWidth();

// Tambahkan event listener saat ukuran layar berubah
window.addEventListener('resize', checkScreenWidth);

// JavaScript untuk toggle sidebar saat hamburger menu diklik
hamburger.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
    content.classList.toggle('full-width');
});

// Menambahkan class aktif pada link sidebar
sidebarLinks.forEach(link => {
    link.addEventListener('click', function() {
        sidebarLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
    });
});

    </script>
</body>

</html>
