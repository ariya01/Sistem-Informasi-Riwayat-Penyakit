@extends('admin.master')
@section('css')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endsection
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ubah Pendidikan</h4>
      <form class="forms-sample" method="post" action="{{url('editdok')}} ">
        <input type="hidden" id="id" name="id" value="{{$id}}">
        <input type="hidden" name="id_user" value="{{$detail->id_user}}">
        <div class="form-group">
          <label for="exampleFormControlSelect2">Strata</label>
          <select class="form-control" name="strata" id="strata">
            <option selected="true" disabled="disabled">Choose</option>  
            @foreach($strata as $role)
            <option value="{{$role->id_strata}}">{{$role->nama_strata}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Pendidikan</label>
          <select class="form-control" name="pendidikan" id="pendidikan">
            <option selected="true" disabled="disabled">Choose</option>  
            @foreach($pendidikan as $role)
            <option value="{{$role->id_pendidikan}}">{{$role->nama_pendidikan}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Universitas</label>
          <select class="form-control" name="univ" id="univ">
            <option selected="true" disabled="disabled">Choose</option>  
            @foreach($univ as $role)
            <option value="{{$role->id_univ}}">{{$role->nama_univ}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Spesialis</label>
          <select class="form-control" name="spesialis" id="spesialis">
            <option selected="true" disabled="disabled">Choose</option>  
            @foreach($spesialis as $role)
            <option value="{{$role->id_spesialis}}">{{$role->nama_spesialis}}</option>
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
@endsection
@section('js')
<script type="text/javascript">
  var bla = $('#id').val();
  // alert(bla);
  if(bla)
  {
    $.ajax({    
      type: 'get',
      url: '/getdok/'+bla,
      datatype: 'JSON',
      success:function(data){
        console.log(JSON.parse(data));
        $("#strata").val(JSON.parse(data).id_strata);
        $("#pendidikan").val(JSON.parse(data).id_pendidikan);
        $("#univ").val(JSON.parse(data).id_univ);
        $("#spesialis").val(JSON.parse(data).id_spesialis);
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
<script type="text/javascript">
  var update_pizza = function ()
  {
    console.log($("#strata").val()==4);
    if($("#strata").val()==4)
    {
      $('#spesialis').prop('disabled', false);
    }
    else
    {
      $('#spesialis').prop('disabled', 'disabled');
    }
  }
  $(update_pizza);
  $("#strata").change(update_pizza);
</script>
@endsection