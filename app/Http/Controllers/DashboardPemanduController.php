<?php

namespace App\Http\Controllers;

use App\Models\Pemandu;
use App\Models\Pemanduan;
use Illuminate\Http\Request;

class DashboardPemanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pemandu.index', [
            'title' => 'Pemandu',
            'pemandus' => Pemandu::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pemandu.create', [
            'title' => 'Tambah Pemandu'
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
            'nama' => 'required|unique:pemandus',
        ];

        $validatedData = $request->validate($rules);

        Pemandu::create($validatedData);

        return redirect('/dashboard/pemandu')->with('success', 'Pemandu wisata baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemandu  $pemandu
     * @return \Illuminate\Http\Response
     */
    public function show(Pemandu $pemandu)
    {
        $pemanduans = Pemanduan::where('pemandu_id', $pemandu->id)->latest()->get();

        return view('dashboard.pemanduan.index', [
            'title' => 'Detail Pemandu',
            'pemandu' => $pemandu,
            'pemanduans' => $pemanduans
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemandu  $pemandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemandu $pemandu)
    {
        return view('dashboard.pemandu.edit', [
            'title' => 'Edit Pemandu',
            'pemandu' => $pemandu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemandu  $pemandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemandu $pemandu)
    {
        $rules = [];

        if ($request->nama != $pemandu->nama) {
            $rules['nama'] = 'required|unique:pemandus';
        }

        $validatedData = $request->validate($rules);

        Pemandu::where('id', $pemandu->id)
            ->update($validatedData);

        return redirect('/dashboard/pemandu')->with('success', 'Pemandu wisata berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemandu  $pemandu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemandu $pemandu)
    {
        Pemandu::destroy($pemandu->id);

        return redirect('/dashboard/pemandu')->with('success', 'Pemandu wisata berhasil dihapus.');
    }
}
