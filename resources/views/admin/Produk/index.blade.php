@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Data Produk
                        <a href="{{ url('produk/create' )}}" class="btn btn-primary float-end">Tambah Data</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="Prod" class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th width="20%">Gambar</th>
                                <th width="25%">Nama Produk</th>
                                <th width="10%">Kategori</th>
                                <th width="10%">Harga</th>
                                <th width="10%">Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                            <tr>
                                <td><img src="{{$item->gambar_produk}}" width="100%" class="img-fluid rounded"></td>
                                <td>{{$item->nama_produk}}</td>
                                <td>{{$item->kategori_produk}}</td>
                                <td>Rp. @money($item->harga_produk)</td>
                                <td>{{$item->status_produk}}</td>
                                <td align="center">
                                    <form action="{{ url('produk/delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ url('produk/detail', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                        <a href="{{ url('produk/edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm float-end">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        $('#Prod').DataTable();
    });
</script>
@endpush


@endsection