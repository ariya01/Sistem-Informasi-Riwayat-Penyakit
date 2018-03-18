@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
@endsection
@section('content')
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
      <th>Cek Up</th>
      <th>Umur</th>
      <th>Tinggi</th>
      <th>Berat</th>
      <th>Perintah</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $a)
    <tr >
      <td>{{$a->name}}</td>
      <td>{{$a->email}}</td>
      <td>{{$a->role}}</td>
      <td>@if ($a->status=='0')
        Tidak
        @else
        Iya
        @endif
      </td>  
      <td><?php 
      $lahir = new DateTime($a->tgl);
      $sekarang = new DateTime('today');
      echo $sekarang->diff($lahir)->y;?>
    </td>
    <td>{{$a->tinggi}}</td>
    <td>{{$a->berat}}</td>
    <td>
      <div class="row">
        <div>
          <button type="button" class="btn btn-primary btn-rounded btn-fw">Edit</button>
        </div>
        <div>
          <button type="button" class="btn btn-danger btn-rounded btn-fw">Delete</button>
        </div>
      </div>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample">
        <div class="modal-body">
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Masukan Nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Masukan email">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" placeholder="Password">
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
            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-4">
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                  Laki-Laki
                </label>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                  Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="exampleInputPassword2">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Masukan Alamat">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tinggi</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="exampleInputPassword2" placeholder="Masukan Tinggi">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Berat</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="exampleInputPassword2" placeholder="Masukan Berat">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
              <select class="form-control">
                @foreach($role as $role)
                <option>{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
@endsection