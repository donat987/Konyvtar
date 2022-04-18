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
                        <a class="nav-link active" href="/kolcsonzok">Olvasó felvétele/módosítás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/konyvek">Könyvek felvétele/módosítás</a>
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
                <form class="form-inline" method="post" id="form" title="" action="/action.php?action=keres">
                    <div class=" form-row " style="flex-wrap: nowrap;">
                        <div class=" form-group col-md-10">
                            <input class="form-control"  id="keres" name="keres" type="search" placeholder="Név keresése" aria-label="Search">
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" form="form" type="submit">Keres</button>

                    </div>
                </form>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="/kolcsonzohozzaad">Olvasó hozzáadása</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="kolcsonzo">
        <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=felhasznalofelvetel">
            <center><p id="hiba"></p></center>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputname">Név</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Név">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputdate">Születési dátum</label>
                    <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputemail">Diák</label>
                    <select id="inputstudent" class="form-control">
                        <option selected>válassz...</option>
                        <option value="0">nem</option>
                        <option value="1">igen</option>
                      </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputmobil">Telefonszám</label>
                      <input type="tel" class="form-control" id="inputmobil" placeholder="Telefonszám" value="+36">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputemail">Email</label>
                      <input type="email" class="form-control" id="inputemail" placeholder="Emailcím">
                    </div>
                  </div>
                <div class="form-row">
                    <div class="form-group col-md-4" >
                        <label for="inputmothername">Anyja neve</label>
                        <input type="text" class="form-control" id="inputmothername" placeholder="Anyja neve">
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="inputpersonid">Személyigazolvány szám</label>
                        <input type="text" class="form-control" id="inputpersonid" placeholder="Személyigazolvány szám">
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="inputtown">Település</label>
                        <input type="text" class="form-control" id="inputtown" placeholder="Település">
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputstreet">Utca</label>
                    <input type="text" class="form-control" id="inputstreet" placeholder="Utca">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputhouseNumber">Házszám / emelet / ajtó</label>
                    <input type="text" class="form-control" id="inputhouseNumber" placeholder="Házszám / emelet / ajtó">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputtownid">Irányítószám</label>
                    <input type="text" class="form-control" id="inputtownid" placeholder="Irányítószám">
                  </div>
                </div>
                <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Regisztáció</button>
              </form>
    </div>
    <script>
        $("#form1").submit(function (event) {
            event.preventDefault();
            var a = {inputname: $('#inputname').val()};
            var b = {inputdate: $('#inputdate').val()};
            var c = {inputstudent: $('#inputstudent').val()};
            var d = {inputmobil: $('#inputmobil').val()};
            var e = {inputemail: $('#inputemail').val()};
            var f = {inputmothername: $('#inputmothername').val()};
            var g = {inputpersonid: $('#inputpersonid').val()};
            var h = {inputtown: $('#inputtown').val()};
            var i = {inputstreet: $('#inputstreet').val()};
            var j = {inputhouseNumber: $('#inputhouseNumber').val()};
            var k = {inputtownid: $('#inputtownid').val()};
            $.ajax({
                url: "/action.php?action=felhasznalofelvetel",
                method: "post",
                data: {inputname: a.inputname, inputdate: b.inputdate, inputstudent: c.inputstudent, inputmobil: d.inputmobil, inputemail: e.inputemail, inputmothername: f.inputmothername, inputpersonid: g.inputpersonid, inputtown: h.inputtown, inputstreet: i.inputstreet, inputhouseNumber: j.inputhouseNumber, inputtownid: k.inputtownid },
                success: function (data)
                {
                    if (data == "") {
                        //window.location.assign("?menu=jatek")
                    } else {
                        $('#hiba').html(data);
                    }
                }
            });

        });
    </script>



     <!-- Bootstrap core JavaScript -->
     <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


     <!-- Additional Scripts -->
     <script src="{{asset('assets/js/custom.js')}}"></script>
     <script src="{{asset('assets/js/owl.js')}}"></script>
     <script src="{{asset('assets/js/slick.js')}}"></script>
     <script src="{{asset('assets/js/isotope.js')}}"></script>
     <script src="{{asset('assets/js/accordions.js')}}"></script>


  </body>

</html>
