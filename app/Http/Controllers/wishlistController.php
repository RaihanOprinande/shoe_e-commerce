<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::with('sepatus','customers')->where('customer_id',Auth::guard('customers')->id())->paginate(10);
        return view('sepatu.wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Wishlist::create([
            'customer_id' => Auth::guard('customers')->id(),
            'sepatu_id' => $request-> sepatu_id,
        ]);

       return redirect('wishlist')->with('pesan', 'Produk berhasil ditambahkan ke wishlist.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wishlist::destroy($id);
        return redirect('wishlist')->with('pesan','Data berhasil dihapus');
    }
}
