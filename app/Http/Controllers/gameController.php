<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Price;
use App\Models\Kategori;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class gameController extends Controller
{
    // Menampilkan daftar game
    // public function index()
    // {
    //     $games = Game::all();
    //     return view('user.index', compact('games'));
    // }


  // Menampilkan daftar game berdasarkan kategori
  public function showAllGames()
    {
        $games = Game::all();
        return view('user.libraryGames', compact('games'));
    }


    public function showMobileGames()
    {
        // Fetch games where the category ID is 1
        $games = Game::where('kategori_id', 1)->get();

        // Pass the games to the view
        return view('user.libraryMobileGames', compact('games'));
    }


    public function showPCGames()
    {
        // Fetch games where the category ID is 1
        $games = Game::where('kategori_id', 2)->get();

        // Pass the games to the view
        return view('user.libraryPCGames', compact('games'));
    }

    
    public function showVouchers()
    {
        // Fetch games where the category ID is 1
        $games = Game::where('kategori_id', 3)->get();

        // Pass the games to the view
        return view('user.libraryVouchers', compact('games'));
    }








     // Menampilkan detail game yang dipilih
 public function show($slug)
 {
     // Ambil game berdasarkan id
     $game = Game::where('slug', $slug)->firstOrFail();

     // Ambil harga-harga berdasarkan game_id
     $prices = Price::where('game_id', $game->id)->get();

     // Ambil semua metode pembayaran
     $paymentMethods = MetodePembayaran::all();

     // Ambil kategori berdasarkan kategori_id
     $category = Kategori::find($game->kategori_id); // Assuming 'kategori_id' is the foreign key in the 'games' table

     // Tentukan apakah game memerlukan ID (misal kategori tertentu)
     $needsId = in_array($category->id, [1, 2]); // Misal, kategori 1 dan 2 memerlukan ID pengguna

     return view('user.show1', compact('game', 'prices', 'paymentMethods', 'category', 'needsId'));
 }


}


