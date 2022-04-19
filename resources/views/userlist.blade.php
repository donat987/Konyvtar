@extends('adminlayout')
@section('content')
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <form class="form-inline" method="post" id="form1" title="" action="action.php?action=keres">
                    <div class=" form-row " style="flex-wrap: nowrap;">
                        <div class=" form-group col-md-10">
                            <input class="form-control"  id="keres" name="keres" type="search" placeholder="Név keresése" aria-label="Search">
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" form="form1" type="submit" form="form1">Keres</button>

                    </div>
                </form>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="/kolcsonzohozzaad">Olvasó hozzáadása</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="kolcsonzo">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Név</th>
                <th scope="col">Születési idő</th>
                <th scope="col">Mobil</th>
                <th scope="col">Email cím</th>
                <th scope="col">Személyiszám</th>
                <th scope="col">Módosítás</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $olvaso = DB::select("select * from readers");
            foreach($olvaso as $o){
                echo"<tr>";
                    echo"<th>" . $o->name . "</th>";
                    echo"<th>" . $o->dateOfBirth . "</th>";
                    echo"<th>" . $o->mobilNumber . "</th>";
                    echo"<th>" . $o->email . "</th>";
                    echo"<th>" . $o->personID . "</th>";
                    echo"<td><a id='" . $o->id . "' href='kolcsonzok/" . $o->id . "' type='button' class='btn btn-dark'>Modosítás</a></td>";
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    @endsection
