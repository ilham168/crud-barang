<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function index()
    {
        $jenisBarang = JenisBarang::paginate(10);
        return view('jenisbarang.index', compact('jenisBarang'));
    }

    public function create()
    {
        return view('jenisbarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:100',
        ]);

        JenisBarang::create($request->all());
        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil ditambahkan!');
    }

    public function edit(JenisBarang $jenisBarang)
    {
        return view('jenisbarang.edit', compact('jenisBarang'));
    }

    public function update(Request $request, JenisBarang $jenisBarang)
    {
        $request->validate(['nama_jenis' => 'required|string|max:100']);
        $jenisBarang->update($request->all());
        return redirect()->route('jenis-barang.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(JenisBarang $jenisBarang)
    {
        $jenisBarang->delete();
        return redirect()->route('jenis-barang.index')->with('success', 'Data berhasil dihapus!');
    }
}
