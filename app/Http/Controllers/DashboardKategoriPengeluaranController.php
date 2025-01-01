<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengeluaran;
use Illuminate\Http\Request;

class DashboardKategoriPengeluaranController extends Controller
{
    public function index()
    {
        $kPengeluaran = KategoriPengeluaran::paginate(10);
        return view('dashboard.kategoriPengeluaran.index', compact('kPengeluaran'));
    }

    public function edit($id)
    {
        $kPengeluaran = KategoriPengeluaran::find($id);
        return view('dashboard.kategoriPengeluaran.edit', compact('kPengeluaran'));
    }

    public function create()
    {
        $kPengeluaran = KategoriPengeluaran::all();
        return view('dashboard.kategoriPengeluaran.create',compact('kPengeluaran'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        KategoriPengeluaran::create($validated);
        return redirect('dashboard-kategori-pengeluaran')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $kPengeluaran = KategoriPengeluaran::where('id', $id);
        $kPengeluaran->update($validated);
        return redirect('dashboard-kategori-pengeluaran')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        KategoriPengeluaran::destroy($id);
        return redirect('dashboard-kategori-pengeluaran')->with('pesan', 'Data berhasil dihapus');
    }


}
