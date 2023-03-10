<?php

namespace App\Http\Controllers;

use App\Models\UnitProduksi;
use Illuminate\Http\Request;

class UnitProduksiController extends Controller
{
    public function index()
    {
        $up = UnitProduksi::select("*")
            ->orderBy('created_at', "desc")
            ->get();
        return view('admin.UP.index', compact('up'));
    }
    public function create()
    {
        $up = UnitProduksi::all();
        return view('admin.UP.create', compact('up'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'kejuruan' => 'required',
                'nama_up' => 'required',
                'penanggung_jawab' => 'required',
                'no_wa' => 'required',
            ],
            [
                'kejuruan.required' => 'Kejuruan Tidak Boleh Kosong.',
                'nama_up.required' => 'Nama Brand Tidak Boleh Kosong.',
                'penanggung_jawab.required' => 'Penanggung Jawab Tidak Boleh Kosong.',
                'no_wa.required' => 'No. WhatsApp Tidak Boleh Kosong.',
            ]
        );

        $unitproduksi = UnitProduksi::create([
            'kejuruan' => $request->kejuruan,
            'nama_up' => $request->nama_up,
            'penanggung_jawab' => $request->penanggung_jawab,
            'no_wa' => $request->no_wa,
            'marketplace' => $request->marketplace,
            'link_marketplace' => $request->link_marketplace,
        ]);

        return redirect('unitproduksi')->with('message', 'Data Unit Produksi Telah Disimpan');
    }
    public function edit($id)
    {
        $up = UnitProduksi::find($id);
        return view('admin.UP.edit', compact(['up']));
    }
    public function update(Request $request, $id)
    {
        //validate form
        $request->validate(
            [
                'kejuruan' => 'required',
                'nama_up' => 'required',
                'penanggung_jawab' => 'required',
                'no_wa' => 'required',
            ],
            [
                'kejuruan.required' => 'Kejuruan Tidak Boleh Kosong.',
                'nama_up.required' => 'Nama Brand Tidak Boleh Kosong.',
                'penanggung_jawab.required' => 'Penanggung Jawab Tidak Boleh Kosong.',
                'no_wa.required' => 'No. WhatsApp Tidak Boleh Kosong.',
            ]
        );

        $up = UnitProduksi::find($id);
        $up->update([
            'kejuruan' => $request->kejuruan,
            'nama_up' => $request->nama_up,
            'penanggung_jawab' => $request->penanggung_jawab,
            'no_wa' => $request->no_wa,
            'marketplace' => $request->marketplace,
            'link_marketplace' => $request->link_marketplace,
        ]);

        return redirect('unitproduksi')->with('message', 'Data Unit Produksi Telah Diperbarui');
    }
    public function destroy($id)
    {
        $up = UnitProduksi::find($id);
        $up->delete();

        return back()->with('message', 'Data Produk Telah Dihapus');
    }
}
