<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    use HasFactory;
    protected $table = 'sopir';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nama',
        'nomorHP',
        'hargaJasa',
        'gambar',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id =  uniqid();
        });
    }

}