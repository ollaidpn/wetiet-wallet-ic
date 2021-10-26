
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

    <!-- Page Content - Only Page Elements Here-->
    <div class="page-content my-0 py-0">

@yield('content')

    </div>
    <!-- End of Page Content-->

    <!-- Off Canvas and Menu Elements-->
    <!-- Always outside the Page Content-->



</div>
<!-- End of Page ID-->
<!-- End of Page ID-->

<script src="{{asset('assets/mobile/scripts/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/mobile/scripts/custom.js')}}"></script>

</body>
