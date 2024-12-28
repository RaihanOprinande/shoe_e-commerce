<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardOrderController extends Controller
{
    public function index()
    {
        
        $orders=Pemesanan::with('customers','sepatus')->latest();
        $transactions = TransactionDetail::with('sepatus','sizes','customers')->where('customer_id',Auth::guard('customers')->id())->get();
        $totalHarga = $transactions->map(function($transactions) {
            return ($transactions->quantity * $transactions->sepatus->harga)+$transactions->pengambilan->ongkir;
        })->sum();
         return view('dashboard.order.order',['orders'=>$orders->paginate(10),'totalHarga'=>$totalHarga]);
    }

    public function store(Request $request){
        $transactions = TransactionDetail::where('customer_id',Auth::guard('customers')->id());
        $transactionUser = $transactions->get();

        foreach ($transactionUser as $item ) {
            Pemesanan::create([
                'customer_id' => $item->customer_id,
                'sepatu_id' => $item->sepatu_id,
                'size_id' => $item->size_id,
                'quantity' => $item->quantity,
                'tanggal' => $item->tanggal,
                'pengambilan_id' => $item->pengambilan_id,
                'harga_ongkir' => $item->harga_ongkir,
                'bukti_transaksi' => $request->bukti_transaksi,
                'status' => 'pending'
            ]);
        }


        // Cart::where('customer_id',Auth::guard('customers')->id())->delete();
        return redirect('/');
    }

    public function destroy(string $id)
     {
        Pemesanan::destroy($id);
        return redirect('dashboard-order')->with('pesan','Data berhasil dihapus');
     }




}
