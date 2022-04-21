@extends('adminlayout')
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Cím</th>
                <th scope="col">Szerző</th>
                <th scope="col">Mennyiség</th>
                <th scope="col">Ár</th>
                <th scope="col">Kiadó</th>
                <th scope="col">Megtekintés</th>
                <th scope="col">Módosítás</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $konyv = DB::select('select * from books');
            foreach ($konyv as $k) {
                echo '<tr>';
                echo '<th>' . $k->ISBN . '</th>';
                echo '<th>' . $k->name . '</th>';
                echo '<th>' . $k->author . '</th>';
                echo '<th>' . $k->stock . '</th>';
                echo '<th>' . $k->price . '</th>';
                echo '<th>' . $k->publisher . '</th>';
                echo "<td><a id='" . $k->id . "' href='konyvek/" . $k->id . "' type='button' class='btn btn-dark'>Megtekintés</a></td>";
                echo "<td><a id='" . $k->id . "' href='konyvek/" . $k->id . "/modositas' type='button' class='btn btn-dark'>Modosítás</a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
@endsection
