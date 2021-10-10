<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Paket;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Reservasi;
use App\Models\Umkm;
use App\Models\Wisata;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('landingpage.index', [
            'title' => 'Home',
            'pakets' => Paket::all(),
            'umkms' => Umkm::latest()->paginate(6),
            'galeris' => Galeri::latest()->paginate(9),
            'pengumumans' => Pengumuman::latest()->paginate(6)
        ]);
    }

    public function artikel()
    {
        return view('landingpage.artikel', [
            'title' => 'Artikel',
            'artikels' => Artikel::latest()->paginate(6),
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function detail_artikel($slug)
    {
        return view('landingpage.detail_artikel', [
            'title' => 'Detail Artikel',
            'artikel' => Artikel::where('slug', $slug)->first(),
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function wisata()
    {
        return view('landingpage.wisata', [
            'title' => 'Wisata',
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function detail_wisata($slug)
    {
        return view('landingpage.detail_wisata', [
            'title' => 'Detail Wisata',
            'wisata' => Wisata::where('slug', $slug)->first(),
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function paket()
    {
        return view('landingpage.paket', [
            'title' => 'Paket',
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function reservasi()
    {
        return view('landingpage.reservasi', [
            'title' => 'Reservasi',
            'pakets' => Paket::all(),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|max:255',
            'paket_id' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
            'kontak' => 'required',
            'tanggal' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Reservasi::create($validatedData);

        $paket = Paket::where('id', $validatedData['paket_id'])->first();

        return view('landingpage.bukti', [
            'title' => 'Cetak Bukti Reservasi',
            'nama' => $validatedData['nama'],
            'paket' => $paket,
            'alamat' => $validatedData['alamat'],
            'jumlah' => $validatedData['jumlah'],
            'tanggal' => $validatedData['tanggal'],
            'kontak' => $validatedData['kontak']
        ]);
    }

    public function galeri()
    {
        return view('landingpage.galeri', [
            'title' => 'Galeri',
            'galeris' => Galeri::latest()->get()
        ]);
    }

    public function umkm()
    {
        return view('landingpage.umkm', [
            'title' => 'UMKM',
            'umkms' => Umkm::latest()->paginate(5),
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function detail_umkm($slug)
    {
        return view('landingpage.detail_umkm', [
            'title' => 'Detail UMKM',
            'umkm' => Umkm::where('slug', $slug)->first(),
            'pakets' => Paket::all(),
            'wisatas' => Wisata::latest()->paginate(4),
            'pengumumans' => Pengumuman::latest()->paginate(4)
        ]);
    }

    public function pengumuman()
    {
        return view('landingpage.pengumuman', [
            'title' => 'Pengumuman',
            'pengumumans' => Pengumuman::latest()->paginate(6)
        ]);
    }

    public function detail_pengumuman($slug)
    {
        return view('landingpage.detail_pengumuman', [
            'title' => 'Detail Pengumuman',
            'pengumuman' => Pengumuman::where('slug', $slug)->first()
        ]);
    }

    public function sejarah()
    {
        return view('landingpage.sejarah', [
            'title' => 'Sejarah'
        ]);
    }

    public function kontak()
    {
        return view('landingpage.kontak', [
            'title' => 'Kontak'
        ]);
    }
}
