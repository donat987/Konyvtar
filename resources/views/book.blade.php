@extends('layout')
@section('content')
<div class="banner header-text">
</div>
<?php
print_r($_GET);
$konyv = DB::select("select * from books inner join languages on languages.id = books.languageID where books.id = '".$_GET["id"]."'");
?>
<div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>{{$konyv[0]->name}}</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="images/{{$konyv[0]->picture}}" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Szerző: {{$konyv[0]->author}}</h4>
              <h4>Kiadó: {{$konyv[0]->publisher}}</h4>
              <h4>ISBN: {{$konyv[0]->ISBN}}</h4>
              <h4>Megjelenés: {{$konyv[0]->appearance}}</h4>
              <?php
                $dbkonyv = DB::select("SELECT stock from books where id = '".$_GET["id"]."'");
                $db = $dbkonyv[0]->stock;
                $kivettdarab = DB::select("SELECT COUNT(1) as db from bookrentals WHERE bookID ='".$_GET["id"]."' and ok = 0 group by bookID");
                $kidb = 0;
                if(isset($kivettdarab[0]->db)){
                    $kidb = $kivettdarab[0]->db;
                }
              if($db != $kidb){
                echo"<h4>Készleten: igen</h4>";
              }else if($db == $kidb){
                $visszahoz = DB::select("SELECT backDate FROM `bookrentals` WHERE bookID = '".$_GET["id"]."' and ok = 0 ORDER BY backDate");
                echo"<h4>Készleten: nem, várhatóan ".$visszahoz[0]->backDate." kerül vissza</h4>";
              }
              ?>
              <h4>Nyelv: {{$konyv[0]->language}}</h4>
              <p>{{$konyv[0]->content}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
