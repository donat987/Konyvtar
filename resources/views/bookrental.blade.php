@extends('adminlayout')
@section('content')
<div class="kolcsonzo">
    <form enctype='multipart/form-data' method='post' id="form1" title="" action="/action.php?action=kolcsonnev">
        <select id="nevvalaszt" class="form-select" aria-label="Default select example"  name='redersid' onchange='if(this.value != 0) { this.form.submit(); }'>
            <option selected>Open this select menu</option>
            <?php
                $olvaso = DB::select("select * from readers");
                foreach($olvaso as $o){
                    echo "<option value='" . $o->id . "'>".$o->name." #".$o->personID."</option>";
                }
            ?>
        </select>
    </form>
    <div id="nevadat"></div>
</div>
<script>
     $("#form1").submit(function (event) {
        event.preventDefault();
        var a = {nevvalaszt: $('#nevvalaszt').val()};
            $.ajax({
                url: "/action.php?action=kolcsonnev",
                data: {nevvalaszt: a.nevvalaszt},
                type: 'POST',
                success: function (data)
                {
                    if (data != "") {
                        $('#nevadat').html(data);
                    }
                }
            });

        });
</script>

@endsection
