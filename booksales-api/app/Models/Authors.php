<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    private $authors = [
        [
            'name' => 'Tere Liye',
            'photo' => 'https://cdn.rri.co.id/berita/Samarinda/o/1722415038108-tl01/6hm79mqifw7q1tu.png',
            'bio' => 'Penulis terkenal Indonesia dengan banyak novel populer.',
        ],
        [
            'name' => 'Ika Natassa',
            'photo' => 'https://statik.tempo.co/data/2025/04/04/id_1389478/1389478_720.jpg',
            'bio' => 'Penulis novel romance dan kehidupan urban.',
        ],
        [
            'name' => 'Dee Lestari',
            'photo' => 'https://cdn.rri.co.id/berita/Bandar_Lampung/o/1728783364343-IMG_9639/watfr1u4500mu8e.jpeg',
            'bio' => 'Penulis novel spiritual dan romansa.',
        ],
        [
            'name' => 'Boy Candra',
            'photo' => 'https://media.grasindo.id/images/authors/340/19_1676442976.png',
            'bio' => 'Penulis puisi dan novel romantis.',
        ],
        [
            'name' => 'Donny Dhirgantoro',
            'photo' => 'https://file.indonesianfilmcenter.com/uploads/2019-08/donny-dhirgantoro.jpg',
            'bio' => 'Seorang novelis dan penulis skenario Indonesia.',
        ],
    ];

    public function getAuthors(){
        return $this->authors;
    }
}
