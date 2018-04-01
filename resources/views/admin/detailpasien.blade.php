@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endsection
@section('content')
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
            <p class="h4"><b>Detail Pasien</b></p>
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
</div>
</div>
</div>
@endsection