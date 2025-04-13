    <!-- navbar -->
    <header>
        <div class="nav container">
            <a href="{{route('home')}}" class="logo">Game<span>Load</span></a>
            <div class="nav-icons">
                <i class='bx bx-bell bx-tada' id="bell-icon"><span></span></i>
                <a href="{{ route('show_login')}}"><i class='bx bx-user'></i></a>   
                <div class="menu-icon">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </div>



            <!-- menu -->
            <div class="menu">
                <div class="logo-menu">
                    <h2>GameLoad</h2>
                </div>

                <div class="navbar">
                    <li><a href="{{ route('home')}}">Home</a></li>
                    <li><a href="{{ route('game.all')}}">Library</a></li>
                    <li><a href="{{ route('show_contact')}}">Contact</a></li>
                    <li><a href="{{ route('show_news')}}">News</a></li>
                    <li><a href="{{ route('invoice.show')}}">Cek Invoice</a></li>
                </div>

            </div>


            <!-- notification -->
            <div class="notification">
                <div class="notification-box">
                    <i class='bx bxs-check-circle'></i>
                    <p class="" style="color: white;">Congratulations, your top up has been successful</p>
                </div>
                <div class="notification-box">
                    <i class='bx bxs-check-circle'></i>
                    <p class="" style="color: white;">Congratulations, your top up has been successful</p>
                </div>
            </div>
        </div>
    </header>
