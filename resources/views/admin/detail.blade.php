@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endsection
@section('content')
@if(session()->get('message')=='Berhasil')
<script type="text/javascript">
  swal
  ({
    title: 'Berhasil',
    text: 'Akun berhasil terdaftar',
    type: 'success',
    confirmButtonText: 'Iya'
  })
</script>
@elseif(session()->get('message')=='Gagal')
<script type="text/javascript">
  swal
  ({
    title: 'Gagal',
    text: 'Coba lagi',
    type: 'error',
    confirmButtonText: 'Iya'
  })
</script>
@endif
<div class="col-12">
  <div
   class="card">
    <div class="card-body">
      <h4 class="card-title">Detail Akun</h4>
      <form class="forms-sample" method="post" action="{{url('isidetail')}} ">
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Contoh: Perumahan Dosen">
            <div class="input-group-append">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Berat</label>
            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input type="number" class="form-control" name="berat" id="berat" placeholder="Contoh: 60" >
              <div class="input-group-append bg-primary border-primary">
                <span class="input-group-text  bg-transparent text-white">Kg</span>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tinggi</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input type="number" class="form-control" name="tinggi" id="tinggi" placeholder="Contoh: 150">
                <div class="input-group-append bg-primary border-primary">
                  <span class="input-group-text  bg-transparent text-white">cm</span>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <input type="date" class="form-control" name="tanggal" id="lahir" >
                  <div class="input-group-append">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" >Kontak</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Contoh: 089XXXXXXXXX">
                    <div class="input-group-append">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Default select</label>
                    <select class="form-control" name="kel">
                      @foreach($kelamins as $role)
                      <option value="{{$role->id_kel}}">{{$role->JenisKelamin}}</option>
                      @endforeach
                    </select>
                  </div>
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-light">Reset</button>
                </form>
              </div>
            </div>
          </div>
          <input type="hidden" name="id_user" value="{{$id}}">
          @if ($data!=null)
          <input type="hidden" name="id" id="id" value="{{$data->id_user}}">
          @endif
          @endsection
          @section('js')
          <script type="text/javascript">
            var bla = $('#id').val();
            // alert(bla);
            if(bla)
            {
              $.ajax({    
              type: 'get',
              url: '/get/'+bla,
              datatype: 'JSON',
              success:function(data){
                console.log(JSON.parse(data));
                $("#alamat").val(JSON.parse(data).alamat);
                $("#berat").val(JSON.parse(data).berat);
                $("#tinggi").val(JSON.parse(data).tinggi);
                $("#kontak").val(JSON.parse(data).kontak);
                $("#lahir").val(JSON.parse(data).tanggal);
              },
              error:function(data){
                console.log('data belum ada');
              }
            }); 
            }
            else
            {
              console.log('data belum ada');
            }
            
          </script>
          <!-- <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script> -->
          @endsection