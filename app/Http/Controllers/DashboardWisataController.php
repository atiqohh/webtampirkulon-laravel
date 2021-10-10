<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisatas = Wisata::latest()->get();

        return view('dashboard.wisata.index', [
            'title' => 'Wisata',
            'wisatas' => $wisatas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wisata.create', [
            'title' => 'Tambah Wisata'
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
            'nama' => 'required|max:255|unique:wisatas',
            'slug' => 'required|unique:wisatas',
            'harga_tiket' => 'required|max:255',
            'operasi' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000'
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/wisata'), $gambar);
            $validatedData['gambar'] = $gambar;
        }

        Wisata::create($validatedData);

        return redirect('/dashboard/wisata')->with('success', 'Wisata baru berhasil ditambahkan.');
    }

    public function detail($slug)
    {
        $wisata = Wisata::where('slug', $slug)->first();
        return $wisata;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $wisata = Wisata::where('slug', $slug)->first();

        return view('dashboard.wisata.show', [
            'title' => 'Detail Wisata',
            'wisata' => $wisata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $wisata = Wisata::where('slug', $slug)->first();

        return view('dashboard.wisata.edit', [
            'title' => 'Edit Wisata',
            'wisata' => $wisata
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $wisata = Wisata::where('slug', $slug)->first();

        $rules = [
            'harga_tiket' => 'required|max:255',
            'operasi' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000'
        ];

        if ($request->nama != $wisata->nama) {
            $rules['nama'] = 'required|unique:wisatas';
        }

        if ($request->slug != $wisata->slug) {
            $rules['slug'] = 'required|unique:wisatas';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/wisata'), $gambar);
            $validatedData['gambar'] = $gambar;
        } else {
            $validatedData['gambar'] = $wisata->gambar;
        }

        Wisata::where('id', $wisata->id)
            ->update($validatedData);

        return redirect('/dashboard/wisata')->with('success', 'Wisata berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $wisata = Wisata::where('slug', $slug)->first();

        Wisata::destroy($wisata->id);

        return redirect('/dashboard/wisata')->with('success', 'Wisata berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Wisata::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
