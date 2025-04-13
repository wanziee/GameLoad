<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'games';
    public $timestamps = false; // Nonaktifkan timestamp

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'nama_game',             // Nama game
        'kategori_id',      // Deskripsi game
        'foto',      // foto game
        'detail',      // detail game
        'banner',      // foto banenr game
        'logo',
        'slug',      // foto logo game
    ];

    // Relasi: Game belongs to a Category
  // Game.php
public function prices()
{
    return $this->hasMany(Price::class);
}

public function metodePembayarans()
{
    return $this->hasMany(MetodePembayaran::class);
}

public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

}
