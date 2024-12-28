<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Size;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardIncomesController extends Controller
{
    public function show(Request $request)
    {
        // Ambil data pemasukan, filter berdasarkan tanggal jika ada
        $pemasukans = Pemasukan::query();

        if ($request->has('tanggal') && $request->tanggal) {
            $pemasukans->whereDate('tanggal', $request->tanggal);
        }

        $pemasukans = $pemasukans->get();  // Ambil data pemasukan
        $totalPemasukan = Pemasukan::sum('total');  // Total pemasukan

        // Buat PDF dengan data yang sudah diproses
        // $pdf = Pdf::loadView('dashboard.income.cetak_pdf', [
        //     'pemasukans' => $pemasukans,
        //     'totalPemasukan' => $totalPemasukan
        // ]);

        // Stream file PDF (langsung download)
        // return $pdf->stream('laporan-data-pemasukan.pdf');
    }
    public function index(Request $request)
{
    // Inisialisasi query untuk model Pemasukan
    $query = Pemasukan::latest();

    if ($request->filled('tanggal')) {
        $query->whereDate('tanggal', $request->tanggal);
    }

    // Mengambil data dengan pagination
    $incomes = $query->paginate(10);

    // Menghitung total pemasukan
    $totalPemasukan = $query->sum('total');

    // Mengembalikan view dengan data yang diperlukan
    return view('dashboard.income.income', [
        'incomes' => $incomes,
        'totalPemasukan' => $totalPemasukan
    ]);
}


    public function edit(string $id)
     {

        $incomes = Pemasukan::find($id);
        $kategoris = Kategori::all();
        // $gambars = sepatui::all();
        $mereks = Brands::all();
        // $colors = Color::all();
        $sizes = Size::all();

        return view('dashboard.income.edit', compact('incomes','kategoris','mereks','sizes'));
     }

     public function update(Request $request,string $id){
        $validated = $request->validate([
         'nama' => 'required',
         'harga' => 'required',
         'kategori_id' => 'required',
         'bukti' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         'merek_id' => 'required',
         'size_id' => 'required',
         'jumlah' => 'required',
         'total' => 'required',
         'tanggal' => 'required',
        ]);

        if ($request->file('gambar_sepatu')) {
            $validated['gambar_sepatu'] = $request->file('gambar_sepatu')->store('images','public');
        }

           Pemasukan::where('id', $id)->update($validated);
           return redirect('dashboard-income')->with('pesan','Data berhasil diubah');
     }


     public function destroy(string $id)
     {
        Pemasukan::destroy($id);
        return redirect('dashboard-income')->with('pesan','Data berhasil dihapus');
     }
}
