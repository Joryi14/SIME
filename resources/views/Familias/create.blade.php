@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
  <div class="panel panel-warning">
    <div class="panel-heading">
          <h4 class="box-title">Crear familiar
              <a href="{{route('inicio_familia')}}" class="btn  btn-info pull-right">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
            </h4>
    </div>
        <form class="form-horizontal" method="POST" action="/Familias/store">
          @csrf
          <div class="panel-body">
            <div class="form-group">
              <label for="IdJefef" class="col-sm-2 control-label">Id del jefe de familia: </label>
              <div class="col-sm-9">
                <select id='SelectJ' name="IdJefeF" style='width: 50%;' required>
                </select>
         </div>
            </div>
            <div class="form-group">
              <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>
              <div class="col-sm-10">
                  <input type="text" name="Nombre" class= "form-control" value="{{old('Nombre', $data->Nombre ?? '')}}">
              </div>
            </div>
            <div class="form-group">
                <label for="Apellido1" class="col-sm-2 control-label">Primer apellido: </label>
                <div class="col-sm-10">
                    <input type="text" name="Apellido1" class= "form-control" value="{{old('Apellido1', $data->Apellido1 ?? '')}}">
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido2" class="col-sm-2 control-label">Segundo apellido: </label>
                  <div class="col-sm-10">
                      <input type="text" name="Apellido2" class= "form-control" value="{{old('Apellido2', $data->Apellido2 ?? '')}}">
                  </div>
                </div>
                <div class="form-group">
                    <label for="Cedula" class="col-sm-2 control-label">Cédula: </label>
                    <div class="col-sm-10">
                        <input type="text" name="Cedula" class= "form-control" value="{{old('Cedula', $data->Cedula ?? '')}}">
                    </div>
                  </div>
              
                      <div class="form-group">
                        <label for="Parentesco" class="col-sm-2 control-label">Parentesco: </label>
                        <div class="col-sm-10">
                        <select class="form-control select2" id="paren" name="Parentesco" value=""style="width: 50%;">
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
                            <input type="number" min="0" name="Edad" class= "form-control" value="{{old('Edad', $data->Edad ?? '')}}">
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
                        <div class="row">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">
                              Persona Con Discapacidad:
                            </label>
                            <div class="col-sm-6">
                              <label class="containerC">
                                  <input type="hidden" name="PcD" value="No" />
                                  <input type="checkbox" name="PcD" value="Si">   
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">
                              Mujer Gestante:
                            </label>
                            <div class="col-sm-6">
                              <label class="containerC">
                                    <input type="hidden" name="MG" value="No" />
                                    <input type="checkbox" name="MG" value="Si"> 
                                    <span class="checkmark"></span>
                                  </label>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">  
                                Persona Indigena:
                              </label>
                              <div class="col-sm-6">
                                <label class="containerC">
                                    <input type="hidden" name="PI" value="No" />
                                          <input type="checkbox" class="col-sm-6" name="PI" value="Si">
                                          <span class="checkmark"></span>
                                        </label>
                                    </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">
                                  Persona Migrante:
                                </label>
                                <div class="col-sm-6">
                                  <label class="containerC">
                                        <input type="hidden" name="PM" value="No" />
                                        <input type="checkbox" name="PM" value="Si"> 
                                        <span class="checkmark"></span>
                                      </label>
                              </div>
                          </div>
                        </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Patología: </label>
                      <div class="col-sm-10">
                      <select id="PatoloFam" class="form-control select2" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de patologías" style="width: 70%;">
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
          <div class="panel-footer">
              @include("Includes.boton-form-create")
          </div>
        </form>
      </div>
  
  @section('Script')
  <script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
  <script>
    $(document).ready(function() {
      $('#PatoloFam').select2();
    });
    </script>
    <script>
      $("#paren").select2({
    tags: true
    });

    </script>
  <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
      $("#SelectJ").select2({
        placeholder:"Seleccione un jefe",
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
