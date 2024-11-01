<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Sepatu;
use App\Models\Merek;
use App\Models\Size;

class SepatuController extends Controller
{
    public function index()
    {
        $mereks = Brands::all();
        // $sepatus = Sepatu::with('sepatu_gambars')->get();
        $sepatus = Sepatu::all();
        $sizes = Size::all();

    return view('home', compact('mereks', 'sepatus', 'sizes'));
    }
    public function show($id) {
        $sepatu = Sepatu::find($id);
        $sizes = Size::all();
        $kode_sepatu = Sepatu::find('kode_sepatu');
        $stocks = Sepatu::with(['gambar', 'kategori', 'color', 'merek'])->get();
        // $sepatus = Sepatu::with(['size'])->find('$id');
        return view('sepatu.detail', compact('sepatu','stocks','sizes','kode_sepatu'));
    }
    public function aboutus()
    {
        $aboutus = Sepatu::all(); // Ambil semua data sepatu
        return view('sepatu.aboutus', compact('aboutus'));
    }



public function filterByKategori($kategori)
{
    // Ambil data sepatu berdasarkan kategori yang dipilih
    $sepatus = Sepatu::where('kategori_id', $kategori)->get();

    return view('sepatu.list', compact('sepatus'));
}


}
