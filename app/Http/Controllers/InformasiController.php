<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model informasi
        $informasi = informasi::all();
        return view('informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama_game' => 'required|unique:informasis',
            'keterangan' => 'required',
            'pengertian' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $informasi = new informasi();
        $informasi->nama_game = $request->nama_game;
        $informasi->keterangan = $request->keterangan;
        $informasi->pengertian = $request->pengertian;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/informasi/', $name);
            $informasi->gambar = $name;
        }
        $informasi->save();
        return redirect()->route('informasi.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi = informasi::findOrFail($id);
        return view('informasi.show', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = informasi::findOrFail($id);
        return view('informasi.edit', compact('informasi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $validated = $request->validate([

            'nama_game' => 'required|max:255',
            'keterangan' => 'required',
            'pengertian' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $informasi = informasi::findOrFail($id);
        $informasi->nama_game = $request->nama_game;
        $informasi->keterangan = $request->keterangan;
        $informasi->pengertian = $request->pengertian;
        if ($request->hasFile('gambar')) {
    $image = $request->file('gambar');
    $name = rand(1000, 9999) . $image->getClientOriginalName();
    $image->move('images/informasi/', $name);
    $informasi->gambar = $name;
}

        $informasi->save();
        return redirect()->route('informasi.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = informasi::findOrFail($id);
        $informasi->delete();
        return redirect()->route('informasi.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
