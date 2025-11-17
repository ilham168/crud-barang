<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'barang_id', 'jumlah', 'total_harga', 'tanggal_transaksi'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
