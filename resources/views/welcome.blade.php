@extends('layout')
@section('content')
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Legjobb Könyvek</h4>
                    <h2>OLVASS!!</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Ingyévan!</h4>
                    <h2>OLVASS!!</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Kihagyhatatlan</h4>
                    <h2>OLVASS!!</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Pár random könyv</h2>
                        <a href="products.html">Összes könyv, kévéve ami nincs <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <?php
                $randomkonyv = DB::select('SELECT * FROM books order by RAND() limit 3');
                if (isset($randomkonyv)) {
                    foreach ($randomkonyv as $l) {
                    ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="/konyv?id={{$l->id}}"><img src="images/{{ $l->picture }}" alt=""></a>
                        <div class="down-content">
                            <a href="/konyv?id={{$l->id}}">
                                <h4>{{ $l->name }}</h4>
                            </a>
                            <p>{{ substr($l->content, 0, 150) . '...' }}</p>
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

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Miért jó olvasni használt könyvet?</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Nem szereted a pénzt?</h4>
                        <p>Pizos, hogy szereted, ezért jó a könyvtár , ocssó</p>
                        <ul class="featured-list">
                            <li><a href="#">occsó</a></li>
                            <li><a href="#">occsó</a></li>
                            <li><a href="#">occsó</a></li>
                            <li><a href="#">occsó</a></li>
                            <li><a href="#">occsó</a></li>
                        </ul>
                        <a href="/rolunk" class="filled-button">Rólunk</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/feature-image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
