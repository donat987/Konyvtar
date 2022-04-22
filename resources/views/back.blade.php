@extends('adminlayout')
@section('content')
<form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=visszahoznev">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputregistration">Kölcsönző neve:</label>
            <select id="nevvalaszt" class="form-select" aria-label="Default select example" name='redersid'
                onchange='fun()'>
                <option selected>Válassz...</option>
                <?php
                $olvaso = DB::select('select readers.id as id , readers.name as name , readers.personID as personID from readers  INNER JOIN bookrentals on bookrentals.readerID = readers.id WHERE bookrentals.ok = 0 GROUP BY readers.id order by name ');
                foreach ($olvaso as $o) {
                    echo "<option value='" . $o->id . "'>" . $o->name . ' #' . $o->personID . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
</form>
<div id="nevadat"></div>
<script>
    function fun() {
        event.preventDefault();
        var a = {
            nevvalaszt: $('#nevvalaszt').val()
        };
        $.ajax({
            url: "/action.php?action=visszahoznev",
            data: {
                nevvalaszt: a.nevvalaszt
            },
            type: 'POST',
            success: function(data) {
                if (data != "") {
                    $('#nevadat').html(data);
                }
            }
        });
    }
</script>
@endsection
