<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('sb-admin') }}/css/login.css">
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="{{ asset('sb-admin') }}/img/beranda-bg.jpg" alt="login">
        </div>
        <div class="form-container">

            @if (Session::get('error'))
                <div class="alert bg-warning">
                    {{ Session::get('error') }}
                </div>
            @endif

            <h1>SELAMAT DATANG !</h1>
            <form action="{{ route('credentials') }}" method="post">
                @csrf
                <label for="username">username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">password</label>
                <input type="password" id="password" name="password" required>
                <div class="button-container">
                    {{-- <a href="reset_password.php">Forgot Password?</a> --}}
                    <button style="width:100px; height:50px; background-color: #A1952E; float: right;"
                        type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
