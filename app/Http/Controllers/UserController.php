<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.account.index',[
            'title' => 'Account Page',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('admin.account.create', [
            "title" => "Create Account", 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create($validation);
        return redirect('/admin/account')->with('success', 'New Account has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account.show',[
            'users' => $user,
            'title' => "Account details" 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account.edit',[
            'title' => "Edit Account",
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:5'
        ]);

        User::where('id', $id)->update($validatedData);
        return redirect('/admin/account')->with('success', 'New Account has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/account')->with('success-delete', 'An Account has been deleted!');
    }
}
