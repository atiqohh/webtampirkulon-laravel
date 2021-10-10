<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::latest()->get();

        return view('dashboard.paket.index', [
            'title' => 'Paket Wisata',
            'pakets' => $pakets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.paket.create', [
            'title' => 'Tambah Paket Wisata'
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
            'nama' => 'required|max:255|unique:pakets',
            'slug' => 'required|unique:pakets',
            'harga' => 'required',
            'fasilitas' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Paket::create($validatedData);

        return redirect('/dashboard/paket')->with('success', 'Paket wisata baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        return view('dashboard.paket.show', [
            'title' => 'Detail Paket Wisata',
            'paket' => $paket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('dashboard.paket.edit', [
            'title' => 'Edit Paket Wisata',
            'paket' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $rules = [
            'harga' => 'required',
            'fasilitas' => 'required'
        ];

        if ($request->nama != $paket->nama) {
            $rules['nama'] = 'required|max:255|unique:pakets';
        }

        if ($request->slug != $paket->slug) {
            $rules['slug'] = 'required|unique:pakets';
        }

        $validatedData = $request->validate($rules);

        paket::where('id', $paket->id)
            ->update($validatedData);

        return redirect('/dashboard/paket')->with('success', 'Paket wisata berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id);

        return redirect('/dashboard/paket')->with('success', 'Paket wisata berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Paket::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
