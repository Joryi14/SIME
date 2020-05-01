@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">    
@endsection

@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="content-row-title">Crear usuario rol
          <a href="{{route('inicio_UR')}}" class="btn btn-success btn-md pull-right">
              <i class="fa fa-fw fa-reply-all"></i> Regresar
          </a>
        </h4>
          </div>
              <form class="form-horizontal" method="POST" action="/UserRol/store">
                @csrf
                <div class="panel-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Usuario:</label>
                    <div class="col-sm-9">
                        <select id='SelectU' name="model_id" style='width: 75%;'>
                       
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="guard_name" class="col-sm-2 control-label">Id de rol: </label>
                    <div class="col-sm-9">
                        <select id='SelectR' name="role_id" style='width: 50%;'>
                      
                        </select>
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                    @include("Includes.boton-editar")
                </div>
              </form>
</div>
@endsection
@section('Script')
<script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $("#SelectU").select2({
      placeholder: "Seleccionar usuario",
      ajax: { 
        url: "{{route('Get_Users')}}",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term
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
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      $("#SelectR").select2({
        placeholder: "Seleccionar rol",
        ajax: { 
          url: "{{route('Get_Roles')}}",
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

