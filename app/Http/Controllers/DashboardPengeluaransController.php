<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Kategori;
use App\Models\KategoriPengeluaran;
use App\Models\Pengeluaran;
use App\Models\Sepatu;
use App\Models\Size;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardPengeluaransController extends Controller
{

    public function show(Request $request){

        {
            $query = Pengeluaran::query();

            if ($request->filled('kategori_id')) {
                $query->where('kategori_id', $request->kategori_id);
            }

            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('date', [$request->start_date, $request->end_date]);
            }

            $totalHarga = $query->sum('uang');
            $total = $query->sum('uang');
            $pengeluarans = $query->with('kategori')->paginate(10);

            $tanggal = Pengeluaran::latest()->paginate(10);
            $kategoris = KategoriPengeluaran::latest()->paginate(10);

            $pdf = PDF::loadView('dashboard.pengeluarans.cetak_pdf', [
                'pengeluarans' => $pengeluarans,
                'totalHarga' => $totalHarga,
            ]);

            return $pdf->stream('laporan-data-pengeluaran.pdf');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Pengeluaran::query()->latest();

    if ($request->filled('kategori_id')) {
        $query->where('kategori_id', $request->kategori_id);
    }

    if ($request->filled('start_date') && $request->has('end_date')) {
        $query->whereBetween('date', values: [$request->start_date, $request->end_date]);
    }


    // Hitung total pengeluaran berdasarkan semua data yang diambil
    $total = $query->sum('uang');
    $pengeluarans = $query->with('kategori')->paginate(10);

    $tanggal = Pengeluaran::latest()->paginate(10);
    $kategoris = KategoriPengeluaran::latest()->paginate(10);

    // Return view dengan data yang diperlukan
    return view('dashboard.pengeluarans.index', compact( 'total','pengeluarans','tanggal','kategoris'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $kategoris = KategoriPengeluaran::latest()->paginate(10);
        return view('dashboard.pengeluarans.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori_id' => 'required',
            'uang' => 'required',
            'keterangan' => 'nullable',
            'date' => 'required',
        ]);

        // Simpan data ke database
        Pengeluaran::create($request->all());

        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Ambil data pengeluaran berdasarkan ID
    $pengeluaran = Pengeluaran::findOrFail($id);
    // $sepatus = Sepatu::all();
    $brands = Brands::all();
    $sizes = Size::all();
    $kategoris = KategoriPengeluaran::all();

    // Tampilkan view edit dengan data pengeluaran
    return view('dashboard.pengeluarans.edit', compact('pengeluaran','brands','sizes','kategoris'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
           'kategori_id' => 'required',
            'uang' => 'required',
            'keterangan' => 'nullable',
            'date' => 'required',
        ]);

        // Cari data pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Update data pengeluaran dengan data yang divalidasi
        $pengeluaran->update($validated);

        // Redirect ke halaman daftar pengeluaran dengan pesan sukses
        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        // Cari data pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Hapus data pengeluaran
        $pengeluaran->delete();

        // Redirect ke halaman daftar pengeluaran dengan pesan sukses
        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil dihapus!');
    }

}
