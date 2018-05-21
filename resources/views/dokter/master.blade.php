<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Informasi Riwayat Penyakit</title>
  <link rel="stylesheet" href="{{asset('node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
  <link rel="icon" href="{{asset('1.png')}}" type="image/gif" sizes="16x16">
  <style type="text/css"> 
  </style>
  @yield('css')
</head>
<body>
  <div class="container-scroller">
   <!--  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('images/logo.svg')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo-mini.svg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{asset('images/profile/1.png')}}" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-divider"></div>
              <a href="{{url('detail/'.Auth::user()->id)}}" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <i style="color: black; " class="fa fa-cog icon-lg"></i>
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Setting
                  </h6>
                </div>
              </a>
              <a href="{{url('logout')}}" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <i style="color: black; " class="fa fa-sign-out icon-lg"></i>
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Log Out
                  </h6>
                </div>
              </a>
            </div>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav> -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" style="height: 1000px; background-color: #024038;" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="{{asset('images/profile/page.jpg')}}" alt="image"/></div> 
              <a id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div><p class="text-center" style="color: white;">Hai, <i class="fa fa-angle-down" aria-hidden="true"></i></p></div> 
              </a>
              <div style="margin-top: -1%;" class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-divider"></div>
              <a href="{{url('logout')}}" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <i style="color: black; " class="fa fa-sign-out icon-lg"></i>
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Log Out
                  </h6>
                </div>
              </a>
            </div>
            
              <div class="profile-name">
                <p class="name" style="color: white;">{{Auth::user()->name_user}}</p>
                <p class="designation" style="color: white;">{{Auth::user()->roles->first()->name}}</p>
              </div>
            </div>
          </li>
          <li class="nav-item @yield('tombol1')"><a class="nav-link" href="{{url('rumah')}}">
            <i id="icon1" style="margin-right: 7%;" class="fa fa-home icon-md"></i>
            <span class="menu-title">Dashboard</span></a></li>
            <li class="nav-item @yield('tombol2')"><a class="nav-link" href="{{url('utama')}}">
            <i id="icon2" style="margin-right: 7%;" class="fa fa-wheelchair icon-md"></i>
            <span class="menu-title">Pasien</span></a></li>
             <!-- <li class="nav-item @yield('tombol5')"><a class="nav-link" href="{{url('logout')}}"><i id="icon6" style="margin-right: 7%; color: red;" class="fa fa-sign-out icon-md"></i><span style="color: red;" class="menu-title">Log Out</span></a></li> -->
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Manajemen Perancangan Perangkat Lunak</span>
            <br>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Interaksi Manusia dan Komputer</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Teknik Informatika ITS <i class="fa fa-university text-primary" aria-hidden="true"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  @yield('js')
  <!-- <script src="node_modules/jquery/dist/jquery.min.js"></script> -->
  <script src="{{asset('node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <!-- <script src="{{asset('js/dashboard.js')}}"></script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script> -->
  <script src="{{asset('js/maps.js')}}"></script>
</body>

</html>