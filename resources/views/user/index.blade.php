@extends('adminlayout')
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Név</th>
                <th scope="col">Születési idő</th>
                <th scope="col">Mobil</th>
                <th scope="col">Email cím</th>
                <th scope="col">Személyiszám</th>
                <th scope="col">Megtekintés</th>
                <th scope="col">Módosítás</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $olvaso = DB::select('select * from readers');
            foreach ($olvaso as $o) {
                echo '<tr>';
                echo '<th>' . $o->name . '</th>';
                echo '<th>' . $o->dateOfBirth . '</th>';
                echo '<th>' . $o->mobilNumber . '</th>';
                echo '<th>' . $o->email . '</th>';
                echo '<th>' . $o->personID . '</th>';
                echo "<td><a id='" . $o->id . "' href='kolcsonzok/" . $o->id . "' type='button' class='btn btn-dark'>Megtekintés</a></td>";
                echo "<td><a id='" . $o->id . "' href='kolcsonzok/" . $o->id . "/modositas' type='button' class='btn btn-dark'>Modosítás</a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
@endsection
