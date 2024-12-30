<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class DashboardAdminController extends Controller
{
    public function Dashboard()
    {
        $income = [1000, 2000, 1500, 3000, 2500, 4000, 3500];
        $outcome = [500, 1000, 750, 1500, 1250, 2000, 1750];
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        return view('dashboard.Welcome',compact('income', 'outcome', 'labels'));
    }

    public function index()
    {
        $users = User::latest();
        // $currentUserId = auth()->user()->id;
        // $users = User::where('id', '!=', $currentUserId)
        //              ->latest();
                     // Adjust the number of items per page as needed

        // if(request('search')){
        // $users->where('name','like','%' . Request('search') . '%')
        //       ->orWhere('email','like','%' . Request('search') . '%');
        // }
        return view('dashboard.user.index', ['users' =>$users->paginate(30)]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.user.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

    //     User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'password' => Hash::make($validated['password'])
    //   ]);


        return redirect('dashboard-user')->with('pesan', 'Data Berhasil Di-tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view ('dashboard.user.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
        ]);
        User::where('id', $id)->update($validated);
        return redirect('dashboard-user')->with('pesan', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('dashboard-user')->with('pesan', 'Data berhasil dihapus');

    }
}
