<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'januari' => Reservasi::whereMonth('tanggal', '01')->count(),
            'februari' => Reservasi::whereMonth('tanggal', '02')->count(),
            'maret' => Reservasi::whereMonth('tanggal', '03')->count(),
            'april' => Reservasi::whereMonth('tanggal', '04')->count(),
            'mei' => Reservasi::whereMonth('tanggal', '05')->count(),
            'juni' => Reservasi::whereMonth('tanggal', '06')->count(),
            'juli' => Reservasi::whereMonth('tanggal', '07')->count(),
            'agustus' => Reservasi::whereMonth('tanggal', '08')->count(),
            'september' => Reservasi::whereMonth('tanggal', '09')->count(),
            'oktober' => Reservasi::whereMonth('tanggal', '10')->count(),
            'november' => Reservasi::whereMonth('tanggal', '11')->count(),
            'desember' => Reservasi::whereMonth('tanggal', '12')->count(),
        ]);
    }
}
