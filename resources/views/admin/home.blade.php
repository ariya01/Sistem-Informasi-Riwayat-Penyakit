@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
@endsection
@section('content')
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
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h1>Dashboard</h1>
              </div>
              </div>
            </div>

</div>
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Semua Data</b></p>
    </span>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-wheelchair text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Pasien</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$pasien}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-lock text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Admin</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$admin}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-user-md text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Dokter</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$dokter}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-hospital-o text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Rumah Sakit</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$rs}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-heartbeat text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Data Penyakit</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$penyakit}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-medkit text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Data Obat</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$obat}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Statistik</b></p>
    </span>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Pemeriksaan</h5>
        <canvas id="dashoard-area-chart" height="100px"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
   $('#icon1').removeClass('icon-md');
   $('#icon1').addClass('icon-lg');
</script>
<script type="text/javascript">
  $(window).on('load', function(){
    $('#loaderSvgWrapper').fadeOut(500);
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  });
</script>
<script type="text/javascript">
 var Years = new Array();
 var jumlah = new Array();
 $.ajax({    
                type: 'get',
                url: '/ajax10/',
                datatype: 'JSON',
                success:function(data){
                  // console.log(JSON.parse(data));
                  var data=$.parseJSON(data);
jQuery.each(data, function(index, value){
            // console.log(value.periksa);
            jumlah.push(value.periksa);
            Years.push(value.tahun);
        }); 
                }
              }); 

 console.log(jumlah);
</script>
<script type="text/javascript">
  (function($) {
  'use strict';
  $(function() {
    if ($('#dashoard-area-chart').length) {
      var lineChartCanvas = $("#dashoard-area-chart").get(0).getContext("2d");
      var data = {
        labels: Years,
        datasets: [{
            label: 'Jumlah Pemeriksaan',
            data: jumlah,
            backgroundColor: 'rgba(25, 145 ,235, 0.7)',
            borderColor: [
              'rgba(25, 145 ,235, 1)'
            ],
            borderWidth: 3,
            fill: true
          },
        ]
      };
      var options = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              display: true
            }
          }],
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              display: false
            }
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 3
          }
        }
      };
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: data,
        options: options
      });
    }
  });
})(jQuery);
</script>
@endsection