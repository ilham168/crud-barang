<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisBarang;
class Barang extends Model
{
 protected $table = 'barang';
 protected $primaryKey = 'id';
 public $timestamps = true;
protected $fillable = [
    'jenis_barang_id', // tambahkan
    'nama_barang',     // tambahkan
    'satuan',
    'harga_pokok',
    'harga_jual',
    'stok',
];
// relasi barang dengan jenis
public function jenis()
{
return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
}
}
