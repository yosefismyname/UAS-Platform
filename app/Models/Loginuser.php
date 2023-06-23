<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Loginuser extends Authenticatable
{
    protected $table = 'loginuser'; // Nama tabel sesuai dengan migrasi

    protected $primaryKey = 'id'; // Nama kolom yang digunakan sebagai primary key

    protected $fillable = ['id', 'username', 'password']; // Kolom yang dapat diisi (fillable)

    public $timestamps = false; // Nonaktifkan penggunaan kolom timestamps

    use AuthenticatableTrait;

    // Method untuk mengambil identifier pengguna (ID)
    public function getAuthIdentifierName()
    {
        return $this->primaryKey;
    }

    // Method untuk mengambil password pengguna
    public function getAuthPassword()
    {
        return $this->password;
    }
}

