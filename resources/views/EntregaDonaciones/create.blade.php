@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="box-title">Crear entrega de donaciones
       <a href="{{route('inicio_EntregaDonaciones2')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a></h4>
     </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonaciones/store" enctype="multipart/form-data">
        @csrf
      <div class="panel-body">
            <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" class= "form-control" >
            <div class="form-group">
                <label for="IdJefe" class="col-sm-2 control-label"> Jefe de familia:</label>
                <div class="col-sm-9">
                    <select id='SelectJ' name="IdJefe" style='width: 50%;'>
                    <option value='0'>Seleccionar un jefe</option></select>
                </div>
              </div>
             <div class="form-group">
                    <label for="IdRetiroPaquetes" class="col-sm-2 control-label">Id del retiro de paquetes: </label>
                    <div class="col-sm-9">
                        <select id='SelectR' name="IdRetiroPaquetes" style='width: 50%;'>
                        <option value='0'>Seleccionar un paquete</option></select>
                    </div>
             </div>
             <div class="form-group">
                <label for="Foto" class="col-sm-2 control-label">Foto: </label>
                    <input type="file" name="Foto" accept="image/*"  >
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
         $("#SelectJ").select2({
           ajax: {
             url: "{{route('Get_JefeE')}}",
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
          $("#SelectR").select2({
            ajax: {
              url: "{{route('Get_Paquete')}}",
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
