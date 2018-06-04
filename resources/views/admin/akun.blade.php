@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css">
<style type="text/css">
<style type="text/css">
.tooltip-wrapper {
  display: inline-block; /* display: block works as well */
  /*margin: 50px;  make some space so the tooltip is visible */
}
/* hai */

.tooltip-wrapper .btn[disabled] {
  /* don't let button block mouse events from reaching wrapper */
  pointer-events: none;
}

.tooltip-wrapper.disabled {
  /* OPTIONAL pointer-events setting above blocks cursor setting, so set it here */
  cursor: not-allowed;
}
</style>
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

@if(session()->has('message'))
@if(session()->get('message')=='Gagal')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Email sudah digunakan',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: '{{session('data')}} berhasil terdaftar',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil2')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: '{{session('data')}} berhasil terubah',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil1')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: '{{session('data')}} berhasil terhapus',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal')
<script type="text/javascript">
  swal
  ({
    title: 'Error',
    text: 'Coba hapus ulang',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@else
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba masukan ulang',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@endif
@endif
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
<!-- <div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Tambah Akun</b></p>
    </span>
  </div>
</div> -->
<!-- <button data-toggle="modal" data-target="#exampleModalCenter" style="margin-bottom: 2%;" type="button" class="btn btn-primary btn-rounded btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button> -->

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h1 class="text-center card-title">Daftar Akun</h1>
      <table id="myTable" class="ui celled table">
        <thead>
          <tr>
            <th width="5%" data-orderable="false"></th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <!-- <th>Perintah</th> -->
            <!-- <th>Detail</th> -->
            <!-- <th>Bantuan</th> -->
          </tr>
        </thead>
        <tbody>
          @foreach($data as $a)
          <tr >
            <td>
              <div class="row" style="margin-left: 5%;">
                <div style="margin-right: 20%;">
                  <!-- <button type="button" data-toggle="modal" value="{{$a->id}}" id="idnya" data-target="#exampleModalCenter1" class="btn btn-primary btn-rounded xyz btn-sm"> -->
                    <a href="{{url('editakun/'.$a->id)}}"> 
                      <i style="color: green;" class="fa fa-pencil-square-o" aria-hidden="true"></i><!-- Ubah --><!-- </button> -->
                    </a>
                  </div>
                  <div>
                    <!-- <button type="button" id="getajax" onclick="myFunction()" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</button> -->
                    <form method="post" action="{{url('/hapusakun')}}">
                      @if(Auth::user()->id==$a->id)
                      <input type="hidden" name="id_user" value="{{$a->id}}">
                      {{ csrf_field() }}
                      <div class="tooltip-wrapper disabled" data-title="Kamu tidak bisa menghapus dirmu sendiri">
                        <!-- <button id="hapus" type="submit" class="btn btn-danger btn-rounded btn-sm" disabled><i class="fa fa-times" aria-hidden="true"></i></button> -->
                        <a><i style="color: grey;" pointer-events: none;" class="fa fa-times" aria-hidden="true"></i></a>
                      </div>
                      @else
                      <input type="hidden" name="id_user" value="{{$a->id}}">
                      {{ csrf_field() }}
                      <!-- <button type="submit" onclick="myFunction()" class="btn btn-danger btn-rounded btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button> -->
                      <a href="{{'deleteakun/'.$a->id}}" onclick="myFunction(event);"><i style="color: red;" class="fa fa-times" aria-hidden="true"></i></a>
                      @endif
                    </form>
                  </div>
                </div>
              </td>
              <td>{{$a->name_user}}</td>
              <td>{{$a->email}}</td>
              <td>{{$a->name}}</td>
       <!-- <td>
        @if($a->id_det==null)
        <label class="badge badge-warning">Belum Terisi</label>
        @else
        <label class="badge badge-info">Sudah</label>
        @endif
      </td> -->
      <!-- <td>
        @if($a->id_det==null)
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Isi</button></a>
        @else
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</button></a>
        @endif
      </td> -->
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{url('editakun/'.$angka)}}">
  <i class="fa fa-plus" style="margin-left: 2%; margin-top: 1%" aria-hidden="true"></i>
  <span style="font-size: 80%;">Tambah akun</span>
</a>
</div>
</div>
</div>

</div>


@endsection
@section('js')
<script>
  $(function() {
    $('.tooltip-wrapper').tooltip({position: "bottom"});
  });
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable({ order: [[1, 'asc']],bPaginate: $('#myTable tbody tr').length>10,
      "oLanguage": {
        "oPaginate": {
          "sNext": "Selanjutnya",
          "sPrevious": "Sebelumnya"
        },
        "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ Baris",
        "sInfoEmpty": "Showing 0 to 0 of 0 entries",
        "sLengthMenu": "Tampilan _MENU_ Baris",
        "sSearch": "Cari"
      }});
  } );
</script>
<script type="text/javascript">
  $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) 
    {
      $('#message').css('visibility','visible');
      $('#message').html('Matching').css('color', 'white');
      $('#message').addClass("badge-info");
      $('#message').removeClass("badge-danger");
    } 
    else
    {
      $('#message').css('visibility','visible');
      $('#message').removeClass("badge-info");
      $('#message').addClass("badge-danger");
      $('#message').html('Not Matching').css('color', 'white');
    } 
  });
</script>
<script type="text/javascript">
  $('#password1, #confirm_password1').on('keyup', function () {
    if ($('#password1').val() == $('#confirm_password1').val()) 
    {
      $('#message1').css('visibility','visible');
      $('#message1').html('Matching').css('color', 'white');
      $('#message1').addClass("badge-info");
      $('#message1').removeClass("badge-danger");
    } 
    else
    {
      $('#message1').css('visibility','visible');
      $('#message1').removeClass("badge-info");
      $('#message1').addClass("badge-danger");
      $('#message1').html('Not Matching').css('color', 'white');
    } 
  });
</script>
<script type="text/javascript">
  var nilai;
  $('.xyz').on('click', function() {
    nilai = $(this).prop("value");
  // console.log(nilai);
  $('#id_user').val(nilai);
});
</script>
<script type="text/javascript">
  function myFunction(event)
  {
    event.preventDefault(); // prevent form submit
    var href = event.currentTarget.getAttribute('href');
    swal({
      title: 'Hapus Akun',
      text: 'Apa Kamu Yakin Menghapus ? ',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location = href; 
      }
    })
  }
</script>
<script type="text/javascript">
 $('#icon6').removeClass('icon-md');
 $('#icon6').addClass('icon-lg');
</script>
<script type="text/javascript">
  $(window).on('load', function(){
    $('#loaderSvgWrapper').fadeOut(500);
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  });
</script>
@endsection