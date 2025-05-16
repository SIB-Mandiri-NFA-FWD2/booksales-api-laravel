<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Books::create([
            'title' => 'Hujan',
            'description' => 'Kisah tentang cinta, kehilangan, dan harapan di tengah bencana.',
            'price' => 75000,
            'stock' => 20,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/items/img20220905_11493451.jpg',
            'author_id' => 1,
            'genre_id' => 2
        ]);

        Books::create([
            'title' => 'Critical Eleven',
            'description' => 'Pertemuan singkat di pesawat yang mengubah hidup dua insan.',
            'price' => 85000,
            'stock' => 18,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/items/9786020318929_Critical-Eleven.jpg',
            'author_id' => 2,
            'genre_id' => 1
        ]);
        
        Books::create([
            'title' => 'Antologi Rasa',
            'description' => 'Cerita cinta segitiga antara sahabat yang penuh rasa tak terungkap.',
            'price' => 82000,
            'stock' => 12,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/picture_meta/2023/2/5/vx5j6deswyofewdqdkjt5u.jpg',
            'author_id' => 2,
            'genre_id' => 1
        ]);
        
        Books::create([
            'title' => 'Bumi',
            'description' => 'Perjalanan Raib, Seli, dan Ali ke dunia paralel yang penuh misteri, kekuatan, dan petualangan.',
            'price' => 70000,
            'stock' => 25,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/items/9786020332956_Bumi-New-Cover.jpg',
            'author_id' => 1,
            'genre_id' => 3
        ]);
        
        Books::create([
            'title' => 'Origami Hati',
            'description' => 'Refleksi hati yang penuh luka dan harapan dalam bentuk tulisan puitis.',
            'price' => 72000,
            'stock' => 22,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/items/9789797945343_ORIGAMI-HATI-.jpg',
            'author_id' => 4,
            'genre_id' => 1
        ]);
        
        Books::create([
            'title' => '5cm',
            'description' => 'Kisah petualangan lima sahabat mendaki Semeru dengan penuh motivasi dan impian.',
            'price' => 79000,
            'stock' => 30,
            'cover_photo' => 'https://upload.wikimedia.org/wikipedia/id/f/f9/5_cm_%28poster%29.jpg',
            'author_id' => 5,
            'genre_id' => 5
        ]);        
    }
}
