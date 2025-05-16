<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Genres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genres::create([
            'name' => 'Romansa',
            'description' => 'Genre yang berfokus pada hubungan romantis.'
        ]);

        Genres::create([
            'name' => 'Drama',
            'description' => 'Genre yang menekankan emosi dan konflik.'
        ]);

        Genres::create([
            'name' => 'Spriritual',
            'description' => 'Novel dengan nilai-nilai kehidupan dan religius.'
        ]);

        Genres::create([
            'name' => 'Fiksi Remaja',
            'description' => 'Fiksi yang cocok untuk kalangan muda.'
        ]);

        Genres::create([
            'name' => 'Motivasi',
            'description' => 'Buku yang memberikan inspirasi hidup.'
        ]);
    }
}
