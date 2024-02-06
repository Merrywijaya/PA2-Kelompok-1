<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/stylelogin4.css') }}">


</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <img src="{{ asset('image/bebras.png') }}" width="500px" height="200px">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('loginError'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="login-wrap p-4 p-md-5">
                        <center><img src="{{ asset('image/maskot_Bebras.png') }}" width="52px" height="69px">
                        </center>
                        <h3 class="text-center mb-4 colorlogin">Masuk ke dalam Akun</h3>
                        <form action="/login" method="post" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="nama_pengguna" class="form-control rounded-left"
                                    id="nama_pengguna" placeholder="Nama Pengguna" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left" id="password"
                                    placeholder="Kata Sandi" required>
                            </div>
                            <br>
                            <div class="container2">
                                <a href="/register" class="btn btn-primary">Register</a>
                                <h6>atau</h6>
                                <div class="colomTombol2">
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </div>
                            <center><a size="3" class="text-center mb-4"><a href="/lupapassword">Lupa Kata Sandi ?</a></a></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
