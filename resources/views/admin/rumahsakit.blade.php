@extends('admin.master')
@section('css')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
@if(session()->has('message'))
@if(session()->get('message')=='Gagal')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba lagi',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil')

<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil Menambahkan Rumah Sakit {{session('data')}}',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil1')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil Menghapus Rumah Sakit {{session('data')}}',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil2')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil Mengubah Rumah Sakit {{session('data')}}',
    type: 'success',
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
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Daftar Rumah Sakit</b></p>
    </span>
  </div>
</div>
<table id="myTable" class="table table-bordered">
  <thead>
    <tr>
      <th width="6%;"></th>
      <th>Nama Rumah Sakit</th>
      <th>Alamat</th>
      <th>Keterangan</th>
      <!-- <th width="30%;" class="text-center">Bantuan</th> -->
    </tr>
  </thead>
  <tbody>
   @foreach($data as $a)
   <tr >
     <td>
        <div class="row" style="margin-left: 5%;">
        <div style="margin-right: 20%;">
          <a href="{{url('editrumah/'.$a->id_rumah)}}"> 
            <i style="color: green;" class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </a>
        </div>
        <div> 
          <a href="{{url('deleterumah/'.$a->id_rumah)}}" onclick="myFunction(event);"><i style="color: red;" class="fa fa-times" aria-hidden="true"></i></a>
        </div>
      </div>
      </td>
    <td>{{$a->nama_rumah}}</td>
    <td>{{$a->alamat_rumah}}</td>
    <td>{{$a->keterangan_rumah}}</td>
      <!-- <td>
        @if($a->keterangan_rumah)
        <a ><button type="button" id="idnya" class="btn btn-warning btn-rounded btn-fw xyz"><i class="fa fa-id-card" aria-hidden="true"></i>Isi</button></a>
        @else
        <a ><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-id-card" aria-hidden="true"></i></i>Ubah</button></a>
        @endif
        <a ><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-eye" aria-hidden="true"></i>Lihat</button></a>
      </td> 
    </tr> -->
    @endforeach
  </tbody>
</table>
<a href="{{url('editrumah/'.$angka)}}">
    <i class="fa fa-plus" style="margin-left: 2%; margin-top: 1%" aria-hidden="true"></i>
    <span style="font-size: 80%;">Tambah akun</span>
    </a>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Rumah Sakit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" method="post" action="{{url('/tambahrs')}}">
        <div class="modal-body">
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <select class="form-control" name="keterangan">
                <option value="Pemerintah">Pemerintah</option>
                <option value="Swasta">Swasta</option>
              </select>
            </div>
          </div>
        </div>
        {{ csrf_field() }}
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Rumah Sakit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" method="post" action="{{url('/editrs')}}">
        <div class="modal-body">
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <select class="form-control" name="keterangan">
                <option value="Pemerintah">Pemerintah</option>
                <option value="Swasta">Swasta</option>
              </select>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_user" id="id_user">
        {{ csrf_field() }}
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Edit</button>
        </div>
      </form>
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
 $('#icon3').removeClass('icon-md');
 $('#icon3').addClass('icon-lg');
</script>
<script type="text/javascript">
  $(window).on('load', function(){
    $('#loaderSvgWrapper').fadeOut(500);
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  });
</script>
<script type="text/javascript">
  function myFunction(event)
  {
    event.preventDefault(); // prevent form submit
    var href = event.currentTarget.getAttribute('href');
    swal({
      title: 'Hapus Rumah Sakit',
      text: 'Apa Kamu Yakin Menghapus ? ',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
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
  var nilai;
  $('.xyz').on('click', function() {
  nilai = $(this).prop("value");
  // console.log(nilai);
  $('#id_user').val(nilai);
});
</script>
@endsection