@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="content-row-title">Perfil
      <a href="{{route('home')}}" class="btn btn-info pull-right">
              <i class="fa fa-fw fa-reply-all"></i> Regresar
      </a>
          </h4>
    </div>
        <div class="panel-body">
                
        <form class="form" method="POST" action="{{route('user_edit', ['id' => Auth::user()->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="Email">Email:</label>
                        <input type="text" name="email" class= "form-control" value="{{Auth::user()->email}} " readonly="readonly">
                </div>
                <div class="form-group">
                        <label for="Nombre">Nombre</label>
                                <input type="text" name="name" class= "form-control" value="{{Auth::user()->name}} ">
                </div>
                <div class="form-group">
                                <label for="Cedula">Cedula</label>
                                <input type="text" name="Cedula" class= "form-control" value="{{Auth::user()->Cedula}}" readonly>

                </div>
                <div class="form-group">
                <label for="Nacionalidad">Nacionalidad</label>
                <select class="form-control select2" id="SelectN" name="Nacionalidad" value=""style="width: 100%;">
                        <option selected>{{Auth::user()->Nacionalidad}}</option>
                </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label>Patologia</label>
                <select id="pat" class="form-control select2" multiple="multiple" name="patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 100%;">
                        <option selected>{{Auth::user()->patologia}}</option>
                        <option>Alergias</option>
                        <option>Asma</option>
                        <option>CA</option>
                        <option value="Cardiopatia">Cardiopatía</option>
                        <option>Diabetes Mellitus</option>
                        <option>Digestivos</option>
                        <option>Epilepsia</option>
                        <option>EPOC</option>
                        <option>HTA</option>
                        <option value="Psiquiatricos">Psiquiátricos</option>
                        <option>Ninguna</option>
                </select>
                </div>
                <div class="form-group">
                        <label for="Apellido1">Primer Apellido</label>
                        <input type="text" name="Apellido1" class= "form-control" value="{{Auth::user()->Apellido1}}">
                </div>
                <div class="form-group">
                                <label for="Apellido2">Segundo Apellido</label>
                                        <input type="text" name="Apellido2" class= "form-control" value="{{Auth::user()->Apellido2}}">
                </div>
                <div class="form-group">
                                <label for="Comunidad">Comunidad a la que Pertenece </label>
                                        <input type="text" name="Comunidad" class= "form-control" value=" {{Auth::user()->Comunidad}}" required>
                </div>
                </div>

        
                </div>
        <div class="panel-footer">
          @include('Includes.boton-editar')
        </form>
        </div>
</div>
        </div>
        @section('Script')
<script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
<script>
$(document).ready(function() {
  $('#pat').select2();
});
</script>
<script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
          $("#SelectN").select2({
            ajax: {
              url: "{{route('Get_NA')}}",
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
@endsection
