@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="row" style="margin-top: 10px">
                        <h4 class="card-title" align="center"><b>Edit Data Produk</b></h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ url('produk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-8 mb-3">
                                                <label>Nama Produk :</label>
                                                <input type="text" value="{{ $produk->nama_produk }}" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="{{$produk->nama_produk}}">
                                                @error('nama_produk')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Brand Produk :</label>
                                                <select name="up_id" class="form-control @error('up_id') is-invalid @enderror">
                                                    <option selected disabled value="">Pilih Brand</option>
                                                    @foreach ($up as $item)
                                                    <option value="{{ $item->id }}" {{ $produk->up_id ==  $item->id  ? 'selected' : '' }}>{{ $item->nama_up }}</option>
                                                    @endforeach
                                                </select>
                                                @error('up_id')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Harga Produk :</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Rp.</span>
                                                    <input type="text" value="@money($produk->harga_produk)" name="harga_produk" class="form-control @error('harga_produk') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="@money($produk->harga_produk)">
                                                    @error('harga_produk')<div class="invalid-feedback">{{$message}}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Kategori Produk :</label>
                                                <input type="text" value="{{ $produk->kategori_produk }}" name="kategori_produk" class="form-control @error('kategori_produk') is-invalid @enderror" placeholder="{{$produk->kategori_produk}}">
                                                @error('kategori_produk')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Status Produk :</label>
                                                <select name="status_produk" class="form-control" onchange="checkStatus();">
                                                    <option selected disabled value="">Status Produk</option>
                                                    <option value="Ready" {{ $produk->status_produk ==  'Ready'  ? 'selected' : '' }}>Ready</option>
                                                    <option value="Pre-Order" {{ $produk->status_produk ==  'Pre-Order'  ? 'selected' : '' }}>Pre-Order</option>
                                                    <option value="Sold out" {{ $produk->status_produk ==  'Sold out'  ? 'selected' : '' }}>Sold Out</option>
                                                </select>
                                                @error('status_produk')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                @if ($produk->status_produk === "Ready")
                                                <label>Stok Produk :</label>
                                                <input type="text" value="{{ $produk->stok_produk }}" name="stok_produk" class="form-control" placeholder="{{$produk->stok_produk}}">
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label>Gambar Produk :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" value="{{ $produk->gambar_produk }}" name="gambar_produk" class="form-control @error('gambar_produk') is-invalid @enderror" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                @error('gambar_produk')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label>Detail Produk :</label>
                                                <textarea value="{{ $produk->detail_produk }}" name="detail_produk" class="form-control @error('detail_produk') is-invalid @enderror" placeholder="Masukkan Detail Keterangan Produk">{{$produk->detail_produk}}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ url('produk' )}}" class="btn btn-secondary">Batal</a>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="display:block; padding:10px;">
                            <img src="{{ asset($produk->gambar_produk) }}" class="img-fluid rounded" alt="" id="output">
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