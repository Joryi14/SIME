@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.mensaje-Error')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Crear persona en albergue
       <a href="{{route('inicio_personasAlbergue2')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a></h4>
     </div>
    <form class="form-horizontal" method="POST" action="/PersonasAlbergue/store">
            @csrf
            <div class="panel-body">
                <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" >
                <div class="form-group">
                  <label for="idEmergencias" class="col-sm-2 control-label">Id de la emergencia: </label>
                             <select id='SelectE' name="idEmergencias" style='width: 50%;' required>
                             </select>
                </div>
                <div class="form-group">
                <label for="idAlbergue" class="col-sm-2 control-label">Nombre del albergue: </label>
                           <select id='SelectA' name="idAlbergue" style='width: 50%;' required>
                           </select>
              </div>
              <div class="form-group">
                <label for="idJefe"  class="col-sm-2 control-label">Cédula del jefe de familia:</label>
                    <select id='SelectJ' name="idJefe" style='width: 50%;' required>
                        </select>
                    {{-- <input type="text" name="idJefe" class= "form-control" > --}}

              </div>
              <div class="form-group">
                  <label class="col-sm-2" class="col-sm-2 control-label"> O </label>
                <div class="col-sm-3">
                <a href="{{route('jefe_create')}}" class="btn btn-block btn-primary btn-sm">
                  <i class="fa fa-fw fa-plus-circle"></i> Crear jefe de familia
              </a>
            </div>
          </div>
          <div class="form-group">
                  <label for="LugarDeProcedencia" class="col-sm-2 control-label">Lugar de procedencia:  </label>
                  <div class="col-sm-8">
                      <input type="text" name="LugarDeProcedencia" class= "form-control" >
                  </div>
                </div>
                <div class="form-group">
                    <label for="FechaDeIngreso" class="col-sm-2 control-label">Fecha de ingreso: </label>
                    <div class="col-sm-3">
                        <input type="date" name="FechaDeIngreso" class= "form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="HoraDeIngreso" class="col-sm-2 control-label">Hora de ingreso: </label>

                      <div class="col-sm-2">
                          <input type="time" name="HoraDeIngreso" class= "form-control">
                      </div>
                    </div>

                      {{-- <div class="form-group">
                          <label for="FechaDeSalida" class="col-sm-2 control-label">Fecha de salida: </label>

                          <div class="col-sm-3">
                              <input type="date" name="FechaDeSalida" class= "form-control" >
                          </div>
                        </div>

                          <div class="form-group">
                              <label for="HoraDeSalida" class="col-sm-2 control-label">Hora de salida: </label>

                              <div class="col-sm-2">
                                  <input type="time" name="HoraDeSalida" class= "form-control" >
                              </div>
                            </div> --}}
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
    $("#SelectJ").select2({
      placeholder:"Seleccionar un jefe",
      ajax: {
        url: "{{route('Get_IdJF')}}",
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
                    text: item.Cedula+', '+item.Nombre+' '+item.Apellido1+' '+item.Apellido2,
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
 <!-- Script -->
 <script type="text/javascript">
   // CSRF Token
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
     $("#SelectA").select2({
       placeholder:"Seleccionar un albergue",
       ajax: {
         url: "{{route('Get_Albergue')}}",
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
   <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      $("#SelectE").select2({
        placeholder:"Seleccionar una emergencia",
        ajax: {
          url: "{{route('Get_EmergenciaP')}}",
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
