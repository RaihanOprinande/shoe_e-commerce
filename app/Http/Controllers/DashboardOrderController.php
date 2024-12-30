<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pemasukan;
use App\Models\Pemesanan;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardOrderController extends Controller
{
    public function index()
    {

        $orders=Order::with('customers','sepatus','sizes','pengambilans')->latest();
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
            Order::create([
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
        Order::destroy($id);
        return redirect('dashboard-order')->with('pesan','Data berhasil dihapus');
     }

     public function confirmOrder($id)
{
    // Temukan pesanan berdasarkan ID
    $order = Order::with('sepatus','sizes')->findOrFail($id);
    $total_harga = $order->sepatus->harga * $order->quantity + $order->pengambilans->ongkir;
    // Update status pesanan menjadi "diproses"
    $order->status = 'processed';
    $order->save();

    // Simpan data ke tabel pemasukan
    Pemasukan::create([
        'sepatu_id' => $order->sepatu_id,
        'size_id'=> $order->size_id,
        'total_harga'=> $total_harga,
        'quantity' => $order->quantity,
        'tanggal'=> $order->tanggal,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui dan data telah disimpan ke tabel pemasukan.');
}

    public function show($id)
    {
        $orders = Order::with('customers','sepatus','sizes','pengambilans')->findOrFail($id);
        return view('dashboard.order.show',compact('orders'));
    }




}
