<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Paket;
use Illuminate\Http\Request;

class DashboardReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasis = Reservasi::latest()->get();

        return view('dashboard.reservasi.index', [
            'title' => 'Reservasi',
            'reservasis' => $reservasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reservasi.create', [
            'title' => 'Tambah Reservasi',
            'pakets' => Paket::all()
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
            'nama' => 'required|max:255',
            'paket_id' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
            'kontak' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Reservasi::create($validatedData);

        return redirect('/dashboard/reservasi')->with('success', 'Reservasi baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi $reservasi)
    {
        return view('dashboard.reservasi.show', [
            'title' => 'Detail Reservasi',
            'reservasi' => $reservasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi $reservasi)
    {
        return view('dashboard.reservasi.edit', [
            'title' => 'Edit Reservasi',
            'reservasi' => $reservasi,
            'pakets' => Paket::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        $rules = [
            'nama' => 'required|max:255',
            'paket_id' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
            'kontak' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Reservasi::where('id', $reservasi->id)
            ->update($validatedData);

        return redirect('/dashboard/reservasi')->with('success', 'Reservasi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi $reservasi)
    {
        Reservasi::destroy($reservasi->id);

        return redirect('/dashboard/reservasi')->with('success', 'Reservasi berhasil dihapus.');
    }
}
