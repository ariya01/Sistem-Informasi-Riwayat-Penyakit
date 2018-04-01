@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Daftar Dokter</b></p>
    </span>
  </div>
</div>
<table id="myTable" class="table table-bordered">
  <thead>
    <tr>
      <th width="30%;">Nama</th>
      <th>Umur</th>
      <th>Detail</th>
      <th width="30%;" class="text-center">Bantuan</th>
    </tr>
  </thead>
  <tbody>
     @foreach($data as $a)
    <tr >
      <td>{{$a->name_user}}</td>
      <td><?php
      if($a->tanggal!=null)
      {
        $lahir = new DateTime($a->tanggal);
        $sekarang = new DateTime('now');
        echo $sekarang->diff($lahir)->y;  
      }
      else 
       echo "-";
       ?>
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
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-warning btn-rounded btn-fw xyz"><i class="fa fa-id-card" aria-hidden="true"></i>Isi</button></a>
        @else
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-id-card" aria-hidden="true"></i></i>Ubah</button></a>
        @endif
        <a href="{{url('/detailpasien/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-eye" aria-hidden="true"></i>Lihat</button></a>
      </td> 
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
@endsection