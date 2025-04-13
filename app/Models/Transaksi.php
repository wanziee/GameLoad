<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
      // Tentukan nama tabel jika berbeda dengan nama model
      protected $table = 'transaksi';

      // Tentukan kolom yang bisa diisi
      protected $fillable = [
        'transaction_id',
        'id_user',
        'id_game',
        'username',
        'email',
        'id_game_user',
        'nama_game',
        'harga_diamond',
        'metode_pembayaran',
        'jumlah_diamond',
        'status',
      ];
  
      // Relasi: Transaction belongs to a User
      public function user()
      {
          return $this->belongsTo(User::class, 'user_id');
      }
  
      // Relasi: Transaction belongs to a Game
      public function game()
      {
          return $this->belongsTo(Game::class, 'game_id');
      }
  
      // Relasi: Transaction belongs to a Price
      public function price()
      {
          return $this->belongsTo(Price::class, 'price_id');
      }
  
      // Relasi: Transaction belongs to a Payment Method
      public function paymentMethod()
      {
          return $this->belongsTo(MetodePembayaran::class, 'payment_method_id');
      }
}
