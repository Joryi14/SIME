@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.mensaje-Error')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Crear retiro de paquetes
       <a href="{{route('inicio_Retiro_PaquetesV')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a></h4>
     </div>
        <form class="form-horizontal" method="POST" action="/Retiro_PaquetesV/store">
          @csrf
          <div class="panel-body">
            <input type="hidden" name="IdAdministradorI" class= "form-control" value="{{auth::user()->id}}" >
            <div class="form-group">
              <label for="NombreChofer" class="col-sm-2 control-label">Nombre del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" value="{{old('NombreChofer', $data->NombreChofer ?? '')}}" name="NombreChofer" class= "form-control" >
              </div>
            </div>
            <div class="form-group">
              <label for="Apellido1C" class="col-sm-2 control-label">Primer apellido del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" value="{{old('Apellido1C', $data->Apellido1C ?? '')}}" name="Apellido1C" class= "form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="Apellido2C" class="col-sm-2 control-label">Segundo apellido del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" value="{{old('Apellido2C', $data->Apellido2C ?? '')}}" name="Apellido2C" class= "form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="IdVoluntario" class="col-sm-2 control-label">Cédula de voluntario: </label>
                <div class="col-sm-10">
                    <div class="col-sm-9">
                           <select id='SelectU'  name="IdVoluntario" style='width: 70%;'>
                           <option value='0'>Seleccionar una cédula de voluntario</option></select>
                    </div>
             </div>
              </div>
              <div class="form-group">
                  <label for="PlacaVehiculo" class="col-sm-2 control-label">Placa de vehículo: </label>
                  <div class="col-sm-8">
                      <input type="text" value="{{old('PlacaVehiculo', $data->PlacaVehiculo ?? '')}}" name="PlacaVehiculo" class= "form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="DireccionAEntregar" class="col-sm-2 control-label">Dirección a entregar: </label>
                    <div class="col-sm-8">
                        <input type="text" value="{{old('DireccionAEntregar', $data->DireccionAEntregar ?? '')}}" name="DireccionAEntregar" class= "form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="SuministrosGobierno" class="col-sm-2 control-label">Suministros del gobierno: </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{old('SuministrosGobierno', $data->SuministrosGobierno ?? '')}}" min="0" name="SuministrosGobierno" class= "form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="SuministrosComision" class="col-sm-2 control-label">Suministros de la comision: </label>
                          <div class="col-sm-8">
                              <input type="number" value="{{old('SuministrosComision', $data->SuministrosComision ?? '')}}" min="0" name="SuministrosComision" class= "form-control" >
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="IdInventario" class="col-sm-2 control-label">Id del Inventario: </label>
                            <div class="col-sm-9">
                                <select id='SelectI' name="IdInventario"  style='width: 70%;'>
                                <option value='0'>Seleccionar un Inventario</option></select>
                         </div>
                          </div>
                     </div>
                     <div class="panel-footer">
                        @include("Includes.boton-form-create")
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
    $("#SelectU").select2({
      ajax: {
        url: "{{route('Get_UsersR')}}",
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
            results: $.map(response,function(item){
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
  <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      $("#SelectI").select2({
        ajax: {
          url: "{{route('Get_Inv')}}",
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
              results: response
            };
          },
          cache: true
        }
      });
    });
    </script>
  @endsection
