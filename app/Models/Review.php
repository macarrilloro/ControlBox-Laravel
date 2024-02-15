<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'qualification', 'book_id', 'user_id'];

    //Relación uno a muchos inversa
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
