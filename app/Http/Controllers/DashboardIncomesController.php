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

    public function index(Request $request)
{
    // Inisialisasi query untuk model Pemasukan
    $query = Pemasukan::with('sepatus','sizes')->latest();

    if ($request->filled('tanggal')) {
        $query->whereDate('tanggal', $request->tanggal);
    }

    // Mengambil data dengan pagination
    $incomes = $query->paginate(10);

    // Menghitung total pemasukan
    $totalPemasukan = $query->sum('total_harga');

    // Mengembalikan view dengan data yang diperlukan
    return view('dashboard.income.income', [
        'incomes' => $incomes,
        'totalPemasukan' => $totalPemasukan
    ]);
}


    public function edit(string $id)
     {

        $incomes = Pemasukan::find($id);

        return view('dashboard.income.edit', compact('incomes'));
     }

     public function update(Request $request,string $id){
        $validated = $request->validate([
         'total_harga' => 'required',
        //  'quantity' => 'nullable',
        //  'sepatu_id' => 'nullable',
        //  'size_id' => 'nullable',
        //  'tanggal' => 'nullable',
        ]);


           $pengeluaran = Pemasukan::where('id', $id);

           $pengeluaran->update($validated);
           return redirect('dashboard-income')->with('pesan','Data berhasil diubah');
     }


     public function destroy(string $id)
     {
        Pemasukan::destroy($id);
        return redirect('dashboard-income')->with('pesan','Data berhasil dihapus');
     }
}
