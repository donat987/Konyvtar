<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap')}}" rel="stylesheet">

    <title>Incidens Kar</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
            <p style="margin-bottom:0" class="navbar-brand"><?php
                setlocale(LC_ALL, "hu_HU.UTF8");
                $ido = explode(':', strftime("%X"))[0];
                if ($ido > 5 and $ido < 9) {
                    echo"Jó reggelt ";
                } else if ($ido > 8 and $ido < 19) {
                    echo"Jó napot ";
                } else {
                    echo"Jó estét ";
                }
                //echo explode(' ', $_SESSION["name"])[1];
                ?> !</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="/konyvkolcsonzes">Kölcsönzés
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kolcsonzok">Olvasó felvétele/módosítás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/konyvek">Könyvek felvétele/módosítás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="action.php?action=kijelentkezes">Kijelentkezés</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
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
    </header>
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




    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Additional Scripts -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('assets/js/isotope.js')}}"></script>
    <script src="{{asset('assets/js/accordions.js')}}"></script>


  </body>

</html>
