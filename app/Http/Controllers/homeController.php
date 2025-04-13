<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Game;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        // Ambil kategori game dan game yang sedang dipromosikan
        // $allGames = Game::with('kategori')->get(); // Load games with their categories
        $categories = Kategori::all(); // Daftar kategori
        $popularGames = Game::limit(8)->with('kategori')->get(); // Load 5 popular games with categories
        $allGamesHome = Game::inRandomOrder()->limit(12)->with('kategori')->get();

        return view('user.index', compact('categories','popularGames','allGamesHome'));
    }
}
