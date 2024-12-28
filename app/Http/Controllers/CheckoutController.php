<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $transactions = TransactionDetail::with('sepatus','sizes','customers')->where('customer_id',Auth::guard('customers')->id())->get();
        $totalHarga = $transactions->map(function($transactions) {
            return ($transactions->quantity * $transactions->sepatus->harga)+$transactions->pengambilan->ongkir;
        })->sum();
        return view('sepatu.checkout',compact('transactions','totalHarga'));
    }

    public function store(Request $request){
        $transactions = TransactionDetail::with('sepatus','sizes','customers')->where('customer_id',Auth::guard('customers')->id())->get();
        $totalHarga = $transactions->map(function($transactions) {
            return ($transactions->quantity * $transactions->sepatus->harga)+$transactions->pengambilan->ongkir;
        })->sum();

        $carts = Cart::where('customer_id',Auth::guard('customers')->id());
        $cartUser = $carts->get();
        $transaction = Transaction::create([
            'customer_id' => Auth::guard('customers')->id()
        ]);

        foreach ($cartUser as $cart) {
            $transaction->details()->create([
                'customer_id' => Auth::guard('customers')->id(),
                'sepatu_id' => $cart->sepatu_id,
                'size_id' => $cart->size_id,
                'quantity' => $cart->quantity,
                'tanggal' => $cart->tanggal,
                'pengambilan_id' => $request->pengambilan_id,
                'harga_ongkir' => $request->harga_ongkir
            ]);
        }

        Cart::where('customer_id',Auth::guard('customers')->id())->delete();
        return view('sepatu.checkout',compact('transactions','totalHarga'));
    }
}
