@extends('layout')
@section('content')
<div class="banner header-text">
</div>
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <?php
                $randomkonyv = DB::select('SELECT * FROM books');
                if (isset($randomkonyv)) {
                    foreach ($randomkonyv as $l) {
                    ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="images/{{$l->picture}}" alt=""></a>
                        <div class="down-content">
                            <a href="#">
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
