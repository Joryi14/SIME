@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/MAP/leaflet.css")}}"/>
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
          <table style="width: 100%;
          margin-right: auto;
          margin-left: auto;
          display: inline;
          float: left;
          text-align: center;" >
         <div id="mapid" style=" margin-right: auto;
         margin-left: auto; width: 400px; height: 250px; position: relative;"></div>
        </table><br>
          <div class="form-group">
              <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
              <div class="col-sm-9">
                  <input type="text" id="lg" name="Longitud" class= "form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label for="Latitud" class="col-sm-2 control-label">Latitud: </label>
              <div class="col-sm-9">
                  <input type="text" id="lt" name="Latitud" class= "form-control" required>
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
        <div class="panel-footer">
            @include("Includes.boton-form-create")
        </div>
      </form>
    </div>
  </div>
@section('Script')
<script src="{{asset("assets/MAP/leaflet.js")}}"></script>
<!-- Script -->
<script>
var mymap = L.map('mapid').setView([9.9789728,-85.6605546], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/streets-v11'
}).addTo(mymap);
var mark = L.marker([9.9789728,-85.6605546]).addTo(mymap);
function onMapClick(e) {
        mark.setLatLng(e.latlng);
        var Longitud = document.getElementById("lg");
        var latitud = document.getElementById("lt");
        latitud.value = mark.getLatLng().lat;
        Longitud.value = mark.getLatLng().lng;
      }

mymap.on('click', onMapClick);
</script>
@endsection

@endsection
