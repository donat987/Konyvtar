@extends('adminlayout')
@section('content')
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="inputname">Cím</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Cím" value="{{ $konyv->name }}" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputdate">Megjelenés</label>
                        <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum"
                            value="{{ $konyv->appearance }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputcategory">Kategoria</label>
                            <?php
                            $category = DB::select('SELECT * FROM categories');
                            if (isset($category)) {
                                foreach ($category as $c) {
                                    if ($c->id == $konyv->categoryID) {
                                        echo"<input type='text' class='form-control' id='kateg' value='" . $c->category . "' readonly>";
                                    }
                                }
                            }
                            ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputlanguage">Nyelv</label>
                            <?php
                            $languages = DB::select('SELECT * FROM languages');
                            if (isset($languages)) {
                                foreach ($languages as $l) {
                                    if ($l->id == $konyv->languageID) {
                                        echo"<input type='text' class='form-control' id='nyelve' value='" . $l->language . "' readonly>";
                                    }
                                }
                            }
                            ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputszerzo">Szerő</label>
                        <input type="text" class="form-control" id="inputszerzo" placeholder="Szerző"
                            value="{{ $konyv->author }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputkiado">Kiadó</label>
                        <input type="text" class="form-control" id="inputkiado" placeholder="Kiadó neve"
                            value="{{ $konyv->publisher }}" readonly>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="inputisbn">ISBN</label>
                        <input type="text" class="form-control" id="inputisbn" placeholder="ISBN"
                            value="{{ $konyv->ISBN }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputar">Ár</label>
                        <input type="text" class="form-control" id="inputar" placeholder="Ár" value="{{ $konyv->price }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputmennyiseg">Mennyiség</label>
                        <input type="text" class="form-control" id="inputmennyiseg" placeholder="Mennyiség" value="{{ $konyv->stock }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputid">Elérhető?</label>
                        <?php
                        if($konyv->delete == 1){
                            echo"<input type='text' class='form-control' id='inputid' value='Igen' readonly>";
                        }else{
                            echo"<input type='text' class='form-control' id='inputid' value='Nem' readonly>";
                        }
                        ?>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTartalom">Example textarea</label>
                    <textarea class="form-control" id="inputTartalom" rows="3" readonly>{{ $konyv->content }}</textarea>
                </div>
            </div>
            <div class="form-group col-md-2">
                <img src='/images/{{ $konyv->picture }}'>
            </div>
        </div>
        <a href="/konyvek" class="btn btn-primary btn-lg btn-block">Vissza</a>
@endsection
