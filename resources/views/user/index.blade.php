@extends('user.layouts.app')

@section('content')
<!-- header -->
<header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top: 104px;">
    <div class="container h-60 d-flex align-items-center carousel-inner">
        <div class="text-center carousel-item active">
            <h2 class="text-capitalize text-white">best collection</h2>
            <h1 class="text-uppercase py-2 fw-bold text-white">from santri</h1>
            <a href="#produk" class="btn mt-2 text-uppercase">shop now</a>
        </div>
        <div class="text-center carousel-item">
            <h2 class="text-capitalize text-white">best price & offer</h2>
            <h1 class="text-uppercase py-2 fw-bold text-white">new season</h1>
            <a href="#produk" class="btn mt-2 text-uppercase">buy now</a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</header>
<!-- end of header -->

<!-- Produk -->
<section id="produk" class="py-5">
    <div class="container">
        <div class="title text-center">
            <h2 class="position-relative d-inline-block">Produk</h2>
        </div>

        <div class="row g-0">
            <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                <button type="button" class="btn m-2 text-dark active-filter-btn" data-filter="*">All</button>
                @foreach ($up as $brand)
                <button type="button" class="btn m-2 text-dark" data-filter=".{{$brand->id}}">{{$brand->nama_up}}</button>
                @endforeach
            </div>

            <div class="collection-list mt-4 row gx-0 gy-3">
                @foreach ($prod as $produk)
                <div class="col-md-6 col-lg-4 col-xl-3 p-2 {{ $produk->up_id }}">
                    <div class="special-img position-relative overflow-hidden rounded">
                        <img src="{{$produk->gambar_produk}}" class="w-100">
                    </div>
                    <div>
                        <p class="text-capitalize my-1">{{$produk->nama_produk}}</p>
                        <span class="fw-bold">Rp. @money($produk->harga_produk)</span>
                    </div>
                    <div class="mt-2">
                        <p><i>{{$produk->kategori_produk}}</i>
                            <a href="{{ url('produk-detail', $produk->id) }}" class="btn btn-primary btn-sm float-end" style="font-size: small; padding: 9px">Detail</a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end of collection -->

<!-- about -->
<section id="about" class="py-5">
    <div class="container">
        <div class="row gy-lg-5 align-items-center">
            <div class="col-lg-6 order-lg-0">
                <div class="title pb-1">
                    <h2 class="position-relative d-inline-block ms-4">About Us</h2>
                </div>
                <img src="{{ asset('user/images/about.jpg') }}" alt="" class="img-fluid">
                <div class="d-grid gap-2 mt-2">
                    <a href="https://smkroudlotulmubtadiin.sch.id/" target="_blank" class="btn btn-primary" type="button">ayo... gabung bersama kami</a>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                <p></p>
                <p class="justify">SMK Roudlotul Mubtadiin adalah lembaga pendidikan kejuruan yang berada dibawah naungan Yayasan Pondok Pesantren Roudlotul Mubtadiin Balekambang Jepara, yang berdiri pada 14 November 2006.</p>
                <p class="justify">Memiliki 6 Program Keahlian yaitu Teknik Elektronika, Tata Busana, Teknik Otomotif, Teknik Jaringan Komputer dan Telekomunikasi, Tata Boga dan Animasi.</p>
                <p class="justify">SMK Balekambang merupakan sekolah kejuruan yang berbasis pondok pesantren, namun santri/siswa di SMK Balekambang diharapkan mampu dalam bidang keagamaan dan juga mampu dalam mengikuti perkembangan teknologi. Jargon #yoNGAJI#yoTEKNOLOGI merupakan salah satu upaya dalam menciptakan keselarasan tujuan pendidikan di SMK Balekambang.</p>
            </div>
        </div>
    </div>
</section>
<!-- end of about us -->

        <div class="title text-center mb-2">
            <h2 class="position-relative d-inline-block">Cara Pemesanan</h2>
        </div>
<!-- cara pemesanan -->
<section id="carapemesanan" class="py-5 mb-2">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
            <div class="offers-content">
            </div>
        </div>
    </div>
</section>
<!-- end of blogs -->

<!-- footer -->
<footer class="bg-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" style="color: white;">
                <p>Copyright © 2023 <a href="https://www.instagram.com/aey_creative" target="_blank">AEY</a> Creative. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer -->
@endsection