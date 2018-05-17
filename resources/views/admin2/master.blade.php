<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistem Informasi Riwayat Penyakit</title>
    <meta charset="utf-8">
    <script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />
  </head>
    <style type="text/css">
#loaderSvgWrapper{
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
  z-index: 99;
}
#preLoader{
  position: absolute;
  top: 50%;
  left: 45%;
}
path{
  fill: #024038;
  stroke: #f00;
}
#T1{
  animation: visible 2s ease .2s infinite;
}
#T2{
  animation: visible 2s ease .4s infinite;
}
#T3{
  animation: visible 2s ease .6s infinite;
}
#T4{
  animation: visible 2s ease .8s infinite;
}
#T5{
  animation: visible 2s ease 1s infinite;
}
#T6{
  animation: visible 2s ease 1.2s infinite;
}
@keyframes visible {
  0%{
    opacity: 1;
    stroke-opacity: 1;
  }
  50%{
    opacity: 0;
    stroke-opacity: 0;
  }
  100%{
    opacity: 1;
    stroke-opacity: 1;
  }
}  
</style>
  </style>
  <body class="app sidebar-mini rtl">
    <div id="loaderSvgWrapper">
  <svg xmlns:svg="http://www.w3.org/2000/svg" viewbox="0 0 100 100" id="preLoader" width="100px" height="100px">
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="m 58.26475,43.628481 15.7247,-27.287018 -31.4936,0.02553 z" id="T1"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="m 58.26475,43.628481 31.4936,-0.02553 -15.7689,-27.261492 z" id="T2"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="M 58.26475,43.628481 74.03365,70.88997 89.75835,43.602954 Z" id="T3"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="M 58.26475,43.628481 42.54006,70.915503 74.03365,70.889973 Z" id="T4"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="m 58.26475,43.628481 -31.49359,0.02553 15.7689,27.261491 z" id="T5"/>
    <path style="stroke-width:0.26458332px;stroke-linecap:butt;stroke-linejoin:miter" d="M 58.26475,43.628481 42.49585,16.366995 26.77116,43.654011 Z" id="T6"/>
  </svg>
</div>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Riwayat Sakit</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('images/profile/page.jpg')}}" width="50px;" alt="User Image">
        <div>
          <p class="app-sidebar__user-name" style="font-size: 15px">{{Auth::user()->name_user}}</p>
          <p class="app-sidebar__user-designation">{{Auth::user()->roles->first()->name}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item @yield('menu1')" href="index.html"><i class="app-menu__icon fa fa-line-chart" aria-hidden="true"></i><span class="app-menu__label">Statistik</span></a></li>
         <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-user-o"></i><span class="app-menu__label">Akun</span></a></li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-user-md"></i><span class="app-menu__label">Dokter</span></a></li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-wheelchair"></i><span class="app-menu__label">Pasien</span></a></li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-medkit"></i><span class="app-menu__label">Obat</span></a></li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-stethoscope"></i><span class="app-menu__label">Alergi</span></a></li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-heartbeat"></i><span class="app-menu__label">Penyakit</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>@yield('title')</h1>
        </div>
      </div>
      @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
  </body>
  <script type="text/javascript">
  $(window).on('load', function(){
    $('#loaderSvgWrapper').fadeOut(500);
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  });
</script>
</html>