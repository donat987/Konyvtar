@extends('adminlayout')
@section('content')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputname">Név</label>
                <input type="name" class="form-control" id="inputname" placeholder="Név" value="{{ $olvaso->name }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputdate">Születési dátum</label>
                <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum"
                    value="{{ $olvaso->dateOfBirth }}" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputemail" readonly>Diák</label>
                <select id="inputstudent" class="form-control">
                    <?php
                    if ($olvaso->student == 0) {
                        echo '<option >válassz...</option>';
                        echo "<option selected value='0' >nem</option>";
                        echo "<option value='1'>igen</option>";
                    } else {
                        echo '<option >válassz...</option>';
                        echo "<option value='0'>nem</option>";
                        echo "<option selected value='1'>igen</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputmobil">Telefonszám</label>
                <input type="tel" class="form-control" id="inputmobil" placeholder="Telefonszám"
                    value="{{ $olvaso->mobilNumber }}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="inputemail">Email</label>
                <input type="email" class="form-control" id="inputemail" placeholder="Emailcím"
                    value="{{ $olvaso->email }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputmothername">Anyja neve</label>
                <input type="text" class="form-control" id="inputmothername" placeholder="Anyja neve"
                    value="{{ $olvaso->motherName }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputpersonid">Személyigazolvány szám</label>
                <input type="text" class="form-control" id="inputpersonid" placeholder="Személyigazolvány szám"
                    value="{{ $olvaso->personID }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputtown">Település</label>
                <input type="text" class="form-control" id="inputtown" placeholder="Település"
                    value="{{ $olvaso->town }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputstreet">Utca</label>
                <input type="text" class="form-control" id="inputstreet" placeholder="Utca" value="{{ $olvaso->street }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputhouseNumber">Házszám / emelet / ajtó</label>
                <input type="text" class="form-control" id="inputhouseNumber" placeholder="Házszám / emelet / ajtó"
                    value="{{ $olvaso->houseNumber }}" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputtownid">Irányítószám</label>
                <input type="text" class="form-control" id="inputtownid" placeholder="Irányítószám"
                    value="{{ $olvaso->townID }}" readonly>
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

        <a href="/kolcsonzok" class="btn btn-primary btn-lg btn-block">Vissza</a>
@endsection
