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
    <title> Home </title>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/popupcss.css') }}">
    <script src="{{ asset('script.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/stylelogin1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">

<body>
@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="colomTombol2">
            <div>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="colomTombol2">
        <div>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="colomTombol2">
        <div>
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
    
    <br>
    <!--======= welcome section on top background=====-->
    <div>
        <section class="welcome-part-one">
            <div class="container">
                <img src="{{ asset('image/maskot_Bebras.png') }}" class ="image-bebras" width="33px" height="49px">
                <div class="welcome-demop102">
                    <center><h2>Selamat datang di Halaman Forum Pertanyaan!</h2>
                    <h2>Di sini, Anda bisa mengajukan pertanyaan dan mendapatkan serta memberikan jawaban
                        <br>yang relevan sesuai dengan pertanyaan di forum ini.</h2></center>
                </div>
            </div>
        </section>
        </div>
    
    
    <!-- ======content section/body=====-->
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <br>
                    @foreach ($asks as $ask)
                    <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                @if ($ask->jawaban->isNotEmpty())
                    <a><img src="{{ asset('image/maskot_Bebras.png') }}" class ="image-bebras" width="15px" height="19px"></a>
                    <a></a><i class="fa fa-check" aria-hidden="true"></i></a>
                @else
                <img src="{{ asset('image/maskot_Bebras.png') }}" class ="image-bebras" width="15px" height="19px">
                @endif </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3><a href="/qna/{{ $ask->id }}">Pertanyaan</a></h3> </div>
                                <div class="ques-details10018">
                                    <h4>{!! $ask->teks !!}</h4>
                                </div>
                                <hr>
                                <div class="ques-icon-info3293"> 
                                    <div class="ques-icon-info3293">
                                    <a></a><i class="fa fa-user" aria-hidden="true"> {{ $ask->user->nama }} </i></a>
                                    <a></a><i class="fa fa-commenting commenting2" aria-hidden="true">{{ $ask->jawaban_count }} jawaban</i></a>
                                    @auth
                                @if ($ask->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3)
                                <form action="/qna12/{{ $ask->id }}" method="post" class="delete-comment-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger delete-comment-button" type="submit">Hapus</button>
                                </form>
                                @endif
                                @endauth
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <aside class="col-md-3 sidebar97239">
                <div class="status-part3821">
                    <h3>stats</h3> <a><i class="fa fa-question-circle" aria-hidden="true"> Pertanyaan({{$total_pertanyaan}})</i></a> <i class="fa fa-comment" aria-hidden="true"> Jawaban({{$total_jawaban}})</i> </div>
                <!--             social part -->
            </aside>
        </div>
        </div>
    </section>

    <div class="pagination-links">
    <h4>
        {{ $asks->links() }}
    </h4>
    </div>
    </section>
    <!--    footer -->

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
                  <h5 class="text-uppercase">Kontak</h5>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
</body>

</html>