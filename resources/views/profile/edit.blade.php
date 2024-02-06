<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/footer.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">

<style type="text/css">
        body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-link{
    color: #ffffff;
}

.nav-borders .nav-link.active {
    color: #ffffff;
    border-bottom-color: #ffffff;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    /* margin-left: 1rem; */
    margin-right: 3rem;
}

.navbar{
    margin-top: -30px;
}

.locationnavbar {
display: flex;
justify-content: flex-start;
}

    </style>



    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="gambar">
    <img src="{{ asset('image/maskot-bebras-ulos.png') }}" width="52px" height="69px">
    <img src="{{ asset('image/bebras_ind_red.png') }}" width="300px" height="69px">
</div>
        <ul class="nav locationnavbar navbar-left">
        <li class="nav-item">
            <a class="nav-link" href="/qna">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ask">Pertanyaan</a>
        </li>
        </ul>
        <ul class="nav locationnavbar navbar-right">
        <li class="nav-item">
            <a class="nav-link" href="/logout">Keluar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Halo! {{ Auth::user()->nama }}</a>
        </li>
        </ul>
    </nav>


</head>

<body>


<hr class="mt-0 mb-4">
<div class="row">
<div class="col-xl-4">

<div class="card mb-4 mb-xl-0">
<div class="card-header"><h4>Petunjuk</h4></div>
<div class="card-body text-left">

    <p>1. Lengkapi data diri Anda</p>
    <p>2. Isi dahulu Provinsi -> Kabupaten -> Kecamatan</p>
    <p>3. Simpanlah recovery token Anda agar saat lupa password atau ingin mengganti password, Anda dapat menggunakan recovery token tersebut.</p>
    <p>4. recovery token akan selalu berubah setiap kali berganti password</p>
</div>
</div>
</div>
<div class="col-xl-8">

<div class="card mb-4">
<div class="card-header">Account Details</div>
<div class="card-body">

    <form action="/profile/update/{{$user->id}}" method="POST">
        @csrf
<div class="mb-3">
<label class="small mb-1" for="inputUsername">nama</label>
<input class="form-control" id="inputUsername" name="nama" type="text"  value="{{Auth::user()->nama}}">
</div>

<div class="mb-3">
    <label class="small mb-1" for="inputUsername">alamat</label>
    <input class="form-control" id="inputUsername" name="alamat" type="text"  value="{{Auth::user()->alamat}}">
    </div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputOrgName">sekolah</label>
<select class="form-control" id="searchsekolah" name="id_r_sekolah">
    <option value="">Pilih sekolah</option>
    @foreach ($sekolah as $s)
        <option value="{{ $s->id }}" {{ $user->id_r_sekolah == $s->id ? 'selected' : '' }}>{{ $s->Nama }}</option>
    @endforeach
</select>
</div>

<div class="col-md-6">
    <label class="small mb-1" for="inputLocation">Provinsi</label>
    <select class="form-control" id="inputLocation" name="id_r_provinsi">
        <option value="">Pilih Provinsi</option>
        @foreach($provinsi as $item)
            <option value="{{ $item->id }}" {{ $user->id_r_provinsi == $item->id ? 'selected' : '' }}>
                {{ $item->nama }}
            </option>
        @endforeach
    </select>
</div>


<div class="row gx-3 mb-3">

    <div class="col-md-6">
        <label class="small mb-1" for="inputLocation">Kabupaten</label>
        <select class="form-control" id="inputLocation" name="id_r_kabupaten">
            <option value="">Pilih Kabupaten</option>
            @foreach($kabupaten as $item)
                <option value="{{ $item->id }}" {{ $user->id_r_kabupaten == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    
    
    <div class="col-md-6">
        <label class="small mb-1" for="inputLocation">Kecamatan</label>
        <select class="form-control" id="inputLocation" name="id_r_kecamatan">
            <option value="">Pilih Kecamatan</option>
            @foreach($kecamatan as $item)
                <option value="{{ $item->id }}" {{ $user->id_r_kecamatan == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    </div>

<div class="mb-3">
<label class="small mb-1" for="inputEmailAddress">Email</label>
<input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address" value="{{Auth::user()->email}}">
</div>

<div class="row gx-3 mb-3">

<div class="col-md-6">
<label class="small mb-1" for="inputPhone">Nomor whatsapp</label>
<input class="form-control" id="inputPhone" name="no_whatsapp" type="tel" placeholder="Enter your phone number" value="{{Auth::user()->no_whatsapp}}">
</div>

<div class="col-md-6">
    <label class="small mb-1" for="recovery_token">Recovery Token</label>
    <input class="form-control" id="inputtoken" name="recovery_token" type="text" value="{{Auth::user()->recovery_token}}" readonly>
    </div>



</div>

<button class="btn btn-primary" type="submit">Save changes</button>
</form>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    
</script>
<section class="footer-part">
    <footer class="bg-light text-center">
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
</body>

</html>