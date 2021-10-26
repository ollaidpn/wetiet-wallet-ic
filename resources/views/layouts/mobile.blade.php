
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Faykoo Wallet</title>
<link rel="stylesheet" type="text/css" href="{{asset('assets/mobile/styles/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/mobile/fonts/bootstrap-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/mobile/styles/style.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="manifest" href="_manifest.json">
<meta id="theme-check" name="theme-color" content="#FFFFFF">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/mobile/app/icons/icon-192x192.png')}}"></head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<!-- Page Wrapper-->
<div id="page">

    <!-- Footer Bar -->
    <div id="footer-bar" class="footer-bar-1 footer-bar-detached">

        <a href="{{ route('mobile') }}"> <i class="bi bi-house-fill"></i><span>Accueil</span></a>
        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-transfer"><i class="bi bi-wallet2"></i></i><span>Envoyer</span></a>
        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-qr"  class="circle-nav-2" > <i class="bi bi-wallet2" style="opacity: 0 !important;"></i><span>Retirer</span></a>
        <a href="{{ route('mobile.payments') }}" class="active-nav"><i class="bi bi-receipt"></i><span>Factures</span></a>
        <a href="{{ route('mobile.cards') }}"> <i class="bi bi-wallet2"></i><span>Cartes</span></a>
    </div>

    <!-- Page Content - Only Page Elements Here-->
    <div class="page-content footer-clear">

       @yield('content')

    </div>
    <!-- End of Page Content-->

    <!-- Off Canvas and Menu Elements-->
    <!-- Always outside the Page Content-->

    <!-- Main Sidebar Menu -->
    <div id="menu-sidebar"
        data-menu-active="nav-pages"
        data-menu-load="menu-sidebar.html"
        class="offcanvas offcanvas-start offcanvas-detached rounded-m">
    </div>

     <!-- Transfer Button Menu -->
    <div id="menu-transfer"  class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        @include('mobile.includes.transfert')
    </div>

    <div id="menu-qr"  class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
        @include('mobile.includes.qr')
    </div>

    <div id="menu-sidebar"
        data-menu-active="nav-pages"
        data-menu-load="menu-sidebar.html"
        class="offcanvas offcanvas-start offcanvas-detached rounded-m">
    </div>

	<!-- Highlights Menu -->
	<div id="menu-highlights"
		data-menu-load="menu-highlights.html"
		class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
	</div>

    <!-- Exchange Button Menu -->
    <div id="menu-exchange" data-menu-load="menu-exchange.html"
        class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
    </div>

    <!-- Notifications Bell -->
    <div id="menu-notifications" data-menu-load="menu-notifications.html"
        class="offcanvas offcanvas-top offcanvas-detached rounded-m">
    </div>

</div>
<!-- End of Page ID-->

<script src="{{asset('assets/mobile/scripts/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/mobile/scripts/custom.js')}}"></script>
</body>
