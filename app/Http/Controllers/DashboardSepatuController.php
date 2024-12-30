<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Merek;
use App\Models\Sepatu;
use App\Models\Color;
use App\Models\Size;
use App\Models\sepatui;
use Illuminate\Http\Request;

class DashboardSepatuController extends Controller

{
    public function index()
    {
        $sepatus=Sepatu::latest()->paginate(10);
         // $sepatus=Sepatu::latest()->paginate(10);
         return view('dashboard.sepatu.index',compact('sepatus'));
    }
    public function create(){
        $kategoris = Kategori::all();
        // $gambars = sepatui::all();
        $mereks = Brands::all();
        // $colors = Color::all();
        $sizes = Size::all();

        return view('dashboard.sepatu.create',compact('kategoris','mereks','sizes'));
     }

     public function store(Request $request){
        $validated = $request->validate([

         'kode_sepatu' => 'required',
         'nama' => 'required',
         'harga' => 'required',
         'kategori_id' => 'required',
         'gambar_sepatu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         'brands_id' => 'required',
        ]);

        if ($request->file('gambar_sepatu')) {
            $validated['gambar_sepatu'] = $request->file('gambar_sepatu')->store('images','public');
        }

        //dd($validated);

        Sepatu::create($validated);
        return redirect('dashboard-sepatu')->with('pesan','Data berhasil disimpan');
     }

     public function edit(string $id)
     {
        $kategoris = Kategori::all();
        // $gambars = sepatui::all();
        $mereks = Brands::all();
        // $colors = Color::all();
        $sizes = Size::all();
        $sepatus = Sepatu::find($id);
        return view('dashboard.sepatu.edit', compact('kategoris','mereks','sepatus','sizes'));
     }

     public function update(Request $request,string $id){
        $validated = $request->validate([
         'kode_sepatu' => 'required',
         'nama' => 'required',
         'harga' => 'required',
         'kategori_id' => 'required',
         'gambar_sepatu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         'brands_id' => 'required',
        ]);

        if ($request->file('gambar_sepatu')) {
            $validated['gambar_sepatu'] = $request->file('gambar_sepatu')->store('images','public');
        }

           Sepatu::where('id', $id)->update($validated);
           return redirect('dashboard-sepatu')->with('pesan','Data berhasil diubah');
     }


     public function destroy(string $id)
     {
        Sepatu::destroy($id);
        return redirect('dashboard-sepatu')->with('pesan','Data berhasil dihapus');
     }

     public function show(string $id)
     {
        $sepatus = Sepatu::with('sizes')->find($id);
        return view('dashboard.sepatu.show',compact('sepatus'));
     }




}
