<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/data-tables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div id="app">
      <section class="menu cid-qEW8idnwvO" once="menu" id="menu1-0" data-rv-view="581">
          <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <div class="hamburger">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
              </button>
              <div class="menu-logo">
                  <div class="navbar-brand">

                      <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="{{url('/')}}">Dashboard</a></span>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                          <a class="nav-link link text-white display-4" href="{{url('/productos')}}"><span class="mbri-shopping-basket mbr-iconfont mbr-iconfont-btn"></span>
                              &nbsp;Productos</a>
                      </li><li class="nav-item"><a class="nav-link link text-white display-4" href="{{url('/pedidos')}}"><span class="mbri-cart-full mbr-iconfont mbr-iconfont-btn"></span>
                              &nbsp;Pedidos</a></li>
                      <li class="nav-item">
                          <a class="nav-link link text-white display-4" href="{{url('/clientes')}}"><span class="mbri-smile-face mbr-iconfont mbr-iconfont-btn"></span>
                              &nbsp;Clientes</a>
                      </li></ul>

              </div>
          </nav>
      </section>


        @yield('content')

    </div>

    <!--       <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>  -->

      <script src="assets/web/assets/jquery/jquery.min.js"></script>
      <script src="assets/popper/popper.min.js"></script>
      <script src="assets/tether/tether.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/smooth-scroll/smooth-scroll.js"></script>
      <script src="assets/dropdown/js/script.min.js"></script>
      <script src="assets/data-tables/jquery.data-tables.min.js"></script>
      <script src="assets/data-tables/data-tables.bootstrap4.min.js"></script>
      <script src="assets/theme/js/script.js"></script>


</body>
</html>
