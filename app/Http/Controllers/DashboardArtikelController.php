<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::latest()->get();

        return view('dashboard.artikel.index', [
            'title' => 'Artikel',
            'artikels' => $artikels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.artikel.create', [
            'title' => 'Tambah Artikel'
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
            'judul' => 'required|max:255',
            'slug' => 'required|unique:artikels',
            'body' => 'required',
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/artikel'), $gambar);
            $validatedData['gambar'] = $gambar;
        }

        Artikel::create($validatedData);

        return redirect('/dashboard/artikel')->with('success', 'Artikel baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        return view('dashboard.artikel.show', [
            'title' => 'Detail Artikel',
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('dashboard.artikel.edit', [
            'title' => 'Edit Artikel',
            'artikel' => $artikel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $rules = [
            'judul' => 'required|max:255',
            'body' => 'required',
            'gambar' => 'mimes:jpg, jpeg, png, bmp|max:1000'
        ];

        if ($request->slug != $artikel->slug) {
            $rules['slug'] = 'required|unique:artikels';
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->hasfile('gambar')) {
            $gambar = time() . '_' . $request->gambar->getClientOriginalName();
            $request->file('gambar')->move(public_path('img/artikel'), $gambar);
            $validatedData['gambar'] = $gambar;
        } else {
            $validatedData['gambar'] = $artikel->gambar;
        }

        Artikel::where('id', $artikel->id)
            ->update($validatedData);

        return redirect('/dashboard/artikel')->with('success', 'Artikel berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        Artikel::destroy($artikel->id);

        return redirect('/dashboard/artikel')->with('success', 'Artikel berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Artikel::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
