@extends('admin.master')
@section('content')
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Data Warehouse</b></p>
    </span>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-wheelchair text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Pasien</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$pasien}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-lock text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Admin</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$admin}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-user-md text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Dokter</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">{{$dokter}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-hospital-o text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Jumlah Rumah Sakit</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">$65,650</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-heartbeat text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Data Penyakit</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">$65,650</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fa fa-medkit text-primary icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="card-text text-right">Data Obat</p>
            <div class="fluid-container">
              <h3 class="card-title font-weight-bold text-right mb-0">$65,650</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-flex alifn-items-center">
      <p class="h4"><b>Statistik</b></p>
    </span>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Targets</h5>
        <canvas id="dashoard-area-chart" height="100px"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="node_modules/jquery/dist/jquery.min.js"></script>
@endsection