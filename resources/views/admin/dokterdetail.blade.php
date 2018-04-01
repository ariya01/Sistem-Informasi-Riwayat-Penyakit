@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endsection
@section('content')
@if(session()->has('message'))
@if(session()->get('message')=='Gagal')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Ulangi Menghapus',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil terhapus',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal1')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Non Aktifkan Dahulu',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal2')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Minimal 1 Harus Aktif',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal3')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba Aktifkan Ulang',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil1')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil diaktifkan',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil2')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil dinonaktifkan',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal4')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba Non Aktifkan Ulang',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal5')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Hanya 1 yang boleh Aktif',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal6')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba Ulangi lagi',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil3')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil tambah pendidikan',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Berhasil4')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Berhasil ubah pendidikan',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal7')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba Ulangi lagi',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@endif
@endif
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="container" style="margin-top: 5%;">
      <div class="row">
        <div class="col-12">
          <img height="150" class="rounded-circle mx-auto d-block" src="{{asset('images/profile/1.png')}}">  
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row purchace-popup">
        <div class="col-12">
          <span class="d-flex alifn-items-center">
            <p class="h4"><b>Detail Dokter</b></p>
          </span>
        </div>
      </div>
      <p class="card-description font-weight-bold">
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
      <div class="row purchace-popup">
        <div class="col-12">
          <span class="d-flex alifn-items-center">
            <p class="h4"><b>Detail Pendidikan</b></p>
          </span>
        </div>
      </div>
      <button data-toggle="modal" data-target="#exampleModalCenter" style="margin-bottom: 2%;" type="button" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
      @if($data)
      <?php $jum=0;  ?>
      @foreach($data as $a)
      <?php $jum++;  ?>
      <div class="row purchace-popup">
        <div class="col-12">
          <span class="d-flex alifn-items-center">
            <p class="h6"><b>Pendidikan {{$jum}}
            </b></p>
          </span>
        </div>
      </div>
      <div>
        <div class="row">
          <div class="col-4">
          <p class="card-description font-weight-bold">
          Strata
        </p>
        <p style="margin-top: -2%;">
          {{$a->nama_strata}}
        </p>
        @if($a->nama_spesialis)
        <p class="card-description font-weight-bold">
          Spesialis
        </p>
        <p style="margin-top: -2%;">
          {{$a->nama_spesialis}}
        </p>
        @endif
        <p class="card-description font-weight-bold">
          Universitas
        </p>
        <p style="margin-top: -2%;">
          {{$a->nama_univ}}
        </p> 
          </div>
          <div class="col-1">
            @if($a->status==1)
            <label class="badge badge-info">Aktif</label>
            @else
            <label class="badge badge-warning">Tidak Aktif</label>
            @endif
          </div>
          <div class="col-2">
              <a href="{{url('/pendidikandok/'.$a->id_dokter)}}">
                <button type="submit" class="btn btn-info btn-rounded btn-fw"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</button>
              </a>
          </div>
          <div class="col-2">
              <form method="post" action="{{url('/hapusdok')}}">
              <input type="hidden" name="hapus" value="{{$a->id_dokter}}">
              {{ csrf_field() }}
              <button type="submit" onclick="myFunction()" class="btn btn-danger btn-rounded btn-fw"><i class="fa fa-times" aria-hidden="true"></i>Hapus</button>
              </form>
          </div>
           <div class="col-2">
              @if($a->status==1)
              <form method="post" action="{{url('/nondok')}}">
              {{ csrf_field() }}
              <input type="hidden" name="cek" value="{{$a->id_dokter}}">
              <button type="submit"  class="btn btn-info btn-rounded btn-fw"><i class="fa fa-check" aria-hidden="true"></i>Non Aktifkan</button>
              </form>
              @else
              <form method="post" action="{{url('/aktifdok')}}">
              {{ csrf_field() }}
              <input type="hidden" name="cek" value="{{$a->id_dokter}}">
              <button type="submit"  class="btn btn-info btn-rounded btn-fw"><i class="fa fa-check" aria-hidden="true"></i>Aktifkan</button>
              </form>
              @endif
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pendidikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" method="post" action="{{url('/tambahdok')}}">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Strata</label>
            <div class="col-sm-9">
              <select class="form-control" id="strata" name="strata">
                <option selected="true" disabled="disabled">Choose</option>  
                @foreach($strata as $a)
                <option value="{{$a->id_strata}}">{{$a->nama_strata}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Pendidikan</label>
            <div class="col-sm-9">
              <select class="form-control" name="pendidikan">
                <option selected="true" disabled="disabled">Choose</option>  
                @foreach($pendidikan as $a)
                <option value="{{$a->id_pendidikan}}">{{$a->nama_pendidikan}}</option>
                @endforeach
              </select>
            </div>
          </div>          
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Univ</label>
            <div class="col-sm-9">
              <select class="form-control" name="univ">
                <option selected="true" disabled="disabled">Choose</option>  
                @foreach($univ as $a)
                <option value="{{$a->id_univ}}">{{$a->nama_univ}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Spesialis</label>
            <div class="col-sm-9">
              <select class="form-control" id="spesial" name="spesial">
                <option selected="true" disabled="disabled">Choose</option>    
                @foreach($spesialis as $a)
                <option value="{{$a->id_spesialis}}">{{$a->nama_spesialis}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$personal->id}}">
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Tambah</button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('js')
<script type="text/javascript">
  var update_pizza = function ()
  {
    console.log($("#strata").val()==4);
    if($("#strata").val()==4)
    {
      $('#spesial').prop('disabled', false);
    }
    else
    {
      $('#spesial').prop('disabled', 'disabled');
    }
  }
  $(update_pizza);
  $("#strata").change(update_pizza);
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