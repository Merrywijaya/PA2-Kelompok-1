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
    <title> Pertanyaan </title>
    <link href="{{ asset('css/bootstrap.cs') }}s" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/popupcss.css') }}">
    <script src="{{ asset('script.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylelogin1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">


    </head>

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
        <section class="main-content920">
            <div class="container ">
                <div class="row2 ">
                    <div class="col-md-9">
                        <div class="post-details">
                            <div class="details-header923">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="post-title-left1293">
                                            <h2>Pertanyaan</h2> </div>
                                    </div>
                            </div>
                            <div class="post-details-info1982">
                                <h3>{!! $ask->teks !!}</h3>
                                <hr>
                                <div class="post-footer29032">
                                    <div class="post-footer29032">
                                        <div class="left-user12923 left-user12923-repeat">
                                            @if ($ask->jawaban->isNotEmpty())
                                            <div class="l-side2023"> <i class="fa ukuran fa-check2 check2" aria-hidden="true"> Terjawab</i> <i class="fa fa-user" aria-hidden="true"> {{ $ask->user->nama }} </i><a href="#"><i class="fa fa-commenting commenting2" aria-hidden="true"> {{ $comment_count }}</i></a> </div>
                                            @else
                                            <div class="l-side2023"> <i class="fa fa-check3 check3" aria-hidden="true"> Belum Terjawab</i><i class="fa fa-user" aria-hidden="true"> {{ $ask->user->nama }} </i><a href="#"><i class="fa fa-commenting commenting2" aria-hidden="true"> {{ $comment_count }}</i></a> </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-details-info1982">
                            <div class="post-details-info1982">
                                    @if ($ask->jawaban->count() === 0)
                                        <div>
                                            <p class="arah">Tidak ada jawaban untuk pertanyaan ini.</p>
                                        </div>
                                    @else
                                        @php
                                            $pinnedJawaban = $ask->jawaban->where('pinned', true);
                                            $otherJawaban = $ask->jawaban->where('pinned', false);
                                        @endphp
                                        <br>
                                        @foreach ($pinnedJawaban->concat($otherJawaban) as $jawaban)
                                            <div class="comment-main-level">
                                                <div class="comment-box">
                                                    <div class="comment-box">
                                                        <div class="comment-head mt-3">
                                                            <ul style="list-style-type: none;">
                                                                <li><h4>Nama: {{ strip_tags($jawaban->user->nama) }}({{ $roleNames[$jawaban->user->role_id] }})</h4></li>
                                                                <li><h4>Jawaban: </h4></li>
                                                                <li style="word-wrap: break-word;"><h4>{!!$jawaban->teks!!}</h4></li>
                                                            </ul>
                                                        @foreach ($jawaban->komentar->sortByDesc('pinned') as $comment)
                                                        <div class="comment-content">
                                                            <hr>
                                                            <div class="comment-content-3" style="word-wrap: break-word;"><h5>{!!$comment->teks!!} - {{ $comment->user->nama }}({{ $roleNames[$comment->user->role_id] }})</h5> </div>
                                                        <div class="colomTombol">
                                                            @auth
                                                                @if ($comment->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3)
                                                                <form action="/qna9/{{ $comment->id }}" method="POST" class="delete-comment-form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger delete-comment-button" type="submit">Hapus</button>
                                                                </form>
                                                                
                                                                @endif
                                                            @endauth
                                                            @if ($comment->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3)
                                                            @if ($comment->pinned)
                                                                <form action="/qna6/{{ $comment->id }}" method="post">
                                                                    @csrf
                                                                    <button class="btn btn-warning" type="submit">Unpin</button>
                                                                </form>
                                                                @else
                                                                    <form action="/qna5/{{ $comment->id }}" method="post">
                                                                        @csrf
                                                                        <button class="btn btn-primary " type="submit">Pin</button>
                                                                    </form>
                                                                @endif
                                                                @endif
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                            <center>
                                            <div class="Tombol2">
                                            <div class="colomTombol3">
                                            <button class="btn btn-primary" id="openPopupButton{{ $jawaban->id }}">komentar</button>
                                            <div id="popupForm{{ $jawaban->id }}" class="popup">
                                                <div class="popup-content">
                                                    <span class="close">&times;</span>
                                                    <h3> komentar </h3>
                                                    <form action="/qna10/{{ $jawaban->id }}" method="post">
                                                        @csrf
                                                        <input type="text" class="comment-input219882" name="teks" placeholder="isi disini" required>
                                                        <button class="btn btn-primary" type="submit">kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                            @auth
                                            @if ($jawaban->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3)
                                            <form action="/qna11/{{ $jawaban->id }}" method="post" class="delete-comment-form">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger delete-comment-button" type="submit">Hapus</button>
                                            </form>
                                            @endif
                                            @endauth
                                        </div>
                                            @if ($jawaban->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3)
                                            @if ($jawaban->pinned)
                                                <form action="/qna4/{{ $jawaban->id }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-warning" type="submit">Unpin Jawaban</button>
                                                </form>
                                                @else
                                                    <form action="/qna3/{{ $jawaban->id }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-primary " type="submit">Pin Jawaban</button>
                                                    </form>
                                                @endif
                                                @endif
                                                <form action="/qna7/{{ $jawaban->id }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="jawaban_id" value="{{ $jawaban->id }}">
                                                    <button type="submit" class="btn btn-primary" name="vote" value="up"{{ $jawaban->user_vote === 'up' ? ' disabled' : '' }}>
                                                        Vote Up ({{ $jawaban->vote_up }})
                                                    </button>
                                                    <button type="submit" class="btn btn-danger delete-comment-button" name="vote" value="down"{{ $jawaban->user_vote === 'down' ? ' disabled' : '' }}>
                                                        Vote Down
                                                    </button>
                                                </form>
                                                
                                                    <br>
                                                    <br>
                                                </div>
                                            </center>
                                                <br>
                                                <br>              
                                            </div>
                                    
                                </div>
                                <br>
                                @endforeach
                                    @endif
                            <br>
                            
                        </div>
                        <br>
                        </div> 
                        </div>
                        <br>
                        <br>
                        <div class="comment289-box">
                            @auth
                            @if (in_array(Auth::user()->role_id, [2, 3, 4]))
                            <form action="/qna/{{ $ask->id }}" method="post">
                                @csrf
                                @method('post')
                                <div class="col-md-12">
                                    <br>
                                    <h3>Jawaban</h3>
                                    <hr>
                                    <div class="post9320-box">
                                        <input type="hidden" class="form-control text-gray-900" name="teks" id="x">
                                        <trix-editor input="x" placeholder="isi disini"></trix-editor>
                                        <br>
                                                <button type="submit" class="btn btn-primary location">Post Your Answer</button>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </form>
                            
                            <br> 
                            </div>
                    </div>
                    <br>      
        </section>
        <br>
    
    
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
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/npm.js') }}"></script>
        <script src="{{ asset('js/popup.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    
    
        <script>
            @foreach ($ask->jawaban as $jawaban)
                var openButton{{ $jawaban->id }} = document.getElementById('openPopupButton{{ $jawaban->id }}');
                if (openButton{{ $jawaban->id }}) {
                    openButton{{ $jawaban->id }}.addEventListener('click', function() {
                        openPopup({{ $jawaban->id }});
                    });
                }
                var closeButton{{ $jawaban->id }} = document.querySelector('#popupForm{{ $jawaban->id }} .close');
                if (closeButton{{ $jawaban->id }}) {
                    closeButton{{ $jawaban->id }}.addEventListener('click', function() {
                        closePopup({{ $jawaban->id }});
                    });
                }
            @endforeach
        
            function openPopup(id) {
                var popup = document.getElementById('popupForm' + id);
                if (popup) {
                    popup.style.display = 'block';
                }
            }
        
            function closePopup(id) {
                var popup = document.getElementById('popupForm' + id);
                if (popup) {
                    popup.style.display = 'none';
                }
            }
        
            document.addEventListener('DOMContentLoaded', function() {
                @foreach ($ask->jawaban as $jawaban)
                    var popupForm{{ $jawaban->id }} = document.getElementById('popupForm{{ $jawaban->id }}');
                    var cancelBtn{{ $jawaban->id }} = document.getElementById('cancelBtn{{ $jawaban->id }}');
        
                    if (cancelBtn{{ $jawaban->id }} && popupForm{{ $jawaban->id }}) {
                        cancelBtn{{ $jawaban->id }}.addEventListener('click', function() {
                            // Sembunyikan popup ketika tombol "Cancel" diklik
                            popupForm{{ $jawaban->id }}.style.display = 'none';
                        });
                    }
                @endforeach
            });
        </script>
    
    
        
        
        
    </body>

</html>