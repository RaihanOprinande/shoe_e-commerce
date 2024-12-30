<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sepatu;
use App\Models\Merek;
use App\Models\Order;
use App\Models\Pemasukan;
use App\Models\Size;
use App\Models\Pemesanan;
use App\Models\Pengambilan;
use App\Models\Sepatu_size;
use Illuminate\Support\Facades\Auth;

class SepatuController extends Controller
{
    public function index()
    {
        $mereks = Brands::all();
        $sepatus = Sepatu::all();
        $sizes = Size::all();

    return view('home', compact('mereks', 'sepatus', 'sizes'));
    }
    public function show($id) {
        $sepatu = Sepatu::with('sizes')->find($id);
        // $sizes = Size::all();
        // $stocks = Sepatu::with(['gambars', 'kategori', 'color', 'merek'])->get();
        // $sepatus = Sepatu::with(['size'])->find('$id');
        return view('sepatu.detail', compact('sepatu'));
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
    public function pemesanan(Request $request)
    {
        Cart::create([
            'customer_id' => Auth::guard('customers')->id(),
            'sepatu_id' => $request->sepatu_id,
            'size_id' => $request->size_id,
            'quantity' => $request->quantity,
        ]);


        return redirect('keranjang')->with('success', 'Sepatu berhasil ditambahkan ke keranjang');
    }

    public function keranjang()
    {
        $carts = Cart::with('sepatus', 'sizes','customers')->where('customer_id', Auth::guard('customers')->id())->get();
        $pengambilans = Pengambilan::all();
        $totalHarga = 0;
        return view('sepatu.pemesanan', compact('carts','pengambilans','totalHarga'));
    }

    public function edit(string $id){
        $customers = Customer::find($id);
        return view('sepatu.editcart',compact('customers'));
    }

    public function cleanCart(Request $request)
    {
        Cart::where('customer_id',Auth::guard('customers')->id())->delete();


        return redirect('home')->with('success', 'Data berhasil dihapus');
    }


    public function update(Request $request, $id)
    {
    // Validasi input
    $validated = $request->validate([
    'name' => 'nullable',
    'nohp' => 'nullable',
    'alamat' => 'required',
    ]);

    // $carts = Cart::with('sepatus','sizes','customers')->where('customer_id', Auth::guard('customers')->id())->get()->find($request->id);
    // $customer = Auth::guard('customers')->user();
    // $pengambilans = Pengambilan::all();

    // // Update data customer
    Customer::where('id',$id)->update($validated);

    // Redirect dengan pesan sukses
    return redirect('keranjang')->with('success', 'Data berhasil diupdate');
    }


    public function prosesBayar(Request $request)
    {
    $request->validate([
        'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        'sepatu_id' => 'required', // Memastikan sepatu ID ada
        'quantity' => 'required',
    ], [
        'bukti.required' => 'Harap upload bukti pembayaran.',
        'bukti.image' => 'File yang diupload harus berupa gambar.',
        'bukti.mimes' => 'Hanya diperbolehkan format: jpeg, png, jpg.',
        'bukti.max' => 'Ukuran gambar maksimal 5MB.',
        'sepatu_id.required' => 'Sepatu ID diperlukan.',
        'size_id.required' => 'Size ID diperlukan.',
        'quantity.required' => 'Jumlah diperlukan.',
        'quantity.integer' => 'Jumlah harus berupa angka.',
        'quantity.min' => 'Jumlah minimal adalah 1.',
    ]);



    // ukuran
    $stock = Sepatu_size::where('sepatu_id', $request->sepatu_id)
    ->where('size_id', $request->size_id)
    ->first();

        $stock->quantity -= $request->quantity ;
        $stock->save();


    // Menyimpan bukti bukti pembayaran
    $path = $request->file('bukti')->store('bukti', 'public');

    // Menyimpan data pemesanan ke dalam tabel `orders`
    Order::create([
        'customer_id' => Auth::guard('customers')->id(),
        'sepatu_id' => $request->sepatu_id,
        'size_id' => $request->size_id,
        'tanggal'=>now(),
        'pengambilan_id' => $request->pengambilan_id,
        'quantity' => $request->quantity,
        'bukti_transaksi' => $path,
        'status' => 'pending',
    ]);
    Cart::where('customer_id',Auth::guard('customers')->id())->delete();

    return redirect('home')->with('success', 'Pemesanan berhasil disimpan');


    }





}
