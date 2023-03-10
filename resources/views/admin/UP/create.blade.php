@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="row" style="margin-top: 10px">
                        <h4 class="card-title" align="center"><b>Tambah Data Unit Produksi</b></h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ url('unitproduksi') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Kejuruan</label>
                                            <input type="text" value="{{ old('kejuruan') }}" name="kejuruan" class="form-control @error('kejuruan') is-invalid @enderror" placeholder="kejuruan">
                                            @error('kejuruan')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Brand</label>
                                            <input type="text" value="{{ old('nama_up') }}" name="nama_up" class="form-control @error('nama_up') is-invalid @enderror" placeholder="Nama Brand">
                                            @error('nama_up')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Penanggung Jawab</label>
                                            <input type="text" value="{{ old('penanggung_jawab') }}" name="penanggung_jawab" class="form-control @error('penanggung_jawab') is-invalid @enderror" placeholder="Penanggung Jawab">
                                            @error('penanggung_jawab')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>No. WhatsApp</label>
                                            <input type="text" value="{{ old('no_wa') }}" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" placeholder="62######">
                                            @error('no_wa')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Marketplace</label>
                                            <input type="text" value="{{ old('marketplace') }}" name="marketplace" class="form-control @error('marketplace') is-invalid @enderror" placeholder="Marketplace">
                                            @error('marketplace')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Link Toko</label>
                                            <input type="text" value="{{ old('link_marketplace') }}" name="link_marketplace" class="form-control @error('link_marketplace') is-invalid @enderror" placeholder="Link Toko di Marketplace">
                                            @error('link_marketplace')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ url('unitproduksi') }}" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection