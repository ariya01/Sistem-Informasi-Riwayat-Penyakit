@extends('admin2.master')
@section('menu1')
active
@endsection
@section('title')
Statistik
@endsection
@section('content')
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Dokter</h4>
              <p><b>{{$dokter}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Pasien</h4>
              <p><b>{{$pasien}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Data Obat</h4>
              <p><b>{{$obat}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Data Penyakit</h4>
              <p><b>{{$penyakit}}</b></p>
            </div>
          </div>
        </div>
      </div>
            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Jumlah Pemriksaan</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="js/plugins/chart.js"></script>
      <script type="text/javascript">
 var Years = new Array();
 var jumlah = new Array();
 $.ajax({    
                type: 'get',
                url: '/ajax10/',
                datatype: 'JSON',
                success:function(data){
                  // console.log(JSON.parse(data));
                  var data=$.parseJSON(data);
jQuery.each(data, function(index, value){
            console.log(jumlah);
            jumlah.push(value.periksa);
            Years.push(value.tahun);
        }); 
                }
              }); 

 console.log(jumlah);
</script>
      <script type="text/javascript">
      var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56]
          }
        ]
      };
      var pdata = [
        {
          value: 300,
          color: "#46BFBD",
          highlight: "#5AD3D1",
          label: "Complete"
        },
        {
          value: 50,
          color:"#F7464A",
          highlight: "#FF5A5E",
          label: "In-Progress"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
    </script>

@endsection
