<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\UnitProduksi;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $prod = Produk::select("*")
            ->orderBy('created_at', "desc")
            ->get();
        $up = UnitProduksi::all();
        return view('user.index', compact('prod','up'));
    }
    public function detail($id)
    {
        $produk = Produk::find($id);
        $up = UnitProduksi::all();

        return view('user.produk-detail', compact('produk','up'));
    }
}
