<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GamesController extends Controller
{
    public function showAllGames()
    {

        $games = Game::all();
        // Load 5 popular games with categories
        return view('admin.adminGames', compact('games'));
    }


    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $categories = Kategori::all(); // Untuk dropdown kategori
        return view('admin.adminEditGame', compact('game', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        $request->validate([
            'nama_game' => 'required|string|max:255',
            'kategori_id' => 'required|exists:Kategori,id',
            'detail' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update foto jika diunggah
        if ($request->hasFile('foto')) {
            $fotoName = time() . '_foto_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('img'), $fotoName);
            $game->foto = $fotoName;
        }

        if ($request->hasFile('banner')) {
            $bannerName = time() . '_banner_' . $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move(public_path('img'), $bannerName);
            $game->banner = $bannerName;
        }

        if ($request->hasFile('logo')) {
            $logoName = time() . '_logo_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('img'), $logoName);
            $game->logo = $logoName;
        }

        // Update data lainnya
        $game->update([
            'nama_game' => $request->nama_game,
            'kategori_id' => $request->kategori_id,
            'detail' => $request->detail,
        ]);

        return redirect()->route('show.adminAllGames', $game->id)->with('success', 'Game updated successfully!');
    }




    public function showTambahGame()
    {
        $categories = Kategori::all();
        return view('admin.adminCreateGame', compact('categories'));
    }

    public function create(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_game' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori,id', // Perbaikan nama tabel
        'detail' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $slug = Str::slug($request->nama_game, '-');
    // Menyimpan foto jika ada
    $fotoName = null;
    $bannerName = null;
    $logoName = null;

    if ($request->hasFile('foto')) {
        $fotoName = time() . '_foto_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('img'), $fotoName);
    }

    if ($request->hasFile('banner')) {
        $bannerName = time() . '_banner_' . $request->file('banner')->getClientOriginalName();
        $request->file('banner')->move(public_path('img'), $bannerName);
    }

    if ($request->hasFile('logo')) {
        $logoName = time() . '_logo_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('img'), $logoName);
    }

    // Membuat game baru dan menyimpan ke database
    $game = Game::create([
        'nama_game' => $request->nama_game,
        'kategori_id' => $request->kategori_id,
        'detail' => $request->detail,
        'slug' => $slug, // Menyimpan slug otomatis
        'foto' => $fotoName,
        'banner' => $bannerName,
        'logo' => $logoName,
    ]);
    // Redirect ke halaman yang diinginkan setelah menyimpan data
    return redirect()->route('show.adminAllGames')->with('success', 'Game created successfully!');
}

}
