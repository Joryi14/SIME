@extends("theme/$theme/layout")
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-warning">
  <div class="panel-heading">
          <h4 class="content-row-title">Editar Familia
              <a href="{{route('inicio_familia')}}" class="btn  btn-info pull-right">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
            </h4>
  </div>
        <form class="form-horizontal" method="POST" action="/Familias/{{$Familia->IdFamilia}}">
          @method('PUT')
          @csrf
          <div class="panel-body">
            <div class="form-group">
              <label for="IdJefef" class="col-sm-2 control-label">Id del jefe de familia: </label>
              <div class="col-sm-10">
                  <input type="text" name="IdJefeF" class= "form-control" value="{{$Familia->IdJefeF}}">
              </div>
            </div>
            <div class="form-group">
              <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>
              <div class="col-sm-10">
                  <input type="text" name="Nombre" class= "form-control" value="{{$Familia->Nombre}}" readonly="readonly"> 
              </div>
            </div>
            <div class="form-group">
                <label for="Apellido1" class="col-sm-2 control-label">Primer apellido: </label>
                <div class="col-sm-10">
                    <input type="text" name="Apellido1" class= "form-control" value="{{$Familia->Apellido1}}" readonly="readonly"> 
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido2" class="col-sm-2 control-label">Segundo apellido: </label>
                  <div class="col-sm-10">
                      <input type="text" name="Apellido2" class= "form-control" value= "{{$Familia->Apellido2}}"  readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                    <label for="Cedula" class="col-sm-2 control-label">Cédula: </label>
                    <div class="col-sm-10">
                        <input type="text" name="Cedula" class= "form-control" value="{{$Familia->Cedula}}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Parentesco" class="col-sm-2 control-label">Parentesco: </label>
                    <div class="col-sm-10">
                    <select class="form-control select2" name="Parentesco" value=""style="width: 50%;">
                      <option selected>{{$Familia->Parentesco}}</option>
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
                            <input type="text" name="Edad" class= "form-control" value="{{$Familia->Edad}}">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="Sexo" class="col-sm-2 control-label">Sexo: </label>
                          <div class="col-sm-10">
                            <input type="text" name="sexo" class= "form-control" value= "{{$Familia->sexo}}"  readonly="readonly">
                        </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">
                              Persona Con Discapacidad:
                            </label>
                            <div class="col-sm-6">
                              <div class="checkbox">
                                  <input type="hidden" name="PcD" value="No" />
                                  <input type="checkbox" name="PcD" value="Si" @if($Familia->PcD == 'Si') checked="CHECKED" @endif>   
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
                                    <input type="checkbox" name="MG" value="Si" @if($Familia->MG == 'Si') checked="CHECKED" @endif> 
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
                                          <input type="checkbox" class="col-sm-6" name="PI" value="Si" @if($Familia->PI == 'Si') checked="CHECKED" @endif>
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
                                        <input type="checkbox" name="PM" value="Si" @if($Familia->PM == 'Si') checked="CHECKED" @endif> 
                                    </div>
                              </div>
                          </div>
                          </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Patologia</label>
                      <div class="col-sm-10">
                      <select class="form-control select2" id="PatFa" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 100%;">
                              <option selected>{{$Familia->Patologia}}</option>
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
                                            
          </div>
          <div class="panel-footer">
              @include("Includes.boton-editar")
          </div>
        </form>
      </div>
  @section('Script')
  <script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>
  <script>
    $(document).ready(function() {
      $('#PatFa').select2();
    });
    </script>
          @endsection
@endsection