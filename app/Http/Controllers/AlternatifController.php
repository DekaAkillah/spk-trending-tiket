<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.alternatif.index',[
            'title' => 'Data Alternatif',
            'datas' => Alternatif::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alternatif.create', [
            "title" => "Buat Alternatif", 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required|max:255',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
        ]);
    
        Alternatif::create($validation);
        return redirect('/admin/alternatif')->with('success', 'Data Alternatif berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        return view('admin.alternatif.edit', [
            'title' => 'Edit Alternatif',
            'datas' => $alternatif
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $validation = $request->validate([
            'nama' => 'required|max:255',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
        ]);
    
        Alternatif::where('id', $alternatif->id)->update($validation);
        return redirect('/admin/alternatif')->with('success', 'Data Alternatif berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        Alternatif::destroy($alternatif->id);
        return redirect('/admin/alternatif')->with('success', 'Data Alternatif berhasil dihapus!');
    }
}
