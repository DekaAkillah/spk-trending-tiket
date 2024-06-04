<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tiket.index',[
            'title' => 'Data Tiket',
            'datas' => Tiket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tiket.create', [
            "title" => "Buat Tiket", 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validation = $request->validate([
        'nama_event' => 'required|max:255',
        'tanggal_event' => 'required|date_format:Y-m-d',
        'lokasi_event' => 'required',
        'harga_tiket' => 'required|integer',
        'rating' => 'required',
        'jumlah_pengunjung_hal' => 'required|integer',
        'tiket_terjual' => 'required|integer',
    ]);

    // Ensure the date is in the correct format
    $validation['tanggal_event'] = Carbon::createFromFormat('Y-m-d', $request->tanggal_event)->format('Y-m-d');

    Tiket::create($validation);
    return redirect('/admin/tiket')->with('success', 'Tiket Event berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        return view('admin.tiket.edit', [
            'title' => 'Edit tiket',
            'data' => $tiket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        $validation = $request->validate([
            'nama_event' => 'required|max:255',
            'tanggal_event' => 'required|date_format:Y-m-d',
            'lokasi_event' => 'required',
            'harga_tiket' => 'required|integer',
            'rating' => 'required',
            'jumlah_pengunjung_hal' => 'required|integer',
            'tiket_terjual' => 'required|integer',
        ]);

    // Ensure the date is in the correct format
        $validation['tanggal_event'] = Carbon::createFromFormat('Y-m-d', $request->tanggal_event)->format('Y-m-d');

        Tiket::where('id', $tiket->id)->update($validation);
        return redirect('/admin/tiket')->with('success', 'Tiket Event berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        Tiket::destroy($tiket->id);
        return redirect('/admin/tiket')->with('success', 'Tiket Event berhasil dihapus!');
    }
}
