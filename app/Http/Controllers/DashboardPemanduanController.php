<?php

namespace App\Http\Controllers;

use App\Models\Pemanduan;
use App\Models\Pemandu;
use Illuminate\Http\Request;

class DashboardPemanduanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pemanduan = Pemanduan::where('pemandu_id', $id)->first();

        return view('dashboard.pemanduan.create', [
            'title' => 'Tambah Pemanduan',
            'pemanduan' => $pemanduan
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
            'pemandu_id' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'jumlah' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pemanduan::create($validatedData);

        return redirect('/dashboard/pemandu')->with('success', 'Pemanduan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemanduan  $pemanduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemanduan $pemanduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemanduan  $pemanduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemanduan $pemanduan)
    {
        return view('dashboard.pemanduan.edit', [
            'title' => 'Edit Pemanduan',
            'pemanduan' => $pemanduan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemanduan  $pemanduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemanduan $pemanduan)
    {
        $rules = [
            'pemandu_id' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'jumlah' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Pemanduan::where('id', $pemanduan->id)
            ->update($validatedData);

        return redirect('/dashboard/pemandu')->with('success', 'Pemanduan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemanduan  $pemanduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemanduan $pemanduan)
    {
        Pemanduan::destroy($pemanduan->id);

        return redirect('/dashboard/pemandu')->with('success', 'Pemanduan wisata berhasil dihapus.');
    }
}
