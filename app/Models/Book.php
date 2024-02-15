<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'photo_path'];

    //Relación uno a muchos

    public function reviews()
    {
        return $this->hasMany(Review::class)->orderBy('id', 'desc');
    }
    //Relación muchos a muchos
    public function categories()
    {
        return $this->hasMany(CategoryBook::class);
    }
    //Relación uno a muchos
    public function authors()
    {
        return $this->hasMany(AuthorBook::class);
    }
}
