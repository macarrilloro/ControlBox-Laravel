<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'book_id'];

    //Relación uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //Relación uno a muchos inversa
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
