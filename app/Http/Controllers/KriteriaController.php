<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kriteria.index',[
            'title' => 'Data Kriteria',
            'datas' => Kriteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.create', [
            "title" => "Buat Kriteria", 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'kode' => 'required|max:5',
            'nama' => 'required',
            'bobot' => 'required',
            'atribut' => 'required',
        ]);
    
        Kriteria::create($validation);
        return redirect('/admin/kriteria')->with('success', 'Kriteria berhasil ditambahkan!');
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
        $kriteria = Kriteria::findorfail($id);
        return view('admin.kriteria.edit', [
            'title' => 'Edit Kriteria',
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'kode' => 'required|max:5',
            'nama' => 'required',
            'bobot' => 'required',
            'atribut' => 'required',
        ]);
    
        Kriteria::where('id', $id)->update($validation);
        return redirect('/admin/kriteria')->with('success', 'Kriteria berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kriteria = Kriteria::findorfail($id);
        $kriteria->delete();

        return redirect('/admin/kriteria')->with('success','Kriteria Berhasil Dihapus');
    }
}
