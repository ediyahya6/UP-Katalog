@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="card-header">
                        <h4 class="card-title" align="center"><b>Data Produk</b>
                        <a href="{{ url('produk' )}}" class="btn btn-secondary float-end">Kembali</a>
                        </h4>
                    </div>
                    <hr>
                    <div class="row">
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
                        <div class="col-md-4" style="display:block; padding:10px;">
                            <img src="{{ asset($produk->gambar_produk) }}" class="img-fluid rounded">
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
    @endsection