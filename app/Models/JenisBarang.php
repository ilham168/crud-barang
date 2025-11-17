<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barang';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama_jenis',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'jenis_barang_id');
    }
}
