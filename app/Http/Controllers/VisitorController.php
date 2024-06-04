<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.visitor.index',[
            'title' => 'Visitor Data Page',
            'data' => Visitor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visitor.create', [
            "title" => "Create Visitor Data", 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'tgl_datang' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'is_active' => 'required',
        ]);

        Visitor::create($validation);
        return redirect('/form')->with('success', 'Terima Kasih Sudah Berkunjung!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        return view('admin.visitor.show',[
            'data' => $visitor,
            'title' => "Visitor details" 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        return view('admin.visitor.edit',[
            'data' => $visitor,
            'title' => "Edit Visitor Data" 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'tgl_datang' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'is_active' => 'required',
        ]);

        Visitor::where('id', $visitor->id)->update($validatedData);
        return redirect()->route('visitor.index')->with('success', 'Visitor Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        Visitor::destroy($visitor->id);
        return redirect('/admin/visitor')->with('success-delete', 'Visitor Data has been deleted!');
    }
}
