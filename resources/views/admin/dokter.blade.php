@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.0/semantic.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css">
@endsection
@section('content')

<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title text-center">Daftar Dokter</h1>
                <table id="myTable" class="ui celled table">
  <thead>
    <tr>
      <th width="5%;" data-orderable="false"></th>
      <th>KTP</th>
      <th>Nama</th>
      <th>Umur</th><!-- 
      <th>Pendidikan Terakhir</th>
      <th>Spesialisasi</th> -->
      <!-- <th>Detail</th> -->
      <!-- <th>Pendidikan</th> -->
      <!-- <th class="text-center">Bantuan</th> -->
    </tr>
  </thead>
  <tbody>
     @foreach($data as $a)
    <tr >
      <td>
        <div class="profile-image"> <img style="border-radius: 50%;" src="{{asset('images/profile/page.jpg')}}" alt="image"/> <span class="online-status online"></span> </div>
      </td>
      <td>@if ($a->ktp!=null)
        {{$a->ktp}}
        @else
        Belum di isi
        @endif</td>
      <td>
        <a href="{{url('dokterdetail/'.$a->id)}}">
        {{$a->name_user}}
        </a>
      </td>
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
       </td><!-- 
      <td>{{$a->nama_strata}}</td>
      <td>x
        @if($a->nama_spesialis)
        {{$a->nama_spesialis}}
        @else
        -
        @endif
      </td>
      <td> 
        @if($a->id_det==null)
        <label class="badge badge-warning">Belum Terisi</label>
        @else
        <label class="badge badge-info">Sudah</label>
        @endif
      </td>
      <td>
        <label class="badge badge-info">Sudah</label>
      </td> -->
  <!--     <td>
        @if($a->id_det==null)
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-warning btn-rounded btn-fw xyz"><i class="fa fa-id-card" aria-hidden="true"></i>Isi</button></a>
        @else
        <a href="{{url('/detail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-id-card" aria-hidden="true"></i></i>Ubah</button></a>
        @endif
        <a href="{{url('/dokterdetail/'.$a->id)}}"><button type="button" id="idnya" class="btn btn-primary btn-rounded btn-fw xyz"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Ubah</button></a>
      </td>  -->
    </tr>
    @endforeach
  </tbody>
</table>
              </div>
              </div>
            </div>
</div>

@endsection
@section('js')
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
   $('#icon2').removeClass('icon-md');
   $('#icon2').addClass('icon-lg');
</script>
@endsection