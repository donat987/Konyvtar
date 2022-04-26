@extends('adminlayout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form enctype='multipart/form-data' method='post' id="form1" title="" action="/kolcsonzok/{{ $olvaso->id }}">
        @method('PUT')
        <center>
            <p id="hiba"></p>
        </center>
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputname">Név</label>
                <input type="name" class="form-control" id="inputname" placeholder="Név" value="{{ $olvaso->name }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputdate">Születési dátum</label>
                <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum"
                    value="{{ $olvaso->dateOfBirth }}">
            </div>
            <div class="form-group col-md-2">
                <label for="inputemail">Típus</label>
                <select id="inputstudent" class="form-control">
                    <?php
                    $readerstype = DB::select("select * from readerstype ");

                    if (isset($readerstype)) {
                                echo '<option value=>válassz...</option>';
                                foreach ($readerstype as $l) {
                                    if ($l->id == $olvaso->type) {
                                        echo "<option selected value=$l->id>" . $l->typename . '</option>';
                                    } else {
                                        echo "<option value=$l->id>" . $l->typename . '</option>';
                                    }
                                }
                            }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputmobil">Telefonszám</label>
                <input type="tel" class="form-control" id="inputmobil" placeholder="Telefonszám"
                    value="{{ $olvaso->mobilNumber }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputemail">Email</label>
                <input type="email" class="form-control" id="inputemail" placeholder="Emailcím"
                    value="{{ $olvaso->email }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputmothername">Anyja neve</label>
                <input type="text" class="form-control" id="inputmothername" placeholder="Anyja neve"
                    value="{{ $olvaso->motherName }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputpersonid">Személyigazolvány szám</label>
                <input type="text" class="form-control" id="inputpersonid" placeholder="Személyigazolvány szám"
                    value="{{ $olvaso->personID }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputtown">Település</label>
                <input type="text" class="form-control" id="inputtown" placeholder="Település"
                    value="{{ $olvaso->town }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputstreet">Utca</label>
                <input type="text" class="form-control" id="inputstreet" placeholder="Utca"
                    value="{{ $olvaso->street }}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputhouseNumber">Házszám / emelet / ajtó</label>
                <input type="text" class="form-control" id="inputhouseNumber" placeholder="Házszám / emelet / ajtó"
                    value="{{ $olvaso->houseNumber }}">
            </div>
            <div class="form-group col-md-2">
                <label for="inputtownid">Irányítószám</label>
                <input type="text" class="form-control" id="inputtownid" placeholder="Irányítószám"
                    value="{{ $olvaso->townID }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputregistration">Regisztrálva</label>
                <input type="text" class="form-control" id="inputregistration" placeholder="Regisztralva"
                    value="{{ $olvaso->created_at }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputmodify">Módosítva</label>
                <input type="text" class="form-control" id="inputmodify" placeholder="Módosítva"
                    value="{{ $olvaso->updated_at }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputid">ID</label>
                <input type="text" class="form-control" id="inputid" placeholder="Település" value="{{ $olvaso->id }}"
                    readonly>
            </div>
        </div>

        <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Módosítás</button>
    </form>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#form1").submit(function(event) {
            event.preventDefault();
            event.preventDefault();
            var data = new FormData();
            let myForm = document.getElementById('form1');
            let formData = new FormData(myForm);
            formData.append('inputname', $('#inputname').val());
            formData.append('inputdate', $('#inputdate').val());
            formData.append('inputstudent', $('#inputstudent').val());
            formData.append('inputmobil', $('#inputmobil').val());
            formData.append('inputemail', $('#inputemail').val());
            formData.append('inputmothername', $('#inputmothername').val());
            formData.append('inputpersonid', $('#inputpersonid').val());
            formData.append('inputtown', $('#inputtown').val());
            formData.append('inputstreet', $('#inputstreet').val());
            formData.append('inputhouseNumber', $('#inputhouseNumber').val());
            formData.append('inputtownid', $('#inputtownid').val());
            $.ajax({
                url: "/kolcsonzok/{{ $olvaso->id }}",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data != "") {
                        $('#hiba').html(data);
                    }
                }
            });

        });
    </script>
@endsection
