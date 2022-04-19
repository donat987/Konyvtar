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
                            <a class="nav-link active" href="/kolcsonzohozzaad">Olvasó hozzáadása</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="kolcsonzo">
        <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=felhasznalomodositasa">
            <center><p id="hiba"></p></center>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputname">Név</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Név" value="{{$olvaso->name}}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputdate">Születési dátum</label>
                    <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum" value="{{$olvaso->dateOfBirth}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputemail">Diák</label>
                    <select id="inputstudent" class="form-control">
                        <?php
                        if($olvaso->student == 0){
                            echo"<option >válassz...</option>";
                            echo"<option selected value='0' >nem</option>";
                            echo"<option value='1'>igen</option>";
                        }
                        else{
                            echo"<option >válassz...</option>";
                            echo"<option value='0'>nem</option>";
                            echo"<option selected value='1'>igen</option>";
                        }
                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputmobil">Telefonszám</label>
                      <input type="tel" class="form-control" id="inputmobil" placeholder="Telefonszám" value="{{$olvaso->mobilNumber}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputemail">Email</label>
                      <input type="email" class="form-control" id="inputemail" placeholder="Emailcím" value="{{$olvaso->email}}">
                    </div>
                  </div>
                <div class="form-row">
                    <div class="form-group col-md-4" >
                        <label for="inputmothername">Anyja neve</label>
                        <input type="text" class="form-control" id="inputmothername" placeholder="Anyja neve" value="{{$olvaso->motherName}}">
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="inputpersonid">Személyigazolvány szám</label>
                        <input type="text" class="form-control" id="inputpersonid" placeholder="Személyigazolvány szám" value="{{$olvaso->personID}}">
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="inputtown">Település</label>
                        <input type="text" class="form-control" id="inputtown" placeholder="Település" value="{{$olvaso->town}}">
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputstreet">Utca</label>
                    <input type="text" class="form-control" id="inputstreet" placeholder="Utca" value="{{$olvaso->street}}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputhouseNumber">Házszám / emelet / ajtó</label>
                    <input type="text" class="form-control" id="inputhouseNumber" placeholder="Házszám / emelet / ajtó" value="{{$olvaso->houseNumber}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputtownid">Irányítószám</label>
                    <input type="text" class="form-control" id="inputtownid" placeholder="Irányítószám" value="{{$olvaso->townID}}">
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4" >
                        <label for="inputregistration">Regisztrálva</label>
                        <input type="text" class="form-control" id="inputregistration" placeholder="Regisztralva" value="{{$olvaso->created_at}}" readonly>
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="inputmodify">Módosítva</label>
                        <input type="text" class="form-control" id="inputmodify" placeholder="Módosítva" value="{{$olvaso->updated_at}}" readonly>
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="inputid">ID</label>
                        <input type="text" class="form-control" id="inputid" placeholder="Település" value="{{$olvaso->id}}" readonly>
                    </div>
                </div>

                <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Módosítás</button>
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
            var l = {inputid: $('#inputid').val()};
            $.ajax({
                url: "/action.php?action=felhasznalomodositasa",
                method: "post",
                data: {inputname: a.inputname, inputdate: b.inputdate, inputstudent: c.inputstudent, inputmobil: d.inputmobil, inputemail: e.inputemail, inputmothername: f.inputmothername, inputpersonid: g.inputpersonid, inputtown: h.inputtown, inputstreet: i.inputstreet, inputhouseNumber: j.inputhouseNumber, inputtownid: k.inputtownid, inputid: l.inputid},
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
@endsection
