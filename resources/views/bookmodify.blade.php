@extends('adminlayout')
@section('content')
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

    <div class="kolcsonzo">
        <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=konyvmodositasa">
            <center><p id="hiba"></p></center>
                <div class="form-row">
                  <div class="form-group col-md-6">
                  <div class="form-row">
                    <label for="inputname">Cím</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Cím" value="{{$konyv->name}}">
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-4">
                    <label for="inputdate">Megjelenés</label>
                    <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum" value="{{$konyv->appearance}}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputcategory">Kategoria</label>
                    <select id="inputcategory" class="form-control">
                        <?php
                        $category = DB::select("SELECT * FROM categories");

                        if (isset($category)) {
                          echo"<option >válassz...</option>";
                          foreach($category as $c){
                            if($c->id==$konyv->categoryID){
                              echo"<option selected value=$c->id>".$c->category."</option>";
                            }
                            else{
                              echo"<option value=$c->id>".$c->category."</option>";
                            }
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
                          echo"<option value=>válassz...</option>";
                          foreach($languages as $l){
                            if($l->id == $konyv->languageID){
                              echo"<option selected value=$l->id>".$l->language."</option>";
                            }
                            else {
                              echo"<option value=$l->id>".$l->language."</option>";
                            }
                          }

                        }
                        ?>
                      </select>
                  </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputszerzo">Szerő</label>
                      <input type="text" class="form-control" id="inputszerzo" placeholder="Szerző" value="{{$konyv->author}}">
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="inputkiado">Kiadó</label>
                        <input type="text" class="form-control" id="inputkiado" placeholder="Kiadó neve" value="{{$konyv->publisher}}">
                    </div>
                  </div>
                <div class="form-row">

                    <div class="form-group col-md-12">
                      <label for="inputisbn">ISBN</label>
                      <input type="text" class="form-control" id="inputisbn" placeholder="ISBN" value="{{$konyv->ISBN}}">
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputar">Ár</label>
                    <input type="text" class="form-control" id="inputar" placeholder="Ár" value="{{$konyv->price}}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputmennyiseg">Mennyiség</label>
                    <input type="text" class="form-control" id="inputmennyiseg" placeholder="Mennyiség" value="{{$konyv->stock}}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputid">ID</label>
                    <input type="text" class="form-control" id="inputid" placeholder="ID" value="{{$konyv->id}}">
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
                    <img src='/images/{{$konyv->picture}}'>
                  </div>
                </div>
                <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Módosítás</button>
              </form>

    </div>
    <script>
        $("#form1").submit(function (event) {
            event.preventDefault();
            var data = new FormData();
            data.append( 'inputcustomFile', $('#inputcustomFile')[0].files[0]);
            let myForm = document.getElementById('form1');
            let formData = new FormData(myForm);
            formData.append('inputname', $('#inputname').val());
            formData.append('inputdate', $('#inputdate').val());
            formData.append('inputcategory', $('#inputcategory').val());
            formData.append('inputlanguage', $('#inputlanguage').val());
            formData.append('inputszerzo', $('#inputszerzo').val());
            formData.append('inputisbn', $('#inputisbn').val());
            formData.append('inputkiado', $('#inputkiado').val());
            formData.append('inputar', $('#inputar').val());
            formData.append('inputmennyiseg', $('#inputmennyiseg').val());
            formData.append('inputid', $('#inputid').val());
            $.ajax({
                url: "/action.php?action=konyvmodositasa",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data)
                {
                    if (data != "") {
                        $('#hiba').html(data);
                    }
                }
            });
        });
    </script>
@endsection
