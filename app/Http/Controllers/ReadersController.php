<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReadersController extends Controller
{
    public function show($id)
    {
        $olvaso = Reader::find($id);
        return view('usermodify', compact('olvaso'));
    }

    public function index()
    {
        return view('userlist');
    }
}
