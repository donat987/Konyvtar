@extends('adminlayout')
@section('content')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputname">Név</label>
            <input type="name" class="form-control" id="inputname" placeholder="Név" value="{{ $olvaso->name }}"
                readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="inputdate">Születési dátum</label>
            <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum"
                value="{{ $olvaso->dateOfBirth }}" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputemail">Típus</label>
            <?php
            $readerstype = DB::select("select * from readers inner join readerstype on readers.type = readerstype.id where readers.id = '" . $olvaso->id . "'");
            if (isset($readerstype)) {
                echo "<input type='text' class='form-control' id='inputmothername' value='" . $readerstype[0]->typename . "' readonly>";
            }
            ?>
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
            <input type="email" class="form-control" id="inputemail" placeholder="Emailcím" value="{{ $olvaso->email }}"
                readonly>
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
            <input type="text" class="form-control" id="inputtown" placeholder="Település" value="{{ $olvaso->town }}"
                readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputstreet">Utca</label>
            <input type="text" class="form-control" id="inputstreet" placeholder="Utca" value="{{ $olvaso->street }}"
                readonly>
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
    <?php
    $konyvek = DB::select("SELECT * FROM `bookrentals` inner join books on books.id = bookrentals.bookID where bookrentals.readerID = '" . $olvaso->id . "' order by date desc");
    ?>
    @if (isset($konyvek[0]))
        <h3 style="padding: 10px 0px">Eddig kivett könyvei:</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Cím</th>
                    <th scope="col">Szerző</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Kivette</th>
                    <th scope="col">Visszahozta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konyvek as $o)
                    <tr>
                        <th>{{ $o->name }}</th>
                        <th>{{ $o->author }}</th>
                        <th>{{ $o->ISBN }}</th>
                        <th>{{ $o->date }}</th>
                        @if ($o->ok == 1)
                            <th>{{ $o->backDate }}</th>
                        @endif
                        @if ($o->ok == 0)
                            <th>Még nem hozta vissza</th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
    @endif
    @if (!isset($konyvek[0]))
        <h3 style="padding: 10px 0px">Eddig nem vett ki könyvet!</h3>
    @endif
@endsection
