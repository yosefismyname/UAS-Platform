<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama',
        'noHp',
        'email',
        'alamat',
    ];
}
/*
    public function user()
    {
        return $this->belongsTo(LoginUser::class, 'id', 'id');
    }

}
*/