<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <title>Incidens Kar</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>
    <?php
    session_start();
    ?>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <header class="">
        <nav class="navbar navbar-expand-lg" style="padding-bottom: 0px !important;">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <h2>Incidens <em>Könyvtár</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::path() === '/' ? 'active' : '' }}">
                            <a class="nav-link" href="/">Főoldak
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::path() === 'kereses' || Request::path() === 'konyv' ? 'active' : '' }}">
                            <a class="nav-link" href="/kereses">Keresés</a>
                        </li>
                        <li class="nav-item {{ Request::path() === 'rolunk' ? 'active' : '' }}">
                            <a class="nav-link" href="/rolunk">Rólunk</a>
                        </li>
                        <li class="nav-item {{ Request::path() === 'bejelentkezes' ? 'active' : '' }}">
                            <a class="nav-link" href="/bejelentkezes">Bejelentkezés</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if (Request::path() === 'kereses' || Request::path() === 'konyv' )
        <nav class="navbar navbar-expand-lg" style="background-color: white">
            <div class="container">
                <form class="form-inline" method="get" id="form" title="" action="/kereses">
                    <div class=" form-row " style="flex-wrap: nowrap;">
                        <div class="input-group mb-3">
                            <input class="form-control" id="nev" name="nev" type="search"
                                placeholder="Címe" aria-label="Search">
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control" id="isbn" name="isbn" type="search"
                                placeholder="isbn" aria-label="Search">
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control" id="szerzo" name="szerzo" type="search"
                                placeholder="Szező" aria-label="Search">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Azonosító" id="azon" name="azon" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" form="form" type="submit">Keres</button>
                            </div>
                          </div>
                    </div>
                </form>
            </div>
        </nav>
        @endif
    </header>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2020 INCIDENSKAR Co., Ltd.

                            - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                                target="_blank">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>
