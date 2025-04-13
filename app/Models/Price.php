<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'prices';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'game_id',       // ID game
        'nama_diamond',       // nama diamond
        'jumlah_diamond',        // Jumlah item (misalnya diamond)
        'harga_diamond',         // Harga untuk jumlah item tersebut
    ];

    // Relasi: Price belongs to a Game
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    // Relasi: Price has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaksi::class, 'price_id');
    }
}
