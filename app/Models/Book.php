<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        "name",
        "ISBN",
        "author",
        "appearance",
        "stock",
        "publisher",
        "content",
        "picture",
        "price",
        "delete",
        "categoryID",
        "languageID",
    ];
    use HasFactory;
}
