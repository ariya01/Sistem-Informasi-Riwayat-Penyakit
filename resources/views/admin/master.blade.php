<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Informasi Riwayat Penyakit</title>
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  @yield('css')
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/profile/1.png" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <i style="color: black; " class="fa fa-cog icon-lg"></i>
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Setting
                  </h6>
                </div>
              </a>
              <a class="dropdown-item preview-item">
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
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="images/profile/1.png" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">Hai,<br>{{Auth::user()->name}}</p>
                <!-- <p class="designation">{{Auth::user()->name}}</p> -->
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{url('home')}}"><i style="margin-right: 5%;" class="fa fa-home icon-md" aria-hidden="true"></i><span class="menu-title">Dashboard</span></a></li>
          <li class="nav-item"><a class="nav-link" href="pages/widgets.html"><i style="margin-right: 7%;" class="fa fa-user-md icon-md"></i><span class="menu-title">Dokter</span></a></li>
          <li class="nav-item"><a class="nav-link" href="pages/widgets.html"><i style="margin-right: 5%;" class="fa fa-wheelchair icon-md"></i><span class="menu-title">Pasien</span></a></li>
          <li class="nav-item"><a class="nav-link" href="pages/widgets.html"><i style="margin-right: 7%;" class="fa fa-hospital-o icon-md"></i><span class="menu-title">Rumah Sakit</span></a></li>
           <li class="nav-item"><a class="nav-link" href="pages/widgets.html"><i style="margin-right: 5%;" class="fa fa-medkit icon-md"></i><span class="menu-title">Obat</span></a></li>
           <li class="nav-item"><a class="nav-link" href="pages/widgets.html"><i style="margin-right: 5%;" class="fa fa-heartbeat icon-md"></i><span class="menu-title">Penyakit</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('akun')}}"><i style="margin-right: 7%;" class="fa fa-user-o icon-md"></i><span class="menu-title">Akun</span></a></li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Manajemen Perancangan Perangkat Lunak</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Teknik Informatika ITS <i class="fa fa-university text-primary" aria-hidden="true"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  @yield('js')
  <!-- <script src="node_modules/jquery/dist/jquery.min.js"></script> -->
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="js/maps.js"></script>
</body>

</html>