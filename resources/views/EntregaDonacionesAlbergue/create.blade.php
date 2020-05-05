@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.mensaje-Error')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Crear entrega de donaciones en albergue
       <a href="{{route('inicio_EntregaDonacionesAF')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a></h4>
     </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonacionesAlbergue/store" files="true" >
        @csrf
             <div class="panel-body">
                <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" class= "form-control" >
             <div class="form-group">
                    <label for="IdJefeFa" class="col-sm-2 control-label">Jefe de familia: </label>
                    <div class="col-sm-9">
                        <select id='SelectJ' name="IdJefeFa" style='width: 50%;'>
                            </select>
                {{-- <input type="text" name="IdJefeFa" class= "form-control" > --}}
                    </div>
             </div>
             <div class="form-group">
                <label for="IdAlbergue" class="col-sm-2 control-label">Albergue: </label>
                <div class="col-sm-9">
                    <select id='SelectA' name="idAlbergue" style='width: 50%;'>
                       </select>
            {{-- <input type="text" name="IdJefeFa" class= "form-control" > --}}
                </div>
         </div>
         <div class="form-group">
            <label for="IdEmergencias" class="col-sm-2 control-label">Emergencia: </label>
            <div class="col-sm-9">
                <select id='SelectE' name="idEmergencias" style='width: 50%;'>
                    </select>
        {{-- <input type="text" name="IdJefeFa" class= "form-control" > --}}
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
     <!-- Script -->
     <script type="text/javascript">
       // CSRF Token
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $(document).ready(function(){
         $("#SelectJ").select2({
           ajax: {
             url: "{{route('Get_IdJefeFa')}}",
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
       <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
          $("#SelectA").select2({
            ajax: {
              url: "{{route('Get_AlbergueE')}}",
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
              ajax: {
                url: "{{route('Get_IdEme')}}",
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
