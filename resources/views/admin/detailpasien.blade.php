@extends('admin.master')
@section('tombol')
active
@endsection
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

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
    <a href="{{url('pasien')}}">
      <i class="fa fa-arrow-left" style="margin-left: 2%; margin-top: 1%" aria-hidden="true"></i>
      <span style="font-size: 80%;"> Kembali ke Pasien </span>
    </a>
    <div class="container" style="margin-top: 5%;">
      <div class="row">
        <div class="col-12">
          <img height="150" class="rounded-circle mx-auto d-block" src="{{asset('images/profile/page.jpg')}}"> 
        </div>
      </div>
    </div>
    <div class="text-center">
      <p style="margin-top: 2%;">
        <b>{{$personal->name_user}}
        </b>
      </p>
      <p style="margin-top: -1%;">
        {{$personal->display_name}}
      </p>
    </div>
    <div class="row" style="padding-top: 5%;padding-left: 5%;padding-right: 5%;">
      <div class="col-6">
        <div class="row purchace-popup">
          <div class="col-12">
            <span class="d-flex alifn-items-center">
              <a href="{{url('/detailnya/'.$personal->id)}}">

                <p style="color: black;" class="h4"><b>Detail Pasien</b></p>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="col-6"> 
        <div class="row purchace-popup">
          <div class="col-12">
            <span class="d-flex alifn-items-center">
              <a href="{{url('/penyakitnya/'.$personal->id)}}">

                <p style="color: black;" class="h4"><b>Riwayat Penyakit</b></p>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="padding-left: 5%;padding-right: 5%;">
      <div class="col-6">
        <div class="row purchace-popup">
          <div class="col-12">
            <span class="d-flex alifn-items-center">
              <a href="{{url('/alergi/'.$personal->id)}}">  
                <p style="color: black;" class="h4"><b>Alergi</b></p>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row purchace-popup">
          <div class="col-12">
            <span class="d-flex alifn-items-center">
              <a href="{{url('/pemeriksaan/'.$personal->id)}}">
                <p style="color: black;" class="h4"><b>Riwayat Pemeriksaan</b></p>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">



<!--       <div class="row purchace-popup">
        <div class="col-12">
          <span class="d-flex alifn-items-center">
            <a href="{{url('/keluarga/'.$personal->id)}}">
            <p style="color: black;" class="h4"><b>Riwayat Penyakit Keluarga</b></p>
            </a>
          </span>
        </div>
      </div> -->

    </div>
  </div>
</div>
      <!-- <p class="card-description font-weight-bold">
        Nama Dokter
      </p>
      <p style="margin-top: -1%;">
        {{$personal->name_user}}
      </p>
      <p class="card-description font-weight-bold">
        Email User
      </p>
      <p style="margin-top: -1%;">
        {{$personal->email}}
      </p>
      <p class="card-description font-weight-bold">
        Alamat Dokter
      </p>
      <p style="margin-top: -1%;">
        @if($detail)
        {{$detail->alamat}}
        @else
        Belum di Isi
        @endif
      </p>
      <p class="card-description font-weight-bold">
        Kontak
      </p>
      <p style="margin-top: -1%;">
        @if($detail)
        {{$detail->kontak}}
        @else
        Belum di Isi
        @endif
      </p>
      <p style="margin-top: -1%;">
        @if($detail)
        {{$detail->alamat}}
        @else
        Belum di Isi
        @endif
      </p>
      <p class="card-description font-weight-bold">
        Berat
      </p>
      <p style="margin-top: -1%;">
        @if($detail)
        {{$detail->berat}}
        @else
        Belum di Isi
        @endif
      </p>
      <p class="card-description font-weight-bold">
        Tinggi
      </p>
      <p style="margin-top: -1%;">
        @if($detail)
        {{$detail->tinggi}}
        @else
        Belum di Isi
        @endif
      </p>
    <p class="card-description font-weight-bold">
        Perlu check Up
      </p>
      <p style="margin-top: -1%;">
        @if($detail)
          @if($detail->status==1)
          Perlu
          @else
          Tidak
          @endif
        @else
        Belum di Isi
        @endif
      </p>
    </div>
  </div>
</div> -->
<input type="hidden" name="idnya" value="{{$personal->id}}">
@endsection
@section('js')
<script type="text/javascript">
 $('#icon').removeClass('icon-md');
 $('#icon').addClass('icon-lg');
</script>
<script type="text/javascript">
  $(window).on('load', function(){
    $('#loaderSvgWrapper').fadeOut(500);
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  });
</script>
@endsection