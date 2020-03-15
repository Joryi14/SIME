@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar entrega de donaciones en albergue
       <a href="{{route('inicio_EntregaDonacionesA')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonacionesAlbergue/{{$entregadonacionesA->IdEntregaA}}">
        @method('PUT')
        @csrf
             <div class="panel-body">
                <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" class= "form-control" >
             <div class="form-group">
                    <label for="IdJefeFa" class="col-sm-2 control-label">Id del jefe de familia: </label>
                    <div class="col-sm-9">
                        <select id='SelectJ' name="IdJefeFa" style='width: 25%;'>
                            <option value='0'>Seleccionar un jefe</option>
                          </select>
                      </div>
             </div>

      </div>
             <div class="panel-footer">
                @include("Includes.boton-editar")
             </div>
      </form>
      </div>
      </div>
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
           results: response
         };
       },
       cache: true
     }
   });
 });
 </script>
@endsection
