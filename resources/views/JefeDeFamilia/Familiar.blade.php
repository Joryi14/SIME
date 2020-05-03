@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.mensaje-Error')
@include('Includes.Error-form')
<div class="panel panel-warning">
  <div class="panel-heading">
          <h3 class="box-title">Crear familiar
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_jefe')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
        </div>
        <form class="form-horizontal" method="POST" action="/Familiar/{{$JefeF->IdJefe}}">
          @method('PUT')
          @csrf
          <div class="panel-body">
            <div class="form-group">
              <label for="IdJefef" class="col-sm-2 control-label">Id del jefe de familia: </label>
              <div class="col-sm-10">
                  <input type="text" name="IdJefeF" class= "form-control" value="{{$JefeF->IdJefe}}" readonly="readonly" >
              </div>
            </div>
            <div class="form-group">
              <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>
              <div class="col-sm-10">
                  <input type="text" value="{{old('Nombre', $data->Nombre ?? '')}}"  name="Nombre" class= "form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="Apellido1" class="col-sm-2 control-label">Primer apellido: </label>
                <div class="col-sm-10">
                    <input type="text" name="Apellido1" value="{{old('Apellido1', $data->Apellido1 ?? '')}}" class= "form-control">
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido2" class="col-sm-2 control-label">Segundo apellido: </label>
                  <div class="col-sm-10">
                      <input type="text" name="Apellido2" value="{{old('Apellido2', $data->Apellido2 ?? '')}}" class= "form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="Cedula" class="col-sm-2 control-label">Cédula: </label>
                    <div class="col-sm-10">
                        <input type="text" name="Cedula" value="{{old('Cedula', $data->Cedula ?? '')}}" class= "form-control">
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
                        <div class="col-sm-10">
                            <input value="{{old('Edad', $data->Edad ?? '')}}" type="number" name="Edad" class= "form-control">
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
                              <div class="checkbox">
                                  <input type="hidden" name="PcD" value="No" />
                                  <input type="checkbox" name="PcD" value="Si">   
                                  </div>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">
                              Mujer Gestante:
                            </label>
                            <div class="col-sm-6">
                            <div class="checkbox">
                                    <input type="hidden" name="MG" value="No" />
                                    <input type="checkbox" name="MG" value="Si"> 
                                  </div>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">  
                                Persona Indigena:
                              </label>
                                <div class="col-sm-6">
                                  <div class="checkbox">
                                    <input type="hidden" name="PI" value="No" />
                                          <input type="checkbox" class="col-sm-6" name="PI" value="Si">
                                  </div>
                                    </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">
                                  Persona Migrante:
                                </label>
                              <div class="col-sm-6">
                                    <div class="checkbox">
                                        <input type="hidden" name="PM" value="No" />
                                        <input type="checkbox" name="PM" value="Si" > 
                                    </div>
                              </div>
                          </div>
                          </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Patologia: </label>
                      <div class="col-sm-10">
                      <select id="patJefe" class="form-control select2" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 70%;">
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
    $('#patJefe').select2();
  });
  </script>
@endsection
@endsection