<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="{{ asset('user/all.min.css') }}" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('user/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('user/css/main.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Dashboard Admin</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="card-header">
                                <h4 class="card-title" align="center"><b>Data Produk</b>
                                    <a href="{{ url('/' )}}" class="btn btn-secondary float-end">Kembali</a>
                                </h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4" style="display:block; padding:10px;">
                                    <img src="{{ asset($produk->gambar_produk) }}" class="img-fluid rounded">
                                    <div class="d-grid gap-2 mt-1">
                                        <P>Klik To Order : </P>
                                        @if( is_null($produk->unitproduksi->marketplace))
                                        <a href="http://Wa.me/{{$produk->unitproduksi->no_wa}}?text=Halo....%0AApakah produk%20{{$produk->nama_produk}}%20masih tersedia?" target="_blank" class="btn btn-success btn-sm">
                                            <h5><b>WhatsApp</b></h5>
                                        </a>
                                        @else
                                        <a href="{{$produk->unitproduksi->link_marketplace}}" target="_blank" class="btn btn-warning btn-sm">
                                            <h5><b>{{$produk->unitproduksi->marketplace}}</b></h5>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-8 mb-3">
                                                    <label>Nama Produk :</label>
                                                    <div><b>{{ $produk->nama_produk }}</b></div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Brand Produk :</label>
                                                    <div><b>{{ $produk->unitproduksi->nama_up }}</b></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 mb-3">
                                                    <label>Harga Produk :</label>
                                                    <div><b>Rp. @money($produk->harga_produk)</b></div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label>Kategori Produk :</label>
                                                    <div><b>{{ $produk->kategori_produk }}</b></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 mb-3">
                                                    <label>Status Produk :</label>
                                                    <div><b>{{ $produk->status_produk }}</b></div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @if ($produk->status_produk === "Ready")
                                                    <label>Stok Produk :</label>
                                                    <div><b>{{ $produk->stok_produk }}</b></div>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label>Detail Produk :</label>
                                                <hr>
                                                <div>{!!$produk->detail_produk!!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('detail_produk');
            </script>
        </div>
</body>

</html>