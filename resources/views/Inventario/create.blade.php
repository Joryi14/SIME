@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Crear inventario
       <a href="{{route('inicio_inventario2')}}" class="btn btn-info pull-right">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a></h4>
     </div>
<form class= "form-horizontal" method="POST" action="/Inventario/store">
  @csrf
  <div class="panel-body">
      <div class="form-group">
        <label for="idEmergencias" class="col-sm-2 control-label">Id de las emergencias: </label>
        <div class="col-sm-9">
            <select id='SelectE' name="idEmergencias" style='width: 50%;' required>
            </select>
        </div>
      </div>
          <div class="form-group">
            <label for="Suministros" class="col-sm-2 control-label">Suministros: </label>
            <div class="col-sm-4">
                <input type="number" min="0"  name="Suministros" class= "form-control" >
            </div>
          </div>

          <div class="form-group">
                <label class="col-sm-2 control-label">
                    Colchonetas:</label>
                    <div class="col-sm-4">
                  <input type="number" min="0"  class= "form-control"  name="Colchonetas">
                    </div>
        </div>
        <div class="form-group">
              <label class="col-sm-2 control-label">
                  Cobijas:</label>
                  <div class="col-sm-4">
                <input type="number" min="0" class= "form-control"  name="Cobijas">
                 </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
          Ropa:</label>
        <div class="checkbox">
              <input type="hidden" name="Ropa" value="0" />
              <input type="checkbox"  name="Ropa" value="1"/>
      </div>
      </div>
    <div class="panel-footer">
        @include("Includes.boton-form-create")
    </div>
  </div>
</form>
</div>
@endsection
@section('Script')
<script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
<script type="text/javascript">
  // CSRF Token
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $("#SelectE").select2({
      ajax: {
        url: "{{route('Get_Emerge')}}",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term // search term
          };
        },
        processResults: function (response) {
          return {
            results:  $.map(response,function(item){
              return{
                    text: item.id + ' '+item.NombreEmergencias,
                    id:item.id
              }
            })
          };
        },
        cache: true
      }
    });
  });
  </script>
  @endsection
