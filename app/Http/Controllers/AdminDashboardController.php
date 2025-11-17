<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Transaksi;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalJenis = JenisBarang::count();
        $totalTransaksi = Transaksi::count();
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalBarang', 'totalJenis', 'totalTransaksi', 'totalUser'));
    }
}
