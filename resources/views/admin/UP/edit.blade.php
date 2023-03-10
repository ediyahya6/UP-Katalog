@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="text-center"><b>Edit Data Unit Produksi</b></h4>
                    </div>
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ url('unitproduksi', $up->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Kejuruan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" value="{{$up->kejuruan}}" name="kejuruan" class="form-control @error('kejuruan') is-invalid @enderror" placeholder="{{$up->kejuruan}}">
                                                @error('kejuruan')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Nama Brand</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" value="{{$up->nama_up}}" name="nama_up" class="form-control @error('nama_up') is-invalid @enderror" placeholder="{{$up->nama_up}}">
                                                @error('nama_up')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Penanggung Jawab</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" value="{{$up->penanggung_jawab}}" name="penanggung_jawab" class="form-control @error('penanggung_jawab') is-invalid @enderror" placeholder="{{$up->penanggung_jawab}}">
                                                @error('penanggung_jawab')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>No. WhatsApp</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" value="{{$up->no_wa}}" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" placeholder="{{$up->no_wa}}">
                                                @error('no_wa')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Marketplace</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" value="{{$up->marketplace}}" name="marketplace" class="form-control @error('marketplace') is-invalid @enderror" placeholder="{{$up->marketplace}}">
                                                @error('marketplace')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>Link Toko</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" value="{{$up->link_marketplace}}" name="link_marketplace" class="form-control @error('link_marketplace') is-invalid @enderror" placeholder="{{$up->link_marketplace}}">
                                                @error('link_marketplace')<div class="invalid-feedback">{{$message}}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ url('unitproduksi' )}}" class="btn btn-secondary">Batal</a>
                                            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                        </div>
                                    </form>
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