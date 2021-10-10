<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.umkm.index', [
            'title' => 'UMKM',
            'umkms' => Umkm::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.umkm.create', [
            'title' => 'Tambah UMKM'
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
            'nama' => 'required|max:255|unique:umkms',
            'slug' => 'required|unique:umkms',
            'pemilik' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000'
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/umkm'), $gambar);
            $validatedData['gambar'] = $gambar;
        }

        Umkm::create($validatedData);

        return redirect('/dashboard/umkm')->with('success', 'UMKM baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function show(Umkm $umkm)
    {
        return view('dashboard.umkm.show', [
            'title' => 'Detail UMKM',
            'umkm' => $umkm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Umkm $umkm)
    {
        return view('dashboard.umkm.edit', [
            'title' => 'Edit UMKM',
            'umkm' => $umkm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Umkm $umkm)
    {
        $rules = [
            'pemilik' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000'
        ];

        if ($request->nama != $umkm->nama) {
            $rules['nama'] = 'required|max:255|unique:umkms';
        }

        if ($request->slug != $umkm->slug) {
            $rules['slug'] = 'required|unique:umkms';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/umkm'), $gambar);
            $validatedData['gambar'] = $gambar;
        } else {
            $validatedData['gambar'] = $umkm->gambar;
        }

        Umkm::where('id', $umkm->id)
            ->update($validatedData);

        return redirect('/dashboard/umkm')->with('success', 'UMKM berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umkm $umkm)
    {
        Umkm::destroy($umkm->id);

        return redirect('/dashboard/umkm')->with('success', 'UMKM berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Umkm::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
