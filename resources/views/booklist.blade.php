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
                            <a class="nav-link " href="/konyvhozzaad">Könyv hozzáadása</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="kolcsonzo">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Cím</th>
                <th scope="col">Szerző</th>
                <th scope="col">Mennyiség</th>
                <th scope="col">Ár</th>
                <th scope="col">Kiadó</th>
                <th scope="col">Módosítás</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $konyv = DB::select("select * from books");
            foreach($konyv as $k){
                echo"<tr>";
                    echo"<th>" . $k->ISBN . "</th>";
                    echo"<th>" . $k->name . "</th>";
                    echo"<th>" . $k->author . "</th>";
                    echo"<th>" . $k->stock . "</th>";
                    echo"<th>" . $k->price . "</th>";
                    echo"<th>" . $k->publisher . "</th>";
                    echo"<td><a id='" . $k->id . "' href='konyvek/" . $k->id . "' type='button' class='btn btn-dark'>Modosítás</a></td>";
                echo"</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    @endsection
