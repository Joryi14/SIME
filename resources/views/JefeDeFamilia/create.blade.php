@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
  @include('Includes.Error-form')
  @include('Includes.mensaje-Error')
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h4 class="content-row-title">Crear jefe de familia
              <a href="{{route('inicio_jefe')}}" class="btn btn-info pull-right">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
            </h4>
      </div>
      <form class="form-horizontal" method="POST" action="/JefeDeFamilia/store">
          @csrf
        <div class="panel-body">
          {{-- <div class="form-group">
            <label for="TotalPersonas" class="col-sm-2 control-label">Total de personas: </label>
            <div class="col-sm-8">
            </div>
          </div> --}}
          <input type="hidden" name="TotalPersonas" class= "form-control" value="1" >
          <div class="form-group">
            <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>

            <div class="col-sm-8">
                <input type="text" name="Nombre" class= "form-control" value="{{old('Nombre', $data->Nombre ?? '')}}">
            </div>
          </div>
          <div class="form-group">
              <label for="Apellido1" class="col-sm-2 control-label">Primer apellido:  </label>

              <div class="col-sm-8">
                  <input type="text" name="Apellido1" class= "form-control" value="{{old('Apellido1', $data->Apellido1 ?? '')}}">
              </div>
            </div>
            <div class="form-group">
                <label for="Apellido2" class="col-sm-2 control-label">Segundo apellido: </label>

                <div class="col-sm-8">
                    <input type="text" name="Apellido2" class= "form-control" value="{{old('Apellido2', $data->Apellido2 ?? '')}}">
                </div>
              </div>
              <div class="form-group">
                  <label for="Cedula" class="col-sm-2 control-label">Cédula: </label>

                  <div class="col-sm-8">
                      <input type="text" name="Cedula" class= "form-control" value="{{old('Cedula', $data->Cedula ?? '')}}">
                  </div>
                </div>

                  <div class="form-group">
                      <label for="Edad" class="col-sm-2 control-label">Edad: </label>
                      <div class="col-sm-8">
                          <input type="number" min="0" max="200" name="Edad" class= "form-control" value="{{old('Edad', $data->Edad ?? '')}} ">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="sexo" class="col-sm-2 control-label">Sexo: </label>
                        <div class="col-sm-4">
                        <label>
                          <input type="radio" name="sexo" class="minimal-red" checked value="F"> Femenino
                        </label>
                        <label>
                          <input type="radio" name="sexo" class="minimal-red" checked value="M"> Masculino
                        </label>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="Telefono" class="col-sm-2 control-label">Teléfono: </label>
                          <div class="col-sm-8">
                              <input type="number" min="0" name="Telefono" class="form-control" value="{{old('Telefono', $data->Telefono ?? '')}}">
                          </div>
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
                                <label class="col-sm-2 control-label">Patologia</label>
                                <div class="col-sm-8">
                                <select id="PatologiasSelect" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 100%;">
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
        </div>
        <div class="panel-footer">
            @include("Includes.boton-form-create")
        </div>
          </div>
    </form>
  </div>
@section('Script')
<script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
<script>
$(document).ready(function() {
  $('#PatologiasSelect').select2();
});
</script>
@endsection
@endsection
