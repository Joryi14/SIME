@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
        <div class="col-md-10">
            <div class="box box-info">
              <div class="box-header with-border">
                  <div class="box-tools pull-right">
                      <div class="col-sm-12">
                      <a href="{{route('inicio_usuario')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
                    </div>
                <h3 class="box-title">Crear usuario rol</h3>
              </div>
              <form class="form-horizontal" method="POST" action="/UserRol/store">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Usuario:</label>
                    <div class="col-sm-9">
                        <select id='SelectU' name="model_id" style='width: 25%;'>
                        <option value='0'>Seleccionar un usuario</option></select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="guard_name" class="col-sm-2 control-label">Id de rol: </label>
                    <div class="col-sm-9">
                        <select id='SelectR' name="role_id" style='width: 25%;'>
                        <option value='0'>Seleccionar un rol</option></select>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                    @include("Includes.boton-editar")
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection
@section('Script')
<!-- Script -->
<script type="text/javascript">
  // CSRF Token
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $( "#SelectU" ).select2({
      ajax: { 
        url: "{{route('Get_Users')}}",
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
      $( "#SelectR" ).select2({
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

