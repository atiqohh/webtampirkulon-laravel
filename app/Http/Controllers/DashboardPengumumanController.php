<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();

        return view('dashboard.pengumuman.index', [
            'title' => 'Pengumuman',
            'pengumumans' => $pengumuman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengumuman.create', [
            'title' => 'Tambah Pengumuman'
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
            'slug' => 'required|unique:pengumumen',
            'body' => 'required',
            'attachment' => 'mimes:pdf|max:2000'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->hasfile('attachment')) {
            $attachment = time() . '_' . $request->attachment->getClientOriginalName();
            $request->file('attachment')->move(public_path('file/pengumuman'), $attachment);
            $validatedData['attachment'] = $attachment;
        }

        Pengumuman::create($validatedData);

        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('dashboard.pengumuman.show', [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $pengumuman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('dashboard.pengumuman.edit', [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $pengumuman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $rules = [
            'judul' => 'required|max:255',
            'body' => 'required',
            'attachment' => 'mimes:pdf|max:2000'
        ];

        if ($request->slug != $pengumuman->slug) {
            $rules['slug'] = 'required|unique:pengumumen';
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($request->hasfile('attachment')) {
            $attachment = time() . '_' . $request->attachment->getClientOriginalName();
            $request->file('attachment')->move(public_path('file/pengumuman'), $attachment);
            $validatedData['attachment'] = $attachment;
        } else {
            $validatedData['attachment'] = $pengumuman->attachment;
        }

        Pengumuman::where('id', $pengumuman->id)
            ->update($validatedData);

        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);

        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pengumuman::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
