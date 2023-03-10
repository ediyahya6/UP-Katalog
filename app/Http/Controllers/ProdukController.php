<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\UnitProduksi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::select("*")
            ->orderBy('created_at', "desc")
            ->get();
        return view('admin.Produk.index', compact('produk'));
    }
    public function detail($id)
    {
        $produk = Produk::find($id);
        $up = UnitProduksi::all();
        return view('admin.Produk.detail', compact('produk','up'));
    }
    public function create()
    {
        $up = UnitProduksi::all();
        return view('admin.Produk.create', compact('up'));
    }
    public function store(Request $request)
    {
        //validate form
        $request->validate(
            [
                'gambar_produk'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'up_id'             => 'required',
                'nama_produk'       => 'required',
                'harga_produk'      => 'required',
                'kategori_produk'   => 'required',
                'status_produk'     => 'required',
            ],
            [

                'gambar_produk.required'    => 'Gambar Produk Tidak Boleh Kosong.',
                'up_id.required'            => 'Brand Produk Tidak Boleh Kosong.',
                'nama_produk.required'      => 'Nama Produk Tidak Boleh Kosong.',
                'harga_produk.required'     => 'Harga Produk Tidak Boleh Kosong.',
                'kategori_produk.required'  => 'Kategori Produk Tidak Boleh Kosong.',
                'status_produk.required'    => 'Status Produk Tidak Boleh Kosong.',
            ]
        );

        //upload gambar
        $gambar_produk = $request->gambar_produk;
        $slug = Str::slug($gambar_produk->getClientOriginalName());
        $new_gambar_produk = time() . '_' . $slug;
        $gambar_produk->move('uploads/gambar/', $new_gambar_produk);

        Produk::create([
            'gambar_produk'     => 'uploads/gambar/' . $new_gambar_produk,
            'up_id'             => $request->up_id,
            'nama_produk'       => $request->nama_produk,
            'harga_produk'      => $request->harga_produk,
            'detail_produk'     => $request->detail_produk,
            'kategori_produk'   => $request->kategori_produk,
            'status_produk'     => $request->status_produk,
            'stok_produk'       => $request->stok_produk,
        ]);

        return redirect('produk')->with('message', 'Data Produk Telah Disimpan');
    }
    public function edit($id)
    {
        $produk = Produk::find($id);
        $up = UnitProduksi::all();
        return view('admin.Produk.edit', compact(['produk', 'up']));
    }
    public function update(Request $request, $id)
    {
        //validate form
        $request->validate(
            [
                'up_id'             => 'required',
                'nama_produk'       => 'required',
                'harga_produk'      => 'required',
                'kategori_produk'   => 'required',
                'status_produk'     => 'required',
            ],
            [
                'up_id.required'            => 'Brand Produk Tidak Boleh Kosong.',
                'nama_produk.required'      => 'Nama Produk Tidak Boleh Kosong.',
                'harga_produk.required'     => 'Harga Produk Tidak Boleh Kosong.',
                'kategori_produk.required'  => 'Kategori Produk Tidak Boleh Kosong.',
                'status_produk.required'    => 'Status Produk Tidak Boleh Kosong.',
            ]
        );

        $produk = Produk::find($id);

        if ($request->hasFile('gambar_produk')) {
            $request->validate(
                [
                    'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'gambar_produk.required' => 'Gambar Produk Tidak Boleh Kosong.',
                ]
            );
            File::delete($produk->gambar_produk);
            $gambar_produk = $request->gambar_produk;
            $slug = Str::slug($gambar_produk->getClientOriginalName());
            $new_gambar_produk = time() . '_' . $slug;
            $gambar_produk->move('uploads/gambar/', $new_gambar_produk);
            $produk->gambar_produk = 'uploads/gambar/' . $new_gambar_produk;
        }

        $produk->up_id             = $request->up_id;
        $produk->nama_produk       = $request->nama_produk;
        $produk->harga_produk      = $request->harga_produk;
        $produk->detail_produk     = $request->detail_produk;
        $produk->kategori_produk   = $request->kategori_produk;
        $produk->status_produk     = $request->status_produk;
        $produk->stok_produk       = $request->stok_produk;
        $produk->save();

        return redirect('produk')->with('message', 'Data Produk Telah Diperbarui');
    }
    public function destroy($id)
    {
        $produk = Produk::find($id);
        File::delete($produk->gambar_produk);
        $produk->delete();

        return back()->with('message', 'Data Produk Telah Dihapus');
    }
}
