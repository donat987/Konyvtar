@extends('adminlayout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form enctype='multipart/form-data' method='post' id="form1" title="" action="{{ route('kolcsonzok.store') }}">
        @csrf
        <center>
            <p id="hiba"></p>
        </center>
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
                    <?php
                    $type = DB::select('SELECT * FROM readerstype');

                    if (isset($type)) {
                        foreach ($type as $l) {
                            echo "<option value=$l->id>" . $l->type . '</option>';
                        }
                    }
                    ?>
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
            <div class="form-group col-md-4">
                <label for="inputmothername">Anyja neve</label>
                <input type="text" class="form-control" id="inputmothername" placeholder="Anyja neve">
            </div>
            <div class="form-group col-md-4">
                <label for="inputpersonid">Személyigazolvány szám</label>
                <input type="text" class="form-control" id="inputpersonid" placeholder="Személyigazolvány szám">
            </div>
            <div class="form-group col-md-4">
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
                url: "{{ route('kolcsonzok.store') }}",
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
