<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Sepatu;
use App\Models\Merek;
use App\Models\Sepatu_gambar;
use App\Models\Size;

class ListController extends Controller
{
    // SepatuController.php
    public function search(Request $request)
    {
        // Ambil input dari form search
        $search = $request->input('search');

        // Cek apakah input search kosong
        if (empty($search)) {
            // Jika kosong, tampilkan pesan atau alihkan kembali tanpa melakukan pencarian
            return redirect()->back()->with('error', 'Silakan isi kata kunci pencarian.');
        }

        // Lakukan pencarian jika search terisi
        $sepatus = Sepatu::where('nama', 'like', "%{$search}%")
                         ->orWhere('kategori_id', 'like', "%{$search}%")
                         ->get();

        // Tampilkan halaman dengan pesan jika data tidak ditemukan
        if ($sepatus->isEmpty()) {
            return view('sepatu.list', [
                'sepatus' => $sepatus,
                'message' => 'Data tidak ditemukan untuk kata kunci: ' . $search
            ]);
        }

        return view('sepatu.list', compact('sepatus'));
    }


public function sepatuByMerek($id)
{
    $mereks = Brands::all();
    $sepatus = Sepatu::where('brands_id', $id)->get();

    return view('sepatu.list', compact('mereks', 'sepatus'));
}
public function index()
{
    $mereks = Brands::all();
    $sepatus = Sepatu::all();
    $sizes = Size::all();
    // $sepatu_gambar = Sepatu_gambar::all();

return view('sepatu.list', compact('mereks', 'sepatus', 'sizes'));
}


}
