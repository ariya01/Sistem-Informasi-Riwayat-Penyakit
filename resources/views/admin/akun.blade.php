@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style type="text/css">
  .tooltip-wrapper {
  display: inline-block; /* display: block works as well */
  /*margin: 50px;  make some space so the tooltip is visible */
}

.tooltip-wrapper .btn[disabled] {
  /* don't let button block mouse events from reaching wrapper */
  pointer-events: none;
}

.tooltip-wrapper.disabled {
  /* OPTIONAL pointer-events setting above blocks cursor setting, so set it here */
  cursor: not-allowed;
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
    text: 'Akun berhasil terdaftar',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil2')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Akun berhasil terubah',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil1')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Akun berhasil terhapus',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil')
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

<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Tambah Akun</b></p>
    </span>
  </div>
</div>
<button data-toggle="modal" data-target="#exampleModalCenter" style="margin-bottom: 2%;" type="button" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Tabel Akun di Sistem</b></p>
    </span>
  </div>
</div>
<table id="myTable" class="table table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Role</th>
      <th>Perintah</th>
      <th>Detail</th>
      <th>Bantuan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $a)
    <tr >
      <td>{{$a->name_user}}</td>
      <td>{{$a->email}}</td>
      <td>{{$a->name}}</td>
      <td>
        <div class="row">
          <div>
            <button type="button" data-toggle="modal" value="{{$a->id}}" id="idnya" data-target="#exampleModalCenter1" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</button>
          </div>
          <div>
            <!-- <button type="button" id="getajax" onclick="myFunction()" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</button> -->
            <form method="post" action="{{url('/hapusakun')}}">
              @if(Auth::user()->id==$a->id)
              <input type="hidden" name="id_user" value="{{$a->id}}">
              {{ csrf_field() }}
              <div class="tooltip-wrapper disabled" data-title="Kamu tidak bisa menghapus dirmu sendiri">
                <button id="hapus" type="submit" class="btn btn-danger btn-rounded btn-fw" disabled><i class="fa fa-times" aria-hidden="true"></i>Hapus</button>
              </div>
              @else
              <input type="hidden" name="id_user" value="{{$a->id}}">
              {{ csrf_field() }}
              <button type="submit" onclick="myFunction()" class="btn btn-danger btn-rounded btn-fw"><i class="fa fa-times" aria-hidden="true"></i>Hapus</button>
              @endif
            </form>
          </div>
        </div>
      </td>
       <td>
        @if($a->id_det==null)
        <label class="badge badge-warning">Belum Terisi</label>
        @else
        <label class="badge badge-info">Sudah</label>
        @endif
      </td>
      <td>
        @if($a->id_det==null)
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Isi</button></a>
        @else
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</button></a>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" method="post" action="{{url('/tambahakun')}}">
        <div class="modal-body">
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="email" placeholder="Masukan email">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Retype Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="confirm_password" placeholder="Password">
              <label id="message" style="visibility: hidden;" class="badge badge-info"></label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
              <select class="form-control" name="role">
                @foreach($role as $role)
                <option value="{{$role->id}}">{{$role->display_name}}</option>
                @endforeach
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
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" method="post" action="{{url('/ubahakun')}}">
        <div class="modal-body">
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nama1" placeholder="Masukan Nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="email1" placeholder="Masukan email">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Retype Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="confirm_password1" placeholder="Password">
              <label id="message1" style="visibility: hidden;" class="badge badge-info"></label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
              <select class="form-control" name="role">
                @foreach($role1 as $role)
                <option value="{{$role->id}}">{{$role->display_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        {{ csrf_field() }}
        <input type="hidden" name="id_user" id="id_user">
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Ubah</button>
        </div>
      </form>
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
    $('#myTable').DataTable();
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
  function myFunction()
  {
    event.preventDefault(); // prevent form submit
    var form = event.target.form;
    swal({
      title: 'Hapus Akun',
      text: 'Apa Kamu Yakin Menghapus Akun',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        form.submit(); 
      }
    })
  }
</script>
@endsection