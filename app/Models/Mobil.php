<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'gambar', 'plat', 'merk', 'kapasitas', 'tipe', 'tahunproduksi', 'hargasewa'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id =  uniqid();
        });
    }
}
