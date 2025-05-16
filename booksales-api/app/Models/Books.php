<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    public function author(){
        return $this->belongsTo(Authors::class);
    }
    public function genre(){
        return $this->belongsTo(Genres::class);
    }
}
