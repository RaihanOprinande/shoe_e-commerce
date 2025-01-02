<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryOrderController extends Controller
{
    public function index()
    {

        $orders = Order::where('customer_id',Auth::guard('customers')->id())->orderByRaw("CASE WHEN status != 'pending' THEN 1 ELSE 0 END, status ASC")->paginate(10);
        return view('sepatu.historyPembelian', compact('orders'));
    }

    public function show($id)
    {
        $orderu = Order::with('sepatus','customers','sizes')->find($id);
        return view('sepatu.detailPembelian', compact('orderu'));
    }


}
