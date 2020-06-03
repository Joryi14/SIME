@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/MAP/leaflet.css")}}"/>
@endsection
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Succes')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="content-row-title">Crear emergencia
      <a href="{{route('inicio_emergencia')}}" class="btn  btn-info pull-right">
          <i class="fa fa-fw fa-reply-all"></i> Regresar
      </a>
          </h4>
    </div>
<form class= "form-horizontal" method="POST" action="/Emergencia/store">
  @csrf
  <div class="panel-body">
      <div class="form-group">
        <label for="NombreEmergencias" class="col-sm-2 control-label">Nombre de la emergencia: </label>
        <div class="col-sm-8">
            <input type="text" name="NombreEmergencias" class= "form-control" >
        </div>
      </div>

      <div class="form-group">
        <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>

      <div class="btn-group-horizontal" style="margin-top:2%">
        <input type="radio" name="Categoria" value="Grave"><span style="padding:1%; color:red">Grave</span>

        <input type="radio" name="Categoria" value="Moderada"><span style="padding:1%; color:orange">Moderada </span>

        <input type="radio" name="Categoria" value="Leve"><span style="padding:1%; color:green">Leve </span>
      </div>
      </div>
        <div class="form-group">
            <label for="TipoDeEmergencia" class="col-sm-2 control-label">Tipo de emergencia: </label>

            <div class="col-sm-8">
                <input type="text" name="TipoDeEmergencia" class= "form-control" >
            </div>
          </div>
          <div class="form-group">
              <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>

              <div class="col-sm-8">
                  <input type="text" name="Descripcion" class= "form-control" >
              </div>
            </div>
            <br>
            <table style="width: 100%;
            margin-right: auto;
            margin-left: auto;
            display: inline;
            float: left;
            text-align: center;">
           <div id="mapid" style=" margin-right: auto;
           margin-left: auto; width: 400px; height: 250px; position: relative;"></div>
          </table>
          <br>
            <div class="form-group">
                <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>

                <div class="col-sm-8">
                    <input type="text" id="lg" name="Longitud" class= "form-control" >
                </div>
              </div>

              <div class="form-group">
                  <label for="Latitudd"  class="col-sm-2 control-label">Latitud: </label>

                  <div class="col-sm-8">
                      <input type="text" id="lt" name="Latitud" class= "form-control" >
                  </div>
                </div>
                <div class="form-group">
                    <label for="Radio"  class="col-sm-2 control-label">Radio: </label>

                    <div class="col-sm-8">
                      <select id="distance-selector" name="Radio" style="width:15%">
                      <option value="500">500m</option>
                      <option value="1000">1km</option>
                      <option value="5000">5km</option>
                      <option value="10000">10km</option>
                      <option value="50000">50km</option>
                        </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="Estado">Estado</label>
                  <div class="col-sm-8">
                    <label class="toggle">
                        <input type="hidden" name="Estado" value="Inactiva">
                        <input type="checkbox" name="Estado" value="Activa">
                        <span class="handle"></span>
                      </label>
                  </div>
                </div>
                </div>
              <div class="panel-footer">
                  @include("Includes.boton-form-create")
              </div>
        </form>
  </div>
      @section('Script')
      <script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
      <script>
      $(document).ready(function() {
        $('#distance-selector').select2();
      });
      </script>
      <script src="{{asset("assets/MAP/leaflet.js")}}"></script>
      <script>
      var mymap = L.map('mapid').setView([9.9789728,-85.6605546], 13);
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
      }).addTo(mymap);
      var marker;
  var circle;
  var all;
  mymap.on('click', function (e) {
      if (all) {
          mymap.removeLayer(all);
      }
      marker = new L.Marker(e.latlng, { draggable: true });
      circle = new L.circle(e.latlng, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 500 });
      var circlePos = e.latlng;
      var Longitud = document.getElementById("lg");
      var latitud = document.getElementById("lt");
      latitud.value = marker.getLatLng().lat;
      Longitud.value = marker.getLatLng().lng;
      $('#distance-selector').on('change', function () {
          if (circle) {
              mymap.removeLayer(circle);
          }
          if (this.value == "") {
              circle = new L.circle(circlePos, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 500 });
          }
          if (this.value == "500") {
              circle = new L.circle(circlePos, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 500 });
          }
          if (this.value == "1000") {
              circle = new L.circle(circlePos, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 1000 });
          }
          if (this.value == "5000") {
              circle = new L.circle(circlePos, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 5000 });
          }
          if (this.value == "10000") {
              circle = new L.circle(circlePos, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 10000 });
          }
          if (this.value == "50000") {
              circle = new L.circle(circlePos, { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 50000 });
          }
          all = L.layerGroup([marker, circle]);
          mymap.addLayer(all);
      });
      marker.on('dragend', function (e) {
          if (circle) {
              mymap.removeLayer(circle);
          }
          circle = new L.circle(e.target.getLatLng(), { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,radius: 500 });
          all = L.layerGroup([marker, circle]);
          mymap.addLayer(all);
      });

      all = L.layerGroup([marker, circle]);
      mymap.addLayer(all);
  });
      </script>
        @endsection
@endsection
