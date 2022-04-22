@extends('adminlayout')
@section('content')
    <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=kolcsonnev">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputregistration">Kölcsönző neve:</label>
                <select id="nevvalaszt" class="form-select" aria-label="Default select example" name='redersid'
                    onchange='fun()'>
                    <option selected>Open this select menu</option>
                    <?php
                    $olvaso = DB::select('select * from readers');
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
                url: "/action.php?action=kolcsonnev",
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
