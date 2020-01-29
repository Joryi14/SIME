@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/MAP/leaflet.css")}}"/>    
@endsection
@section('Contenido')
<div class="row">
    <div class="col-md-10">
      @include('Includes.Error-form')
      @include('Includes.mensaje-Error')
        <div class="box box-info">
          <div class="box-header with-border"style="padding:2%">
           <h3 class="box-title">Crear albergue</h3>
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_albergue')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
          </div>
<form class= "form-horizontal" method="POST" action="/Albergue/store">
  @csrf
  <div class="box-body">
      <div class="form-group">
        <label for="Nombre" class="col-sm-2 control-label">Nombre del albergue: </label>
        <div class="col-sm-8">
            <input type="text" name="Nombre" class= "form-control" >
        </div>
      </div>

      <div class="form-group">
          <label for="Distrito" class="col-sm-2 control-label">Distrito: </label>

          <div class="col-sm-8">
              <input type="text" name="Distrito" class= "form-control" >
          </div>
        </div>


        <div class="form-group">
            <label for="Comunidad" class="col-sm-2 control-label">Comunidad: </label>
  
            <div class="col-sm-8">
                <input type="text" name="Comunidad" class= "form-control" >
            </div>
          </div>


          <div class="form-group">
              <label for="TipoDeInstalacion" class="col-sm-2 control-label">Tipo de instalación: </label>
    
              <div class="col-sm-8">
                  <input type="text" name="TipoDeInstalacion" class= "form-control" >
              </div>
            </div>
  
            <div class="form-group">
                <label for="Capacidad" class="col-sm-2 control-label">Capacidad del lugar: </label>
      
                <div class="col-sm-8">
                    <input type="number" name="Capacidad" class= "form-control" >
                </div>
              </div>


              <div class="form-group">
                <label for="IdResponsable" class="col-sm-2 control-label"> Responsable:</label>
                <div class="col-sm-9" style="padding:2%">
                    <select id='SelectU' name="model_id" style='width: 50%;' required>
                    </select>
                </div>
              </div>

             <div class="form-group">
                     <label for="telefono" class="col-sm-2 control-label">Teléfono: </label>
              
                    <div class="col-sm-8">
                     <input type="text" name="telefono" class= "form-control" >
                     </div>
                  </div>

                  <div class="form-group">
                        <div class="checkbox">
                               <label class="col-sm-2 control-label">
                               Duchas
                               <input type="hidden" name="Duchas" value="0" />
                               <input type="checkbox" class="col-sm-6" name="Duchas" value="1">  
                        </label>
                        </div>  
                    </div> 

                 <div class="form-group">
                       <div class="checkbox">
                               <label class="col-sm-2 control-label">
                                Inodoros
                                <input type="hidden" name="inodoros" value="0" />
                                <input type="checkbox" class="col-sm-6" name="inodoros" value="1">  
                         </label>
                         </div>  
                        </div> 
        
         <div class="form-group">
                <div class="checkbox">
                      <label class="col-sm-2 control-label">
                      Espacios de cocina
                      <input type="hidden" name="EspaciosDeCocina" value="0" />
                      <input type="checkbox" class="col-sm-6" name="EspaciosDeCocina" value="1">  
                 </label>
                </div>  
                </div> 

                <div class="form-group">
                        <div class="checkbox">
                           <label class="col-sm-2 control-label">
                                Bodega
                            <input type="hidden" name="Bodega" value="0" />
                              <input type="checkbox" class="col-sm-6" name="Bodega" value="1">  
                        </label>
                        </div>                          
                    </div> 
                    <br>
                    <table style="width: 100%;
                    margin-right: auto;
                    margin-left: auto;
                    display: inline;
                    float: left;
                    text-align: center;" >
                   <div id="mapid" style=" margin-right: auto;
                   margin-left: auto; width: 400px; height: 250px; position: relative;"></div>  
                  </table>
                   
    
    
                    <div class="form-group">
            <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
  
            <div class="col-sm-8">
                <input type="text" id="lg" name="Longitud" class= "form-control" >
            </div>
          </div>
     
          

              <div class="form-group">

                

                  <label for="Latitud" class="col-sm-2 control-label">Latitud: </label>
        
                  <div class="col-sm-8">
                      <input type="text" id="lt" name="Latitud" class= "form-control" >
                  </div>
                </div>
  


                <div class="form-group">
                        <label for="Nececidades" class="col-sm-2 control-label">Nececidades: </label>
                 
                       <div class="col-sm-8">
                        <input type="text" name="Nececidades" class= "form-control" >
                        </div>
                </div>              
          
              </div>
              <div class="box-footer">
                  @include("Includes.boton-form-create")
              </div>
          </form>
        </div>
      </div>
      </div>
@endsection
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
var Albergue = L.icon({
        iconUrl:      '../assets/MAP/images/Albergue.png',
        iconSize:     [30, 30],
});
var mark = L.marker([9.9789728,-85.6605546],{icon: Albergue}).addTo(mymap);
function onMapClick(e) {
        mark 
        .setLatLng(e.latlng);
        var Longitud = document.getElementById("lg");
        var latitud = document.getElementById("lt");
        latitud.value = mark.getLatLng().lat;
        Longitud.value = mark.getLatLng().lng;

      }

mymap.on('click', onMapClick);
</script>
<script type="text/javascript">
  // CSRF Token
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $("#SelectU").select2({
      ajax: { 
        url: "{{route('Get_UsersA')}}",
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
                    text: item.Cedula+', '+item.name+' '+item.Apellido1+' '+item.Apellido2,
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