<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function showDashboard()
    {
        $kategoriMobileGamesId = 1;
        $kategoriPCGamesId = 2;
        $kategoriVouchersId = 3;
        $transaksi = Transaksi::latest()->take(5)->get();
        $totalUsers = User::count();
        // Hitung jumlah game dengan kategori Mobile Games
        $totalMobileGames = Game::where('kategori_id', $kategoriMobileGamesId)->count();
        $totalPCGames = Game::where('kategori_id', $kategoriPCGamesId)->count();
        $totalVouchers = Game::where('kategori_id', $kategoriVouchersId)->count();

        $popularGames = DB::table('transaksi')
        ->join('games', function ($join) {
            $join->on(DB::raw('transaksi.nama_game COLLATE utf8mb4_general_ci'), '=', 'games.nama_game');
        })
        ->join('kategori', 'games.kategori_id', '=', 'kategori.id')
        ->select(
            'transaksi.nama_game',
            'kategori.nama_kategori as kategori',
            DB::raw('COUNT(*) as total_transaksi')
        )
        ->groupBy('transaksi.nama_game', 'kategori.nama_kategori')
        ->orderByDesc('total_transaksi')
        ->limit(5)
        ->get();
    
        return view('admin.adminDashboard',compact('totalMobileGames','totalPCGames', 'transaksi', 'totalVouchers', 'totalUsers','popularGames'));

    }



}
