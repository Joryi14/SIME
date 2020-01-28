@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2-bootstrap.css")}}">
@section('Contenido')
<div class="row">
    <div class="col-md-10">
      @include('Includes.Error-form')
      @include('Includes.mensaje-Succes')
      <div class="box box-info">
        <div class="box-header with-border"  style="padding:2%">
          <h3 class="box-title">Crear familiar</h3>
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_familia')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
        </div>
        <form class="form-horizontal" method="POST" action="/Familias/store">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="IdJefef" class="col-sm-2 control-label">Id del jefe de familia: </label>
              <div class="col-sm-9">
                <select id='SelectJ' name="IdJefeF" style='width: 50%;'>
                <option value='0'>Seleccionar un Jefe</option></select>
         </div>
            </div>
            <div class="form-group">
              <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>
              <div class="col-sm-10">
                  <input type="text" name="Nombre" class= "form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="Apellido1" class="col-sm-2 control-label">Primer apellido: </label>
                <div class="col-sm-10">
                    <input type="text" name="Apellido1" class= "form-control">
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido2" class="col-sm-2 control-label">Segundo apellido: </label>
                  <div class="col-sm-10">
                      <input type="text" name="Apellido2" class= "form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="Cedula" class="col-sm-2 control-label">Cédula: </label>
                    <div class="col-sm-10">
                        <input type="text" name="Cedula" class= "form-control">
                    </div>
                  </div>
              
                      <div class="form-group">
                        <label for="Parentesco" class="col-sm-2 control-label">Parentesco: </label>
                        <div class="col-sm-10">
                        <select class="form-control select2" name="Parentesco" value=""style="width: 50%;">
                          <option value="Hijo">Hijo</option>
                          <option value="Conyugue ">Conyugue</option>
                          <option value="Nieto">Nieto</option>
                          <option value="Primo">Primo</option>
                          <option value="Padre">Padre</option>
                          <option value="Madre">Madre</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="Edad" class="col-sm-2 control-label">Edad: </label>
                        <div class="col-sm-1">
                            <input type="number" name="Edad" class= "form-control">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="Sexo" class="col-sm-2 control-label">Sexo: </label>
                          <label>
                            <input type="radio" name="sexo" class="minimal-red" checked value="F"> Femenino
                          </label>
                          <label>
                            <input type="radio" name="sexo" class="minimal-red" checked value="M"> Masculino
                          </label>
                        </div>
            <div class="form-group">
                <div class="checkbox">
                  <label class="col-sm-2 control-label">
                    Persona Con Discapacidad:
                    <input type="hidden" name="PcD" value="No" />
                  <input type="checkbox" class="col-sm-6" name="PcD" value="Si">  
                </label>
              </div>
            </div>
            <div class="form-group">
                  <div class="checkbox">
                    <label class="col-sm-2 control-label">
                        Mujer Gestante:
                      <input type="hidden" name="MG" value="No" />
                      <input type="checkbox" class="col-sm-6" name="MG" value="Si"> 
                     
                    </label>
              </div>
            </div>
              <div class="form-group">
                    <div class="checkbox">
                        <label class="col-sm-2 control-label">  
                            Persona Indigena:
                            <input type="hidden" name="PI" value="No" />
                            <input type="checkbox" class="col-sm-6" name="PI" value="Si">
                          </label>
                      </div>
              </div>
                <div class="form-group">
                      <div class="checkbox">
                          <label class="col-sm-2 control-label">
                              Persona Migrante: 
                          <input type="hidden" name="PM" value="No" />
                          <input type="checkbox" class="col-sm-6" name="PM" value="Si"> 
                          
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Patologia: </label>
                      <div class="col-sm-10">
                      <select class="form-control select2" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 70%;">
                              <option>Ninguna</option>
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
                      
                      </select>
                      </div>
                </div>
          <div class="box-footer">
              @include("Includes.boton-form-create")
          </div>
        </form>
      </div>
    </div>
  </div>
  @section('Script')
  <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
  <script>
        $(function() { 
          $('.select2').select2({
                  theme: "bootstrap"
          });
          $.fn.select2.defaults.set( "theme", "bootstrap" );
          });  
  </script>
  <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      $("#SelectJ").select2({
        ajax: { 
          url: "{{route('Get_JefeF')}}",
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
          @endsection
@endsection
