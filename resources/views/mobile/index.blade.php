@extends('layouts.mobile')

@section('content')
     <!-- Page Title-->
     <div class="pt-3">
        <div class="page-title d-flex">
            <div class="align-self-center me-auto">
                <p class="color-highlight" style="color: black !important;">Bonjour</p>
                <h2 class="color-theme">Pape Ndiouga</h2>
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
    <svg id="header-deco" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
        <path id="header-deco-1" d="M 0,600 C 0,600 0,120 0,120 C 92.36363636363635,133.79904306220095 184.7272727272727,147.59808612440193 287,148 C 389.2727272727273,148.40191387559807 501.4545454545455,135.40669856459328 592,129 C 682.5454545454545,122.5933014354067 751.4545454545455,122.77511961722489 848,115 C 944.5454545454545,107.22488038277511 1068.7272727272727,91.49282296650718 1172,91 C 1275.2727272727273,90.50717703349282 1357.6363636363635,105.25358851674642 1440,120 C 1440,120 1440,600 1440,600 Z"></path>
        <path id="header-deco-2" d="M 0,600 C 0,600 0,240 0,240 C 98.97607655502392,258.2105263157895 197.95215311004785,276.4210526315789 278,282 C 358.04784688995215,287.5789473684211 419.16746411483257,280.5263157894737 524,265 C 628.8325358851674,249.4736842105263 777.377990430622,225.47368421052633 888,211 C 998.622009569378,196.52631578947367 1071.3205741626793,191.57894736842107 1157,198 C 1242.6794258373207,204.42105263157893 1341.3397129186603,222.21052631578948 1440,240 C 1440,240 1440,600 1440,600 Z"></path>
        <path id="header-deco-3" d="M 0,600 C 0,600 0,360 0,360 C 65.43540669856458,339.55023923444975 130.87081339712915,319.1004784688995 245,321 C 359.12918660287085,322.8995215311005 521.9521531100479,347.1483253588517 616,352 C 710.0478468899521,356.8516746411483 735.3205741626795,342.3062200956938 822,333 C 908.6794258373205,323.6937799043062 1056.7655502392345,319.62679425837325 1170,325 C 1283.2344497607655,330.37320574162675 1361.6172248803828,345.1866028708134 1440,360 C 1440,360 1440,600 1440,600 Z"></path>
        <path id="header-deco-4" d="M 0,600 C 0,600 0,480 0,480 C 70.90909090909093,494.91866028708137 141.81818181818187,509.8373205741627 239,499 C 336.18181818181813,488.1626794258373 459.6363636363636,451.5693779904306 567,446 C 674.3636363636364,440.4306220095694 765.6363636363636,465.88516746411483 862,465 C 958.3636363636364,464.11483253588517 1059.8181818181818,436.8899521531101 1157,435 C 1254.1818181818182,433.1100478468899 1347.090909090909,456.555023923445 1440,480 C 1440,480 1440,600 1440,600 Z"></path>
    </svg>

    <div class="card card-style bg-17 shadow-card shadow-card-m" style="height:190px; border: solid 1px black; box-shadow: black 3%;" >
        <div class="card-center">
            <div class="bg-theme px-3 py-2 rounded-end d-inline-block" style="background-color: #df9b12 !important;">
                <h1 class="font-13 my-n1">
                    <a class="color-theme" data-bs-toggle="collapse" href="#balance3" aria-controls="balance2" style="color: white !important;">Voir solde</a>
                </h1>
                <div class="collapse" id="balance3"><h2 class="color-theme font-26">87.500 Fcfa</h2></div>
            </div>
        </div>
        <strong class="card-top no-click mt-2 font-12 p-3 color-white font-monospace" style="color: black !important;">Compte Faykoo</strong>
        <strong class="card-bottom no-click p-3 text-start color-black font-monospace" style="color: black;">Dernière transaction <br> <small style="color: black;">07/09/2021</small></strong>
    </div>


    <!-- Send Money Title-->
    <div class="content mb-0">
        <div class="d-flex">
            <div class="align-self-center">
                <h3 class="font-16 mb-2">Envoi rapide aux favoris</h3>
            </div>
            <div class="align-self-center ms-auto">
                <a href="page-payment-transfer.html" class="font-12 pt-1">Voir tous</a>
            </div>
        </div>
    </div>

    <!-- Send Money Slider-->
    <div class=" @if ($Favorites->count()>1)splide @endif quad-slider slider-no-dots slider-no-arrows slider-visible text-center" id="double-slider-2">
        <div class="splide__track">
            <div class="splide__list">
                @foreach ($Favorites as $Favorite)
                <div class="splide__slide">
                    <a href="#" data-card-height="60" data-bs-toggle="offcanvas" data-bs-target="#menu-friends-transfer" class="card border-0  bg-1 shadow-card shadow-card-m rounded-m"></a>
                    <h6 class="pt-2">{{ $Favorite->name }} </h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="content my-0 mt-4 px-1">
        <div class="d-flex">
            <div class="align-self-center">
                <h3 class="font-16 mb-2">Activités récentes</h3>
            </div>
            <div class="align-self-center ms-auto">
                <a href="#" class="font-12 pt-1">Voir tous</a>
            </div>
        </div>
    </div>
      <!-- Tabs-->
      <div class="card card-style">
        <div class="content mb-0">

            <!-- Tab Wrapper-->
            <div class="tabs tabs-pill" id="tab-group-2">
                <!-- Tab Controls -->
                <div class="tab-controls rounded-m p-1">
                    <a class="font-13 rounded-m" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Tranferts</a>
                    <a class="font-13 rounded-m" data-bs-toggle="collapse" href="#tab-5" aria-expanded="false">Retraits</a>
                    <a class="font-13 rounded-m" data-bs-toggle="collapse" href="#tab-x" aria-expanded="false">Paiements</a>
                </div>

                <!-- Tab 1 -->
                <div class="mt-3"></div>
                <div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">

                </div>

                <!-- Tab 2-->
                <div class="collapse" id="tab-5" data-bs-parent="#tab-group-2">
                    <div class="form-custom form-label form-border form-icon mt-0 mb-0">
                        <i class="bi bi-check-circle font-13"></i>
                        <select class="form-select rounded-xs" id="c6" aria-label="Floating label select example">
                            <option selected>Latest Activity</option>
                            <option value="1">Last 30 Days</option>
                            <option value="2">Last 90 Days</option>
                            <option value="3">Last 6 Months</option>
                        </select>
                    </div>
                    <div class="list-group list-custom list-group-m list-group-flush rounded-xs">
                        <a href="#" class="list-group-item">
                            <i class="has-bg gradient-green color-white rounded-xs bi bi-cash-coin"></i>
                            <div><strong>Savings</strong><span>14  Transactions</span></div>
                            <span class="badge bg-transparent color-theme text-end font-15">
                               $414<br>
                               <em class="fst-normal font-12 opacity-30">13.5%</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="has-bg gradient-yellow color-white rounded-xs bi bi-droplet"></i>
                            <div><strong>Utilities</strong><span>11 Transactions</span></div>
                            <span class="badge bg-transparent color-theme text-end font-15">
                                $631<br>
                                <em class="fst-normal font-12 opacity-30">20.3%</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="has-bg gradient-blue color-white rounded-xs bi bi-bag"></i>
                            <div><strong>Shopping</strong><span>23 Transactions</span></div>
                            <span class="badge bg-transparent color-theme text-end font-15">
                                $950<br>
                                <em class="fst-normal font-12 opacity-30">45.7%</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="has-bg gradient-red color-white rounded-xs bi bi-gear"></i>
                            <div><strong>Construction</strong><span>34 Transactions</span></div>
                            <span class="badge bg-transparent color-theme text-end font-15">
                                $315<br>
                                <em class="fst-normal font-12 opacity-30">19.5%</em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="has-bg gradient-magenta color-white rounded-xs bi bi-shuffle"></i>
                            <div><strong>Other Costs</strong><span>15 Transactions</span></div>
                            <span class="badge bg-transparent color-theme text-end font-15">
                                $530<br>
                                <em class="fst-normal font-12 opacity-30">35.5%</em>
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Tab 3 -->
                <div class="collapse" id="tab-x" data-bs-parent="#tab-group-2">
                    <a href="page-activity.html" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-orange shadow-bg shadow-bg-xs"><i class="bi bi-google color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Google Ads</h5>
                            <p class="mb-0 font-11 opacity-50">14th March <span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-red-dark">$150.55</h4>
                            <p class="mb-0 font-11">Bill Payment</p>
                        </div>
                    </a>
                    <div class="divider my-2 opacity-50"></div>
                    <a href="page-activity.html" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-cloud-fill color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Cloud Storage</h5>
                            <p class="mb-0 font-11 opacity-50">14th March <span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-red-dark">$15.55</h4>
                            <p class="mb-0 font-11">Subscription</p>
                        </div>
                    </a>
                    <div class="divider my-2 opacity-50"></div>
                    <a href="page-activity.html" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-orange shadow-bg shadow-bg-xs">
                                <img src="{{asset('assets/mobile/images/pictures/31s.jpg')}}" width="46" class="rounded-s" alt="img">
                            </span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Jane Son</h5>
                            <p class="mb-0 font-11 opacity-50">14th March <span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-green-dark">$130.55</h4>
                            <p class="mb-0 font-11">Direct Transfer</p>
                        </div>
                    </a>
                    <div class="divider my-2 opacity-50"></div>
                    <a href="page-activity.html" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-xs"><i class="bi bi-caret-up-fill color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Bitcoin</h5>clxddrdsd:
                            <p class="mb-0 font-11 opacity-50">14th March <span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-blue-dark">+0.315%</h4>
                            <p class="mb-0 font-11">Stock Update</p>
                        </div>
                    </a>
                    <div class="divider my-2 opacity-50"></div>
                    <a href="page-activity.html" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-yellow shadow-bg shadow-bg-xs"><i class="bi bi-pie-chart-fill color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Dividends</h5>
                            <p class="mb-0 font-11 opacity-50">13th March <span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-green-dark">$950.00</h4>
                            <p class="mb-0 font-11">Wire Transfer</p>
                        </div>
                    </a>
                    <div class="pb-3"></div>
                </div>

                <!-- End of Tabs-->
            </div>

            <!-- End of Tab Wrapper-->
        </div>
    </div>

@endsection
