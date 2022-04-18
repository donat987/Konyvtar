<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function show($id)
    {
        $konyv = Book::find($id);
        return view('bookmodify', compact('konyv'));
    }

    public function index()
    {
        return view('booklist');
    }
}
