<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        // dd($users); 
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $page = "Add User";
        return view('admin.add_user', compact(['page']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        { 
            $data = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'nullable|string|max:255',
                'password' => 'required|string|min:3',
                
            ]);
            $data['password'] = Hash::make($request['password']);
            $user= User::create($data);
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));  
      }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,' . $id,
            'phone' => 'required|string|max:255',
            'active' => 'nullable|boolean',
            'password' => 'nullable|string|min:3',
        ]);
        // dd($data); 
        Log::info($request->all());
        $data['password'] = Hash::make($data['password']);
        $data['active'] = $request->has('active') ? 1 : 0;
        $user = User::findOrFail($id);
            User::where('id', $id)->update($data);
            return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
