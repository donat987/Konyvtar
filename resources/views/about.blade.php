@extends('layout')
@section('content')
    <div class="page-heading about-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Rólunk</h4>
                        <h2>A könyvtárról</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team-members">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>A csapat</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <div class="thumb-container">
                            <img src="assets/images/avatar-89f3caf535d9c0427cc275c069df6e84.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Koaxk Ábel</h4>
                            <span>Könyvtáros/IT</span>
                            <p>Ha probléma van a számítógéppel, őt kell keresni. (Bár segíteni nem fog)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <div class="thumb-container">
                            <img src="assets/images/avatar-49767702bcf9f9c6f7e20142fb7d3437.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Raj Zóra</h4>
                            <span>Fő könyvtáros</span>
                            <p>Hatékony dolgozó! Ha valaki nem hoz vissza időben egy könyvet... Inkább nem mesélem
                                tovább, hozzátok vissza időbe!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <div class="thumb-container">
                            <img src="assets/images/image.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Papusa Pisla</h4>
                            <span>Takarító</span>
                            <p>Ha meglátod, FUSS!!</p>
                        </div>
                    </div>
                </div>


                <div class="find-us">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading">
                                    <h2>Könyvtár lokációja</h2>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d88033.88026539917!2d51.686899014747766!3d-46.4078905552931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb4f19789e66c04b7%3A0xc006395e597fe509!2s%C3%8Ele%20de%20la%20Possession!5e0!3m2!1shu!2shu!4v1649847201936!5m2!1shu!2shu"
                                        width="100%" height="330px" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="left-content">
                                    <h4>A könyvtár</h4>
                                    <p>A könyvtár konnyű megközelíthetőségéért kérjük vegye fel a kapcsolatot a
                                        főkönyvtárossal</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
