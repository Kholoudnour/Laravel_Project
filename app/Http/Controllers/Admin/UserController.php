<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
                'phone' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ]);
            $data['active'] = isset($request->active) ? 1 : 0;
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
        $users = User::all();
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
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,id,' . $id,
            'active' => 'required:boolean',
            'password' => 'nullable|string|min:8',
          
        ]);

        $data['password'] = Hash::make($data['password']);
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
