@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        @include('Includes.mensaje-Error')
        @include('Includes.Error-form')
     <div class="box box-info">
        <div class="box-header with-border"  style="padding:2%">
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_Retiro_PaquetesV')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
            <h3 class="box-title">Crear retiro de paquetes</h3>
        </div>
        <form class="form-horizontal" method="POST" action="/Retiro_PaquetesV/store">
          
          @csrf
          <div class="box-body">
            <input type="hidden" name="IdAdministradorI" class= "form-control" value="{{auth::user()->id}}" > 
            <div class="form-group">
              <label for="NombreChofer" class="col-sm-2 control-label">Nombre del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="NombreChofer" class= "form-control" >
              </div>
            </div>
            <div class="form-group">
              <label for="Apellido1C" class="col-sm-2 control-label">Primer apellido del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="Apellido1C" class= "form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="Apellido2C" class="col-sm-2 control-label">Segundo apellido del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="Apellido2C" class= "form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="IdVoluntario" class="col-sm-2 control-label">Cédula de voluntario: </label>
                <div class="col-sm-10">
                    <div class="col-sm-9">
                           <select id='SelectU' name="IdVoluntario" style='width: 70%;'>
                           <option value='0'>Seleccionar una cédula de voluntario</option></select>
                    </div>
             </div>
              </div>
              <div class="form-group">
                  <label for="PlacaVehiculo" class="col-sm-2 control-label">Placa de vehículo: </label>
                  <div class="col-sm-8">
                      <input type="text" name="PlacaVehiculo" class= "form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="DireccionAEntregar" class="col-sm-2 control-label">Dirección a entregar: </label>
                    <div class="col-sm-8">
                        <input type="text" name="DireccionAEntregar" class= "form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="SuministrosGobierno" class="col-sm-2 control-label">Suministros del gobierno: </label>
                        <div class="col-sm-8">
                            <input type="text" name="SuministrosGobierno" class= "form-control" > 
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="SuministrosComision" class="col-sm-2 control-label">Suministros de la comision: </label>
                          <div class="col-sm-8">
                              <input type="text" name="SuministrosComision" class= "form-control" >
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="IdInventario" class="col-sm-2 control-label">Id del Inventario: </label>
                            
                            <div class="col-sm-9">
                                <select id='SelectI' name="IdInventario"  style='width: 70%;'>
                                <option value='0'>Seleccionar un Inventario</option></select>
                         </div>
                          </div>
                          <div class="form-group">
                            <label for="IdEmergencia" class="col-sm-2 control-label"> Emergencia:</label>
                            <div class="col-sm-9" style="padding:2%">
                                <select id='SelectE' name="idEmergencia" style='width: 50%;' required>
                                </select>
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
    $("#SelectE").select2({
      ajax: { 
        url: "{{route('Get_EmergeR')}}",
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