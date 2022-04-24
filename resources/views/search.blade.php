@extends('layout')
@section('content')
<div class="banner header-text">
</div>
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <?php
                $cime = "";
                $isbnszama= "";
                $azonosito = "";
                $szerzo = "";
                if(isset($_GET["nev"])){
                    $cime = $_GET["nev"];
                }
                if(isset($_GET["isbn"])){
                    $isbenszama = $_GET["isbn"];
                }
                if(isset($_GET["szerzo"])){
                    $szerzo = $_GET["szerzo"];
                }
                if(isset($_GET["azon"])){
                    $azonosito = $_GET["azon"];
                }
            $randomkonyv = DB::select("select * from books where name like '%".$cime."%' and id like '%".$azonosito."%' and author like '%".$szerzo."%' and isbn like '%".$isbnszama."%' order by name ");
            if (isset($randomkonyv)) {
                    foreach ($randomkonyv as $l) {
                    ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="/konyv?id={{$l->id}}"><img src="images/{{$l->picture}}" alt=""></a>
                        <div class="down-content">
                            <a href="/konyv?id={{$l->id}}">
                                <h4>{{$l->name}}</h4>
                            </a>
                            <p >{{substr($l->content, 0, 150) . '...'}}</p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    @endsection
