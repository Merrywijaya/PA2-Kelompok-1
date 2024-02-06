<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stylelogin2.css') }}">

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <img src="{{ asset('image/maskot-bebras-ulos.png') }}" width="52px" height="69px"><img
        src="{{ asset('image/bebras_ind_red.png') }}" width="300px" height="69px">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/login">login</a>
            </li>
        </ul>
</nav>

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
                    <div class="login-wrap p-4 p-md-5">
                        <form action="/register" method="post" class="login-form" id="register-form">
                            @csrf
                            <center><img src="{{ asset('image/maskot_Bebras.png') }}" width="52px" height="69px">
                            </center>
                            <h3 class="text-center mb-4">Masuk ke dalam Akun</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control rounded-left" id="nama"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="text" name="no_whatsapp" class="form-control rounded-left"
                                    id="no_whatsapp" placeholder="nomor telepone" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="text" name="nama_pengguna" class="form-control rounded-left"
                                    id="nama_pengguna" placeholder="Nama Pengguna" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="text" name="email" class="form-control rounded-left" id="email"
                                    placeholder="Email Pengguna" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="text" name="alamat" class="form-control rounded-left" id="alamat"
                                    placeholder="Alamat Pengguna" required>
                            </div>
                            {{-- <div class="form-group d-flex">
                    <select class="form-control" name="role_id" >
                        @foreach ($role as $r)
                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                        @endforeach
                    </select>
                </div> --}}
                            <div class="form-group">
                                <input type="password" name="password" class="form-control rounded-left" id="password"
                                    placeholder="Kata Sandi" required>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/register/otp" method="post" id="otp-form">
                    <div class="modal-header">
                        <h5 class="modal-title">Verifikasi OTP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Masukkan Kode OTP</label>
                        <input type="text" name="otp" class="form-control rounded-left" id="otp"
                            placeholder="Kode OTP" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                        <button type="submit" class="btn btn-primary">verifikasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script src="js/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const registerForm = $("#register-form");
        registerForm.submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/register') }}",
                data: registerForm.serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.status == 'error') {
                        $("#save_errorList").html("");
                        $("#save_errorList").addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_value) {
                            $("#save_errorList").append("<li>" + err_value + "</li>");
                        });
                    } else {
                        $("#save_errorList").html("");
                        $("#save_errorList").removeClass("alert alert-danger");
                        $("#exampleModal").modal('show');
                        alert('Data Saved');
                    }
                }
            });
        });


        const otpForm = $("#otp-form");
        otpForm.submit(function(e) {
            e.preventDefault();
            var data = new FormData(otpForm[0]);
            // append data from register form
            data.append('nama', $("#nama").val());
            data.append('no_whatsapp', $("#no_whatsapp").val());
            data.append('nama_pengguna', $("#nama_pengguna").val());
            data.append('email', $("#email").val());
            data.append('alamat', $("#alamat").val());
            data.append('password', $("#password").val());
            $.ajax({
                type: "POST",
                url: "{{ url('/register/otp') }}",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 'error') {
                        $("#save_errorList").html("");
                        $("#save_errorList").addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_value) {
                            $("#save_errorList").append("<li>" + err_value + "</li>");
                        });
                    } else {
                        $("#save_errorList").html("");
                        $("#save_errorList").removeClass("alert alert-danger");
                        $("#exampleModal").modal('hide');
                        window.location.href = "{{ url('/login') }}";
                    }
                }
            });
        });
    </script>
</body>

</html>
