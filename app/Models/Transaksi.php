<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'tanggalTransaksi',
        'tanggalSewa',
        'mulaiSewa',
        'lamaSewa',
        'idMobil',
        'idCustomer',
        'idSopir',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'idMobil', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCustomer', 'id');
    }

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'idSopir', 'id');
    }
}
