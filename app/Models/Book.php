<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ["name","status"];

    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'library_book');
    }
    
    public function lentbooks()
    {
        return $this->hasMany(Lentbook::class);
    }

}
