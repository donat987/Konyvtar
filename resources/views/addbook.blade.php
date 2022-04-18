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
                        <a class="nav-link  active" href="/konyvek">Könyvek felvétele/módosítás</a>
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
                <form class="form-inline" method="post" id="form" title="" action="action.php?action=keres">
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
                            <a class="nav-link active" href="/konyvhozzaad">Könyv hozzáadása</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="kolcsonzo">
        <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=konyvfelvetel">
            <center><p id="hiba"></p></center>
                <div class="form-row">
                  <div class="form-group col-md-6">
                  <div class="form-row">
                    <label for="inputname">Cím</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Cím">
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-4">
                    <label for="inputdate">Megjelenés</label>
                    <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum" >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputcategory">Kategoria</label>
                    <select id="inputcategory" class="form-control">
                        <?php
                        $category = DB::select("SELECT * FROM categories");
                        
                        if (isset($category)) {
                          echo"<option selected>válassz...</option>";
                          foreach($category as $c){
                              echo"<option value=$c->id>".$c->category."</option>";
                          }
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputlanguage">Nyelv</label>
                    <select id="inputlanguage" class="form-control">
                        <?php
                        $languages = DB::select("SELECT * FROM languages");

                        if (isset($languages)) {
                          echo"<option selected>válassz...</option>";
                          foreach($languages as $l){
                              echo"<option value=$l->id>".$l->language."</option>";
                          }
                        }
                        ?>
                      </select>
                  </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputszerzo">Szerő</label>
                      <input type="text" class="form-control" id="inputszerzo" placeholder="Szerző">
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="inputkiado">Kiadó</label>
                        <input type="text" class="form-control" id="inputkiado" placeholder="Kiadó neve">
                    </div>
                  </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-12">
                      <label for="inputisbn">ISBN</label>
                      <input type="text" class="form-control" id="inputisbn" placeholder="ISBN">
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputar">Ár</label>
                    <input type="text" class="form-control" id="inputar" placeholder="Ár">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputmennyiseg">Mennyiség</label>
                    <input type="text" class="form-control" id="inputmennyiseg" placeholder="Mennyiség">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputid">ID</label>
                    <input type="text" class="form-control" id="inputid" placeholder="ID">
                  </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12" >
                    <div class="custom-file">
                      <div class="mb-3">
                        <label for="inputcustomFile" class="form-label">Képfeltöltés</label>
                        <input class="form-control" type="file" id="inputcustomFile">
                      </div>
                    </div>
                      </div>
                      </div>
                  </div>
                  <div class="form-group col-md-2">
                    
                  </div>
                </div>
                <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Felvétel</button>
              </form>
    </div>

    <script>
        $("#form1").submit(function (event) {
            event.preventDefault();
            var name = document.getElementById('inputcustomFile');
            var a = {inputname: $('#inputname').val()};
            var b = {inputdate: $('#inputdate').val()};
            var c = {inputcategory: $('#inputcategory').val()};
            var d = {inputlanguage: $('#inputlanguage').val()};
            var e = {inputszerzo: $('#inputszerzo').val()};
            var f = {inputisbn: $('#inputisbn').val()};
            var g = {inputkiado: $('#inputkiado').val()};
            var h = {inputcustomFile: name.files.item(0).name};
            var i = {inputar: $('#inputar').val()};
            var j = {inputmennyiseg: $('#inputmennyiseg').val()};
            var k = {inputid: $('#inputid').val()};
            $.ajax({
                url: "/action.php?action=konyvfelvetel",
                method: "post",
                data: {inputname: a.inputname, inputdate: b.inputdate, inputcategory: c.inputcategory, inputlanguage: d.inputlanguage, inputszerzo: e.inputszerzo, inputisbn: f.inputisbn, inputkiado: g.inputkiado, inputcustomFile: h.inputcustomFile, inputar: i.inputar, inputmennyiseg: j.inputmennyiseg, inputid: k.inputid},
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

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 INCIDENSKAR Co., Ltd.

            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
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


    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
