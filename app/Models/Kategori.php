<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'kategori';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'nama_kategori',             // Nama kategori
    ];

    // Relasi: Category has many games
    public function games()
    {
        return $this->hasMany(Game::class, 'kategori_id');
    }
}
