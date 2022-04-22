<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BooksController extends Controller
{
    public function show($id)
    {
        $konyv = Book::find($id);
        return view('book.show', compact('konyv'));
    }

    public function index()
    {
        return view('book.index');
    }
    public function create()
    {
        return view('book.create');
    }
    public function edit($id)
    {
        $konyv = Book::find($id);
        return view('book.edit', compact('konyv'));
    }
    public function destroy(Book $books)
    {
        $books->delete();
        return redirect('konyvek');
    }
    public function update(Request $request, Book $books)
    {
        if (!$_POST["inputname"]) {
            echo "Kötelező a címet megadni!";
        } else if (!$_POST["inputdate"]) {
            echo "Kötelező a megjelenés dátumát megadni!";
        } else if (!$_POST["inputcategory"]) {
            echo "Kötelező a kategória!";
        } else if (!$_POST["inputlanguage"]) {
            echo "Kötelező a könyv nyelvét megadni!";
        } else if (!$_POST["inputszerzo"]) {
            echo "Kötelező az szerzőt megadni!";
        } else if (!$_POST["inputisbn"]) {
            echo "Kötelező az ISBN-szám!";
        } else if (!$_POST["inputkiado"]) {
            echo "Kötelező a kiadó megadása!";
        } else if (!$_POST["inputar"]) {
            echo "Kötelező a könyv árát megadni!";
        } else if (!$_POST["inputmennyiseg"]) {
            echo "Kötelező a könyv mennyiségének megadása!";
        } else {
            $inputname = $_POST["inputname"];
            $inputdate = $_POST["inputdate"];
            $inputcategory = $_POST["inputcategory"];
            $inputlanguage = $_POST["inputlanguage"];
            $inputszerzo = $_POST["inputszerzo"];
            $inputisbn = $_POST["inputisbn"];
            $inputkiado = $_POST["inputkiado"];
            $inputar = $_POST["inputar"];
            $inputmennyiseg = $_POST["inputmennyiseg"];
            $inputTartalom = $_POST["inputTartalom"];
            $books->update([
                "name" => $inputname,
                "ISBN" => $inputisbn,
                "author" => $inputszerzo,
                "appearance" => $inputdate,
                "stock" => $inputmennyiseg,
                "delete" => '1',
                "publisher" => $inputkiado,
                "content" =>  $inputTartalom,
                "price" => $inputar,
                "categoryID" => $inputcategory,
                "languageID" => $inputlanguage
            ]);
            echo "Sikeres módosítás!";
        }
    }
    public function store(Request $request)
    {
        if (!$_POST["inputname"]) {
            echo "Kötelező a címet megadni!";
        } else if (!$_POST["inputdate"]) {
            echo "Kötelező a megjelenés dátumát megadni!";
        } else if (!$_POST["inputcategory"]) {
            echo "Kötelező a kategória!";
        } else if (!$_POST["inputlanguage"]) {
            echo "Kötelező a könyv nyelvét megadni!";
        } else if (!$_POST["inputszerzo"]) {
            echo "Kötelező az szerzőt megadni!";
        } else if (!$_POST["inputisbn"]) {
            echo "Kötelező az ISBN-szám!";
        } else if (!$_POST["inputkiado"]) {
            echo "Kötelező a kiadó megadása!";
        } else if (!$_POST["inputar"]) {
            echo "Kötelező a könyv árát megadni!";
        } else if (!$_POST["inputmennyiseg"]) {
            echo "Kötelező a könyv mennyiségének megadása!";
        } else {
            $kepnev = $_FILES["inputcustomFile"]["name"];
            $fajl = substr($kepnev, 0, strripos($kepnev, '.'));
            $nevm = substr($kepnev, strripos($kepnev, '.'));
            $fajlmeret = $_FILES["inputcustomFile"]["size"];
            $fajltipus = array('.PNG', '.png');
            $ujnev1 = "";
            if ($_FILES["inputcustomFile"]["name"] != "") {
                $ujnev1 = md5($fajl) . rand() . $nevm;
                move_uploaded_file($_FILES["inputcustomFile"]["tmp_name"], "images/" . $ujnev1);
            }
            $inputname = $_POST["inputname"];
            $inputdate = $_POST["inputdate"];
            $inputcategory = $_POST["inputcategory"];
            $inputlanguage = $_POST["inputlanguage"];
            $inputszerzo = $_POST["inputszerzo"];
            $inputisbn = $_POST["inputisbn"];
            $inputkiado = $_POST["inputkiado"];
            $inputar = $_POST["inputar"];
            $inputmennyiseg = $_POST["inputmennyiseg"];
            $inputTartalom = $_POST["inputTartalom"];
            Book::create([
                "name" => $inputname,
                "ISBN" => $inputisbn,
                "author" => $inputszerzo,
                "appearance" => $inputdate,
                "stock" => $inputmennyiseg,
                "publisher" => $inputkiado,
                "content" =>  $inputTartalom,
                "picture" => $ujnev1,
                "price" => $inputar,
                "delete" => '1',
                "categoryID" => $inputcategory,
                "languageID" => $inputlanguage
            ]);
            echo "Sikeres hozzáadás!";
        }
    }
}
