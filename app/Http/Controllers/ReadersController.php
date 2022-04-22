<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReadersController extends Controller
{
    public function show($id)
    {
        $olvaso = Reader::find($id);
        return view('user.show', compact('olvaso'));
    }

    public function index()
    {
        return view('user.index');
    }
    public function create()
    {
        return view('user.create');
    }
    public function edit($id)
    {
        $olvaso = Reader::find($id);
        return view('user.edit', compact('olvaso'));
    }
    public function destroy(Reader $readers)
    {
        $readers->delete();
        return redirect('kolcsonzok');
    }
    public function update(Request $request, Reader $readers)
    {
        if (!$_POST["inputname"]) {
            echo "Kötelező a nevet megadni!";
        } else if (!$_POST["inputdate"]) {
            echo "Kötelező a születési dátum!";
        } else if (!$_POST["inputstudent"]) {
            echo "Kötelező a tanulmányi állapot!";
        } else if (!$_POST["inputmobil"]) {
            echo "Kötelező a mobil!";
        } else if (!$_POST["inputemail"]) {
            echo "Kötelező az email!";
        } else if (!$_POST["inputmothername"]) {
            echo "Kötelező az anyja neve!";
        } else if (!$_POST["inputtown"]) {
            echo "Kötelező a település megadása!";
        } else if (!$_POST["inputpersonid"]) {
            echo "Kötelező a személyi szám!";
        } else if (!$_POST["inputstreet"]) {
            echo "Kötelező az utca!";
        } else if (!$_POST["inputhouseNumber"]) {
            echo "Kötelező a házszám!";
        } else if (!$_POST["inputtownid"]) {
            echo "Kötelező az irányítószám!";
        } else {
            $inputname = $_POST["inputname"];
            $inputdate = $_POST["inputdate"];
            $inputstudent = $_POST["inputstudent"];
            $inputmobil = $_POST["inputmobil"];
            $inputemail = $_POST["inputemail"];
            $inputmothername = $_POST["inputmothername"];
            $inputpersonid = $_POST["inputpersonid"];
            $inputtown = $_POST["inputtown"];
            $inputstreet = $_POST["inputstreet"];
            $inputhouseNumber = $_POST["inputhouseNumber"];
            $inputtownid = $_POST["inputtownid"];
            $readers->update([
                "name" => $inputname,
                "dateOfBirth" => $inputdate,
                "mobilNumber" => $inputmobil,
                "email" => $inputemail,
                "townID" => $inputtownid,
                "town" => $inputtown,
                "street" => $inputstreet,
                "houseNumber" => $inputhouseNumber,
                "motherName" => $inputmothername,
                "student" => $inputstudent,
                "personID" => $inputpersonid
            ]);
            echo "Sikeres módosítás!";
        }
    }
    public function store(Request $request)
    {
        if (!$_POST["inputname"]) {
            echo "Kötelező a nevet megadni!";
        } else if (!$_POST["inputdate"]) {
            echo "Kötelező a születési dátum!";
        } else if (!$_POST["inputstudent"]) {
            echo "Kötelező a tanulmányi állapot!";
        } else if (!$_POST["inputmobil"]) {
            echo "Kötelező a mobil!";
        } else if (!$_POST["inputemail"]) {
            echo "Kötelező az email!";
        } else if (!$_POST["inputmothername"]) {
            echo "Kötelező az anyja neve!";
        } else if (!$_POST["inputtown"]) {
            echo "Kötelező a település megadása!";
        } else if (!$_POST["inputpersonid"]) {
            echo "Kötelező a személyi szám!";
        } else if (!$_POST["inputstreet"]) {
            echo "Kötelező az utca!";
        } else if (!$_POST["inputhouseNumber"]) {
            echo "Kötelező a házszám!";
        } else if (!$_POST["inputtownid"]) {
            echo "Kötelező az irányítószám!";
        } else {
            $inputname = $_POST["inputname"];
            $inputdate = $_POST["inputdate"];
            $inputstudent = $_POST["inputstudent"];
            $inputmobil = $_POST["inputmobil"];
            $inputemail = $_POST["inputemail"];
            $inputmothername = $_POST["inputmothername"];
            $inputpersonid = $_POST["inputpersonid"];
            $inputtown = $_POST["inputtown"];
            $inputstreet = $_POST["inputstreet"];
            $inputhouseNumber = $_POST["inputhouseNumber"];
            $inputtownid = $_POST["inputtownid"];
            Reader::create([
                "name" => $inputname,
                "dateOfBirth" => $inputdate,
                "mobilNumber" => $inputmobil,
                "email" => $inputemail,
                "townID" => $inputtownid,
                "town" => $inputtown,
                "street" => $inputstreet,
                "houseNumber" => $inputhouseNumber,
                "motherName" => $inputmothername,
                "type" => $inputstudent,
                "personID" => $inputpersonid
            ]);
            echo "Sikeres hozzáadás!";
        }
    }
}
