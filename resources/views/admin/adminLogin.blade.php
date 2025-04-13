<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('admincss/login.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>

    </style>
</head>
<body>

        
    <div class="login-container">
        <form class="login-form" action="{{route('admin.authenticate')}}" method="POST">
            @csrf
            <h1 class="Gameload" >GameLoad</h1>
            <h2>Welcome Back</h2>
            <p>Enter your credentials to access your admin acount</p>

     
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" id="username" name="username" placeholder="Enter your username" @error('username') is-invalid @enderror required>
                @error('username')
                <div class="indvalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    @if(session('loginError'))
    <div class="alert">
        {{ session('loginError') }}
    </div>
@endif
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> --}}


</body>
</html>