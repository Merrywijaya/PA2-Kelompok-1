<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Ask online Form">
    <meta name="description" content="The Ask is a bootstrap design help desk, support forum website template coded and designed with bootstrap Design, Bootstrap, HTML5 and CSS. Ask ideal for wiki sites, knowledge base sites, support forum sites">
    <meta name="keywords" content="HTML, CSS, JavaScript,Bootstrap,js,Forum,webstagram ,webdesign ,website ,web ,webdesigner ,webdevelopment">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <title>Pertanyaan</title>
    <link href="{{ asset('css/bootstrap.cs') }}s" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/popupcss.css') }}">
    <script src="{{ asset('script.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylelogin2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylepertanyaan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">


    </head>

<body>
@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="colomTombol2">
            <div class="gambar">
            <img src="{{ asset('image/maskot-bebras-ulos.png') }}" src="{{ asset('image/bebras_ind_red.png') }}" width="52px" height="69px"><img src="{{ asset('image/bebras_ind_red.png') }}" width="300px" height="69px"></div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="/qna">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/ask">Bertanya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" >halo! {{Auth::user()->nama}}</a>
                    </li>
                </ul>
    </nav>
@elseif(Auth::user()->role_id == 4)
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="colomTombol2">
        <div class="gambar">
            <img src="{{ asset('image/maskot-bebras-ulos.png') }}" src="{{ asset('image/bebras_ind_red.png') }}" width="52px" height="69px"><img src="{{ asset('image/bebras_ind_red.png') }}" width="300px" height="69px"></div>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="/admin">Pengaturan User<span class="sr-only">(current)</span></a>
        </li>
    <li class="nav-item active">
    <a class="nav-link" href="/qna">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/ask">Bertanya</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">profil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">keluar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" >halo! {{Auth::user()->nama}}</a>
    </li>
</ul>
</div>
</nav>

@elseif(Auth::user()->role_id == 3)
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="colomTombol2">
        <div class="gambar">
            <img src="{{ asset('image/maskot-bebras-ulos.png') }}" src="{{ asset('image/bebras_ind_red.png') }}" width="52px" height="69px"><img src="{{ asset('image/bebras_ind_red.png') }}" width="300px" height="69px"></div>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="/superuser">Pengaturan User<span class="sr-only">(current)</span></a>
        </li>
    <li class="nav-item active">
    <a class="nav-link" href="/qna">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="/ask">Bertanya</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">profil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">keluar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" >halo! {{Auth::user()->nama}}</a>
    </li>
</ul>
</div>
</nav>
@endif

        <body className='snippet-body'>
            <div class="row justify-content-center">
            <div class="question">
                <h4 class="pertanyaan p1">Apa yang mau anda tanyakan?</h1>
                    <div class="kotak">
                    <p class="p1">Petunjuk!</p>
                    <ul class="p1">
                        <li>Pastikan pertanyaan anda belum pernah diajukan sebelumnya</li>
                        <li>Pastikan pertanyaan anda singkat,padat dan jelas</li>
                        <li>Periksa kembali tata bahasa dan ejaan yang ada</li>
                    </ul>
                </div>
            </div>
            </div>
            <div class="row justify-content-center">
                <form action="/ask" method='post'>
                    @csrf
                    <div class="col-md-12">
                        <br>
                        <h3>Leave A Reply</h3>
                        <hr>
                        <div class="post9320-box">
                            <input type="hidden" class="form-control text-gray-900" name="teks" id="x">
                            <trix-editor input="x" placeholder="isi disini"></trix-editor >
                            <br>
                            <button class="btn btn-primary tambahkan pertanyaan-button" type="submit">Kirim</button>
                            <a href="/qna" class="button btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form> 
        </div> 
        <br>
        <br>
        <section class="footer-part">
            <footer class="bg-light text-center text-lg-start">
                <!-- Grid container -->
                <div class="container p-4">
                  <!--Grid row-->
                  <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                      <h5 class="text-uppercase">Kontak</h5>
                        <p>E-mail  : mail@bebras.or.id</p>
                        <p>URL      : http://bebras.or.id</p>
                        <p>Situs web Bebras.or.id ini merupakan situs web resmi Bebras Indonesia.</p>
                      </p>
                    </div>
                    <!--Grid column-->
              
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                      <h5 class="text-uppercase">Footer text</h5>
                      <p>
                        Contacts: mail@bebras.org
                        <p>Bebras Ambassador</p>
                        Prof. Valentina Dagienė
                        Vilnius University
                        Akademijos str. 4
                        08663 Vilnius
                        Lithuania
    
                    Phone: +370 698 05448
                    If you have comments regarding this website, please contact info@bebras.lt
                      </p>
                    </div>
                  </div>
                </div>
              </footer>
        </section>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>



    
    
    
</body>

</html>
