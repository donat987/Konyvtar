@extends('adminlayout')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form enctype='multipart/form-data' method='post' id="form1" title="" action="{{ route('konyvek.store') }}">
        @csrf
        <center>
            <p id="hiba"></p>
        </center>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <label for="inputname">Cím</label>
                    <input type="name" class="form-control" id="inputname" placeholder="Cím">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputdate">Megjelenés</label>
                        <input type="date" class="form-control" id="inputdate" placeholder="Születésidátum">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputcategory">Kategoria</label>
                        <select id="inputcategory" class="form-control">
                            <?php
                            $category = DB::select('SELECT * FROM categories');

                            if (isset($category)) {
                                echo '<option selected>válassz...</option>';
                                foreach ($category as $c) {
                                    echo "<option value=$c->id>" . $c->category . '</option>';
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
                                echo '<option selected>válassz...</option>';
                                foreach ($languages as $l) {
                                    echo "<option value=$l->id>" . $l->language . '</option>';
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
                    <div class="form-group col-md-6">
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
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="custom-file">
                            <div class="mb-3">
                                <label for="inputcustomFile" class="form-label">Képfeltöltés</label>
                                <input class="form-control" name="inputcustomFile" type="file" id="inputcustomFile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTartalom">Example textarea</label>
                <textarea class="form-control" id="inputTartalom" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" id='Submit' name='submit' class="btn btn-primary btn-lg btn-block">Felvétel</button>
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
            data.append('inputcustomFile', $('#inputcustomFile')[0].files[0]);
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
            $.ajax({
                url: "{{ route('konyvek.store') }}",
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
