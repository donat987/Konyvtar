@extends('adminlayout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form enctype='multipart/form-data' method='POST' id="form1" title="" action="/konyvek/{{ $konyv->id }}">
        @method('PUT')
        <center>
            <p id="hiba"></p>
        </center>
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="inputname">Cím</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Cím" value="{{ $konyv->name }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputdate">Megjelenés</label>
                        <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum"
                            value="{{ $konyv->appearance }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputcategory">Kategoria</label>
                        <select id="inputcategory" class="form-control">
                            <?php
                            $category = DB::select('SELECT * FROM categories');

                            if (isset($category)) {
                                echo '<option >válassz...</option>';
                                foreach ($category as $c) {
                                    if ($c->id == $konyv->categoryID) {
                                        echo "<option selected value=$c->id>" . $c->category . '</option>';
                                    } else {
                                        echo "<option value=$c->id>" . $c->category . '</option>';
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
                            $languages = DB::select('SELECT * FROM languages');

                            if (isset($languages)) {
                                echo '<option value=>válassz...</option>';
                                foreach ($languages as $l) {
                                    if ($l->id == $konyv->languageID) {
                                        echo "<option selected value=$l->id>" . $l->language . '</option>';
                                    } else {
                                        echo "<option value=$l->id>" . $l->language . '</option>';
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
                        <input type="text" class="form-control" id="inputszerzo" placeholder="Szerző"
                            value="{{ $konyv->author }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputkiado">Kiadó</label>
                        <input type="text" class="form-control" id="inputkiado" placeholder="Kiadó neve"
                            value="{{ $konyv->publisher }}">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="inputisbn">ISBN</label>
                        <input type="text" class="form-control" id="inputisbn" placeholder="ISBN"
                            value="{{ $konyv->ISBN }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputar">Ár</label>
                        <input type="text" class="form-control" id="inputar" placeholder="Ár"
                            value="{{ $konyv->price }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputmennyiseg">Mennyiség</label>
                        <input type="text" class="form-control" id="inputmennyiseg" placeholder="Mennyiség"
                            value="{{ $konyv->stock }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputelerheto">Elérhető?</label>
                        <select id="inputelerheto" class="form-control">
                            <option value=>válassz...</option>
                            <?php
                            if ($konyv->delete == 1) {
                                echo "<option selected value='1'>Igen</option>";
                                echo "<option value='0'>Nem</option>";
                            } else {
                                echo "<option value='1'>Igen</option>";
                                echo "<option selected value='0'>Nem</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTartalom">Könyv leírása</label>
                    <textarea class="form-control" id="inputTartalom" rows="3">{{ $konyv->content }}</textarea>
                </div>
            </div>
            <div class="form-group col-md-2">
                <img src='/images/{{ $konyv->picture }}'>
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
            var data = new FormData();
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
            formData.append('inputTartalom', $('#inputTartalom').val());
            formData.append('inputelerheto', $('#inputelerheto').val());
            $.ajax({
                url: "/konyvek/{{ $konyv->id }}",
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
