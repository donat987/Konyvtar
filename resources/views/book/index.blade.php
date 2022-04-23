@extends('adminlayout')
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Cím</th>
                <th scope="col">Szerző</th>
                <th scope="col">Mennyiség</th>
                <th scope="col">ISBN</th>
                <th scope="col">Elérhető</th>
                <th scope="col">Kiadó</th>
                <th scope="col">Megtekintés</th>
                <th scope="col">Módosítás</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cime = "";
            $isbnszama= "";
            $azonosito = "";
            $szerzo = "";
            if(isset($_GET["nev"])){
                $cime = $_GET["nev"];
            }
            if(isset($_GET["isbn"])){
                $isbenszama = $_GET["isbn"];
            }
            if(isset($_GET["szerzo"])){
                $szerzo = $_GET["szerzo"];
            }
            if(isset($_GET["azon"])){
                $azonosito = $_GET["azon"];
            }
            $konyv = DB::select("select * from books where name like '%".$cime."%' and id like '%".$azonosito."%' and author like '%".$szerzo."%' and isbn like '%".$isbnszama."%' order by name ");
            foreach ($konyv as $k) {
                echo '<tr>';
                echo '<th>' .substr($k->name, 0, 25) . '...'  . '</th>';
                echo '<th>' .substr($k->author, 0, 10) . '...'  . '</th>';
                echo '<th>' . $k->stock . ' db</th>';
                echo '<th>' . $k->ISBN . '</th>';
                if($k->delete == 1){
                    echo '<th>igen</th>';
                }
                else{
                    echo '<th>nem</th>';
                }
                echo '<th>' .substr($k->publisher, 0, 10) . '...' . '</th>';
                echo "<td><a id='" . $k->id . "' href='konyvek/" . $k->id . "' type='button' class='btn btn-dark'>Megtekintés</a></td>";
                echo "<td><a id='" . $k->id . "' href='konyvek/" . $k->id . "/modositas' type='button' class='btn btn-dark'>Modosítás</a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
@endsection
