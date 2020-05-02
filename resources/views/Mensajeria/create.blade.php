@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-warning">
  <div class="panel-heading">
    <h4 class="content-row-title">Crear reporte de incidente
      <a href="{{route('inicio_mensaje')}}" class="btn btn-info pull-right">
          <i class="fa fa-fw fa-reply-all"></i> Regresar
      </a>
          </h4>
    </div>
      <form class="form-horizontal" method="POST" action="/Mensajeria/store">
        @csrf
        <div class="panel-body">
          <div class="form-group">
            <label for="Codigo de Incidente" class="col-sm-2 control-label">Código de incidente:</label>
            <div class="col-sm-9">
                <input type="text" name="CodigoIncidente" class= "form-control" >
            </div>
          </div>
          <div class="form-group">
            <label for="Descripción" class="col-sm-2 control-label">Descripción: </label>
            <div class="col-sm-9">
              <input type="text" name="Descripcion" class= "form-control" >
            </div>
          </div>
          <div class="form-group">
              <label for="Ubicación" class="col-sm-2 control-label">Ubicación: </label>
              <div class="col-sm-9">
                  <input type="text" name="Ubicacion" class= "form-control" >
              </div>
            </div>
            <div class="form-group">
                <label for="Hora" class="col-sm-2 control-label">Hora: </label>
                <div class="col-sm-2">
                    <input type="time" name="Hora" class= "form-control">
                </div>
              </div>
              <div class="form-group">
                  <label for="Fecha" class="col-sm-2 control-label">Fecha: </label>
                  <div class="col-sm-3">
                      <input type="date" name="Fecha" class= "form-control" >
                  </div>
                </div>
                <div class="form-group">
                    <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>
                    <div class="btn-group-horizontal">

        <div class="btn-group-horizontal" style="margin-top:2%">
          <input type="radio" name="Categoria" value="Grave"><span style="padding:1%; color:red">Grave</span>

                      <input type="radio" name="Categoria" value="Moderada"><span style="padding:1%; color:orange">Moderada </span>

                      <input type="radio" name="Categoria" value="Leve"><span style="padding:1%; color:green">Leve </span>
                  </div>
          </div>
                  <input type="hidden" name="IdLiderComunal" class= "form-control" value="{{Auth::user()->id}}">
        </div>
        <div class="form-group">
          <label for="IdEmergencia" class="col-sm-2 control-label"> Emergencia:</label>
          <div class="col-sm-9" style="padding:2%">
              <select id='SelectE' name="idEmergencia" style='width: 50%;'>
              </select>
          </div>
        </div>
        <div class="panel-footer">
            @include("Includes.boton-form-create")
        </div>
      </form>
    </div>
  </div>
@section('Script')
<script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $("#SelectE").select2({
      ajax: {
        url: "{{route('Get_EmergeM')}}",
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
                    text: item.id+'  '+item.NombreEmergencias,
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
@endsection
