<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use Illuminate\Support\Str;

class GenerateGameSlugs extends Command
{
    protected $signature = 'game:generate-slugs';
    protected $description = 'Generate slugs for games from their names';

    public function handle()
    {
        // Ambil semua game yang slug-nya null
        $games = Game::whereNull('slug')->get();

        foreach ($games as $game) {
            // Buat slug dari nama_game
            $slug = Str::slug($game->nama_game); // Gunakan nama_game

            // Pastikan slug unik
            $originalSlug = $slug;
            $counter = 1;

            while (Game::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Simpan slug ke database
            $game->slug = $slug;
            $game->save();

            // Output di terminal
            $this->info("Slug untuk game '{$game->nama_game}' telah dibuat: {$slug}");
        }

        $this->info('Semua slug berhasil dibuat.');
    }
}
