<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/lupapasswordstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylelogin2.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stylelogin2.css') }}">
<body>
  <section class="ftco-section">
    <div class="container">
    </div>
  
      
  <div class="wrapper">
    <center><img src="{{ asset('image/maskot_Bebras.png') }}" width="52px" height="69px">
    <h3>Lupa Password</h3></center>
    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <div class="input-box">
        <input id="nama_pengguna" type="text" name="nama_pengguna"  placeholder="nama pengguna" required autofocus>
        @error('nama_pengguna')
            <span role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-box">
        <input id="recovery_token" type="text" name="recovery_token" placeholder="recovery token" required>
        @error('recovery_token')
            <span role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-box">
        <input id="password" type="text" name="password" placeholder="password" required>
        @error('password')
            <span role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-box">
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="password confirmation" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Reset Password">
      </div>
      <center><atau size="10" class="text-center mb-4">atau</a></center>
      <center><a size="10" class="text-center mb-4"><a href="/login">login</a></a></center>
    </form>
  </div>
    </div>
</section>

</body>
</html>
