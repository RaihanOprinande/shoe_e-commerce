<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Pengambilan;
use App\Models\Sepatu_size;
use GuzzleHttp\Exception\TooManyRedirectsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function index(){
        $carts = Cart::with('sepatus','sizes','brands','customers')->where('customer_id',Auth::guard('customers')->id())->get();
        $pengambilans = Pengambilan::all();

        $totalHarga = $carts->map(function($cart) {
            return $cart->quantity * $cart->sepatus->harga;
        })->sum();

        return view('sepatu.cart',compact('carts','totalHarga','pengambilans'));
    }

    public function store(Request $request){

        $stock = Sepatu_size::where('sepatu_id',$request->sepatu_id)->first();
        $validasi1 = Cart::where('size_id',$request->size_id)->first();
        $validasi2 = Cart::where('sepatu_id',$request->sepatu_id)->first();

        if (!$stock || $stock->quantity < 1) {
            return redirect('cart')->with('pesan', 'Stok tidak tersedia.');
        }

        if($validasi1 && $validasi2){
            return redirect('/cart')->with('pesan','barang ini sudah ada di keranjang anda');
        }

        // Validasi input
        Cart::create([
            'customer_id' => Auth::guard('customers')->id(),
            'size_id' => $request-> size_id,
            'sepatu_id' => $request-> sepatu_id,
            'quantity' => $request-> quantity,
            'tanggal' => $request->tanggal
        ]);

        // $stock->quantity -= $request->quantity ;
        // $stock->save();

        return redirect('cart')->with('pesan', 'Produk berhasil ditambahkan ke keranjang.');
    }



    public function destroy(string $id)
    {
    Cart::destroy($id);
    return redirect('/cart')->with('pesan','Data berhasil dihapus');
    }



}
