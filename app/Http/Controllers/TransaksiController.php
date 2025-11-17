<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
public function index()
{
    $transaksi = Transaksi::with('barang')->paginate(10);
    $totalPenjualan = Transaksi::sum('total_harga'); 

    return view('transaksi.index', compact('transaksi', 'totalPenjualan'));
}
    public function create()
    {
        $barang = Barang::all();
        return view('transaksi.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $total_harga = $barang->harga_jual * $request->jumlah;

        // kurangi stok
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok tidak mencukupi!']);
        }

        $barang->stok -= $request->jumlah;
        $barang->save();

        Transaksi::create([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function destroy(Transaksi $transaksi)
    {
        // Kembalikan stok jika dihapus
        $barang = $transaksi->barang;
        $barang->stok += $transaksi->jumlah;
        $barang->save();

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
