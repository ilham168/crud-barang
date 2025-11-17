<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengaturanController extends Controller
{
    public function index()
    {
        // Ambil data pengaturan dari file JSON (bisa disimpan di storage)
        $path = storage_path('app/pengaturan.json');

        if (!File::exists($path)) {
            // jika file belum ada, buat default
            File::put($path, json_encode([
                'nama_toko' => 'Aplikasi Barang Laravel',
                'alamat' => 'Jl. Contoh No.123, Jakarta',
                'telepon' => '08123456789',
                'tema' => 'default',
            ], JSON_PRETTY_PRINT));
        }

        $pengaturan = json_decode(File::get($path), true);

        return view('pengaturan.index', compact('pengaturan'));
    }

public function update(Request $request)
{
    $path = storage_path('app/pengaturan.json');
    $dataLama = [];

    if (File::exists($path)) {
        $dataLama = json_decode(File::get($path), true);
    }

    // Jika hanya mengirim 'tema', berarti dari tombol cepat
    if ($request->has('tema') && $request->all() == ['_token' => $request->_token, 'tema' => $request->tema]) {
        $dataBaru = array_merge($dataLama, ['tema' => $request->input('tema')]);
        File::put($path, json_encode($dataBaru, JSON_PRETTY_PRINT));
        return back();
    }

    // Jika dari halaman form pengaturan penuh
    $request->validate([
        'nama_toko' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'tema' => 'required|string|max:50',
    ]);

    File::put($path, json_encode($request->all(), JSON_PRETTY_PRINT));

    return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil disimpan!');
}

    
}
