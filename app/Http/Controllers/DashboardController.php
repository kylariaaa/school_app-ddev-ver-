<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $namaAdmin = "Bapak Shulthan";
        $jumlahSiswa = "150";
        $jumlahGuru = "15";

        return view('dashboard', data: compact('namaAdmin', 'jumlahSiswa', 'jumlahGuru'));
    }
}
