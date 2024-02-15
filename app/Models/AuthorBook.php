<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'book_id'];

    //Relación uno a muchos inversa
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    //Relación uno a muchos inversa
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
