<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPemesanan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pemesanan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id', 'id');
    }
}
