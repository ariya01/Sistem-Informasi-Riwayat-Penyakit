@extends('admin.master')
@section('tombol1')
active
@endsection
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
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
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <a href="{{url('dokterdetail/'.$personal->id)}}">
      <i class="fa fa-arrow-left" style="margin-left: 2%; margin-top: 1%" aria-hidden="true"></i>
      <span style="font-size: 80%;"> Kembali ke Detail Dokter </span>
    </a>
    <div class="col-12">
      <img height="200" class="rounded-circle mx-auto d-block" src="{{asset('images/profile/page.jpg')}}"> 
      <p class="text-center" style="margin-top: 2%;"><b>{{$personal->name_user}}</b></p>
      <div class="row">
        <div class="col-md-5">
          <div class="container" style="margin-top: 5%;">
            <div class="row">
              <div class="col-md-12" style="padding: 10%;">
                <div class="row purchace-popup">
                  <div class="col-12">
                    <span class="d-flex alifn-items-center">
                      <a href="{{url('/dokternya/'.$personal->id)}}">

                        <p style="color: black; font-weight: 10;" class="h4"><b>Detail Dokter</b></p>
                      </a>
                    </span>
                  </div>
                </div>
                <div class="row purchace-popup">
                  <div class="col-12">
                    <span class="d-flex alifn-items-center">
                      <a href="{{url('/pendidikan/'.$personal->id)}}">

                        <p style="color: black;" class="h4"><b>Pendidikan Dokter</b></p>
                      </a>
                    </span>
                  </div>
                </div>
                <div class="row purchace-popup">
                  <div class="col-12">
                    <span class="d-flex alifn-items-center">
                      <a href="{{url('/care/'.$personal->id)}}">  
                        <p style="color: black; font-weight: 10;" class="h4"><b>Pasien</b></p>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7" style="margin-top: 6%;">
          <table id="myTable" class="table table-bordered">
            <thead>
              <tr>
                <th width="10%;"></th>
                <th> Strata</th>
                <th> Pendidikan</th>
                <th> Universitas</th>
                <th> Spesialis</th>
              </tr>
            </thead>
            <tbody>
             @foreach($penyakit as $a)
             <tr >
              <td>
                <div class="row" style="margin-left: 5%;">
                <div style="margin-right: 20%;">
          <a href="{{url('editpendidikan/'.$a->id_dokter)}}"> 
            <i style="color: green;" class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </a>
        </div>
        <div>
          <a href="" onclick="myFunction(event);"><i style="color: red;" class="fa fa-times" aria-hidden="true"></i></a>
        </div>
      </div</td>
              <td>{{$a->nama_strata}}</td>
              <td>{{$a->nama_pendidikan}}</td>
              <td>{{$a->nama_univ}}</td>
              <td>@if($a->nama_spesialis)
                  {{$a->nama_spesialis}}
                  @else
                  -
                  @endif 
                  </td>
            </tr>
            @endforeach
          </tbody>
        </table>
         <a href="{{url('')}}">
    <i class="fa fa-plus" style="margin-left: 2%; margin-top: 1%" aria-hidden="true"></i>
    <span style="font-size: 80%;">Pendidikan</span>
    </a>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
<script type="text/javascript">
 $('#icon2').removeClass('icon-md');
 $('#icon2').addClass('icon-lg');
</script>
<script type="text/javascript">
  $(window).on('load', function(){
    $('#loaderSvgWrapper').fadeOut(500);
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  });
</script>
@endsection