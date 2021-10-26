@extends('layouts.mobile')

@section('content')
     <!-- Page Title-->
     <div class="pt-3">
        <div class="page-title d-flex">
            <div class="align-self-center me-auto">
                <p class="color-highlight">Cartes</p>
                <h1 class="color-theme">Bancaire</h1>
            </div>
            <div class="align-self-center ms-auto">

                <a href="#"
                data-bs-toggle="dropdown"
                class="icon gradient-blue shadow-bg shadow-bg-s rounded-m">
                    <img src="{{asset('assets/mobile/images/pictures/25s.jpg')}}" width="45" class="rounded-m" alt="img">
                </a>
                <!-- Page Title Dropdown Menu-->
                <div class="dropdown-menu">
                    <div class="card card-style shadow-m mt-1 me-1">
                        <div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">

                            <a href="page-profile.html" class="list-group-item">
                                <i class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
                                <strong class="font-13">Mon Compte</strong>
                            </a>
                            <a href="page-signin-1.html" class="list-group-item">
                                <i class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
                                <strong class="font-13">Déconnexion</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Stack - The Stack Height Below will be the card height-->
    <div class="card-stack" data-stack-height="180">

        <!-- Card Open on Click-->
        <div class="card-stack-click"></div>

        <!-- Card 1-->
        <div class="card card-style " style=" background-image: url('https://thumbs.dreamstime.com/b/abstract-halftone-wave-dotted-background-effect-134489322.jpg') ;">

            <div class="card-top p-3">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more" class="icon icon-xxs bg-white color-black float-end"><i class="bi bi-three-dots font-18"></i></a>
            </div>
            <div class="card-center">
                <div class="bg-theme px-3 py-2 rounded-end d-inline-block">
                    <h1 class="font-13 my-n1">
                        <a class="color-theme" data-bs-toggle="collapse" href="#balance3" aria-controls="balance2">Voir solde</a>
                    </h1>
                    <div class="collapse" id="balance3"><h2 class="color-theme font-26">190.840 Fcfa</h2></div>
                </div>
            </div>
            <strong class="card-top no-click font-12 p-3 color-white font-monospace">Carte Conifna</strong>
            <strong class="card-bottom no-click p-3 text-start color-white font-monospace"><small>El Hadji Papa Ndiouga Diallo</small> <br>4938 2784 0092 098 / 167</strong>
            <strong class="card-bottom no-click p-3 text-end color-white font-monospace">12 / 2021</strong>
            <div class="card-overlay " style="background-color: rgba(158, 5, 5, 0.788) !important;"></div>
        </div>

        <!-- Card 2 -->
        <div class="card card-style " style=" background-image: url('https://thumbs.dreamstime.com/b/abstract-halftone-wave-dotted-background-effect-134489322.jpg') ;">
            <div class="card-top p-3">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more" class="icon icon-xxs bg-white color-black float-end"><i class="bi bi-three-dots font-18"></i></a>
            </div>
            <div class="card-center">
                <div class="bg-theme px-3 py-2 rounded-end d-inline-block">
                    <h1 class="font-13 my-n1">
                        <a class="color-theme" data-bs-toggle="collapse" href="#balance1" aria-controls="balance1">Voir solde</a>
                    </h1>
                    <div class="collapse" id="balance1"><h2 class="color-theme font-26">132.960 Fcfa</h2></div>
                </div>
            </div>
            <strong class="card-top no-click font-12 p-3 color-white font-monospace">Carte Ecobank</strong>
            <strong class="card-bottom no-click p-3 text-start color-white font-monospace">5661 4353 9904 878 / 093 </strong>
            <strong class="card-bottom no-click p-3 text-end color-white font-monospace">03 / 2022</strong>
            <div class="card-overlay " style="background-color: rgba(5, 28, 158, 0.788) !important;"></div>
        </div>

        <!-- Card 3 -->
        <div class="card card-style " style=" background-image: url('https://thumbs.dreamstime.com/b/abstract-halftone-wave-dotted-background-effect-134489322.jpg') ;">
            <div class="card-top p-3">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more" class="icon icon-xxs bg-white color-black float-end"><i class="bi bi-three-dots font-18"></i></a>
            </div>
            <div class="card-center">
                <div class="bg-theme px-3 py-2 rounded-end d-inline-block">
                    <h1 class="font-13 my-n1">
                        <a class="color-theme" data-bs-toggle="collapse" href="#balance2" aria-controls="balance2">Voir solde</a>
                    </h1>
                    <div class="collapse" id="balance2"><h2 class="color-theme font-26">20.600 Fcfa</h2></div>
                </div>
            </div>
            <strong class="card-top no-click font-12 p-3 color-white font-monospace">Carte BHS</strong>
            <strong class="card-bottom no-click p-3 text-start color-white font-monospace">8379 2094 0983 113 / 093</strong>
            <strong class="card-bottom no-click p-3 text-end color-white font-monospace">08 / 2022</strong>
            <div class="card-overlay opacity-50" style="background-color: rgba(58, 45, 17, 0.815) !important;"></div>
        </div>
    </div>

    <!-- Card Stack Info Message / Hides when deployed -->
    <h6 class="btn-stack-info color-theme opacity-80 text-center mt-n2 mb-3">Appuyez sur les cartes pour étendre votre portefeuille</h6>
    <!-- Card Stack Button / shows when deployed -->
    <a href="#" class="disabled btn-stack-click btn mx-3 mb-4 btn-full gradient-highlight shadow-bg shadow-bg-xs">Réduire la liste des cartes</a>

@endsection
