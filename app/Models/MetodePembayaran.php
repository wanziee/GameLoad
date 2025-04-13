<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'metode_pembayaran';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'nama_pembayaran',         // Nama metode pembayaran
        'foto_pembayaran',  // Deskripsi metode pembayaran
        'bank_slug',  // Deskripsi metode pembayaran
        'nama_metode',  // Deskripsi metode pembayaran
        'detail_metode',  // Deskripsi metode pembayaran
    ];

    // Relasi: PaymentMethod has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaksi::class, 'metode_pembayaran_id');
    }
}
