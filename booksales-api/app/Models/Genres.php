<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    private $genres = [
        [
            'icon' => 'https://firebasestorage.googleapis.com/v0/b/sriusnyoba.appspot.com/o/Project%20NF%2FReact%2F1.png?alt=media&token=2f2d4917-28cf-405c-bf50-0216b10156ba',
            'name' => 'Romansa',
            'description' => 'Genre yang berfokus pada hubungan romantis.',
        ],
        [
            'icon' => 'https://firebasestorage.googleapis.com/v0/b/sriusnyoba.appspot.com/o/Project%20NF%2FReact%2F3.png?alt=media&token=6dd95c8c-23eb-4f82-81ac-707da5072856',
            'name' => 'Drama',
            'description' => 'Genre yang menekankan emosi dan konflik.',
        ],
        [
            'icon' => 'https://firebasestorage.googleapis.com/v0/b/sriusnyoba.appspot.com/o/Project%20NF%2FReact%2F4.png?alt=media&token=84d162d4-9df7-4ae2-b535-755dc29b3d01',
            'name' => 'Spiritual',
            'description' => 'Novel dengan nilai-nilai kehidupan dan religius.',
        ],
        [
            'icon' => 'https://firebasestorage.googleapis.com/v0/b/sriusnyoba.appspot.com/o/Project%20NF%2FReact%2F5.png?alt=media&token=ef612562-e62a-411d-a398-e70696ded39c',
            'name' => 'Fiksi Remaja',
            'description' => 'Fiksi yang cocok untuk kalangan muda.',
        ],
        [
            'icon' => 'https://firebasestorage.googleapis.com/v0/b/sriusnyoba.appspot.com/o/Project%20NF%2FReact%2F7.png?alt=media&token=a0649e30-2e90-4906-a18a-ea329d2dde5a',
            'name' => 'Motivasi',
            'description' => 'Buku yang memberikan inspirasi hidup.',
        ],
    ];

    public function getGenres(){
        return $this->genres;
    }
}
