<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class DashboardGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galeri::latest()->paginate(18);

        return view('dashboard.galeri.index', [
            'title' => 'Galeri',
            'galeris' => $galeris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galeri.create', [
            'title' => 'Tambah Galeri'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'gambar' => 'required|mimes:jpg, jpeg, png, bmp|max:1000',
            'keterangan' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/galeri'), $gambar);
            $validatedData['gambar'] = $gambar;
        }

        Galeri::create($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Gambar baru berhasil ditambahkan pada galeri.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        return view('dashboard.galeri.show', [
            'title' => 'Detail Galeri',
            'galeri' => $galeri
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('dashboard.galeri.edit', [
            'title' => 'Edit Galeri',
            'galeri' => $galeri
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $rules = [
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000',
            'keterangan' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/galeri'), $gambar);
            $validatedData['gambar'] = $gambar;
        } else {
            $validatedData['gambar'] = $galeri->gambar;
        }

        Galeri::where('id', $galeri->id)
            ->update($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Gambar pada galeri berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        Galeri::destroy($galeri->id);

        return redirect('/dashboard/galeri')->with('success', 'Gambar pada galeri berhasil dihapus.');
    }
}
