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
                    <h4>Data Unit Produksi
                        <a href="{{ url('unitproduksi/create' )}}" class="btn btn-primary float-end">Tambah Data</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="Up" class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>#</th>
                                <th width="20%">Kejuruan</th>
                                <th width="15%">Nama Brand</th>
                                <th width="25%">Penanggung Jawab</th>
                                <th width="10%">No. WA</th>
                                <th width="10%">Marketplace</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($up as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kejuruan}}</td>
                                <td>{{$item->nama_up}}</td>
                                <td>{{$item->penanggung_jawab}}</td>
                                <td>{{$item->no_wa}}</td>
                                <td>
                                    @if( is_null($item->marketplace))
                                    <p>-</p>
                                    @else
                                    <a href="{{$item->link_marketplace}}" terget="_blank" class="btn btn-warning btn-sm">{{$item->marketplace}}</a>
                                    @endif

                                </td>
                                <td align="center">
                                    <form action="{{ url('unitproduksi/delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ url('unitproduksi/edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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
        $('#Up').DataTable();
    });
</script>
@endpush

@endsection