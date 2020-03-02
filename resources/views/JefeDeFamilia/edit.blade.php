@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="content-row-title">Editar jefe de familia
                  <a href="{{route('inicio_jefe')}}" class="btn btn-info pull-right">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
            </h3>
  </div>
          <form class="form-horizontal" method="POST" action="/JefeDeFamilia/{{$JefeF->IdJefe}}">
            @method('PUT')
            @csrf
            <div class="panel-body">
              <div class="form-group">
                <label for="TotalPersonas" class="col-sm-2 control-label">Total de personas: </label>
                <div class="col-sm-8">
                    <input type="text" name="TotalPersonas" class= "form-control" value="{{$JefeF->TotalPersonas}}">
                </div>
              </div>
              <div class="form-group">
                <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>
    
                <div class="col-sm-8">
                    <input type="text" name="Nombre" class= "form-control" value="{{$JefeF->Nombre}}" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido1" class="col-sm-2 control-label">Primer apellido:  </label>
      
                  <div class="col-sm-8">
                      <input type="text" name="Apellido1" class= "form-control" value="{{$JefeF->Apellido1}}" readonly="readonly"> 
                  </div>
                </div>
                <div class="form-group">
                    <label for="Apellido2" class="col-sm-2 control-label">Segundo apellido: </label>
        
                    <div class="col-sm-8">
                        <input type="text" name="Apellido2" class= "form-control" value= "{{$JefeF->Apellido2}}"  readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="Cedula" class="col-sm-2 control-label">Cédula: </label>
          
                      <div class="col-sm-8">
                          <input type="text" name="Cedula" class= "form-control" value="{{$JefeF->Cedula}}" >
                      </div>
                    </div>
                   
                      <div class="form-group">
                          <label for="Edad" class="col-sm-2 control-label">Edad: </label>
              
                          <div class="col-sm-8">
                              <input type="text" name="Edad" class= "form-control" value="{{$JefeF->Edad}}" >
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="sexo" class="col-sm-2 control-label">Sexo: </label>
                            <div class="col-sm-10">
                              <input type="text" name="sexo" class= "form-control" value= "{{$JefeF->sexo}}"  readonly="readonly">
                          </div>
                        </div>
                          <div class="form-group">
                              <label for="Telefono" class="col-sm-2 control-label">Teléfono: </label>
                  
                              <div class="col-sm-8">
                                  <input type="text" name="Telefono" class= "form-control" value="{{$JefeF->Telefono}}" > 
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
                                      <input type="checkbox" name="PcD" value="Si" @if($JefeF->PcD == 'Si') checked="CHECKED" @endif>   
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
                                        <input type="checkbox" name="MG" value="Si" @if($JefeF->MG == 'Si') checked="CHECKED" @endif> 
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
                                              <input type="checkbox" class="col-sm-6" name="PI" value="Si" @if($JefeF->PI == 'Si') checked="CHECKED" @endif>
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
                                            <input type="checkbox" name="PM" value="Si" @if($JefeF->PM == 'Si') checked="CHECKED" @endif> 
                                        </div>
                                  </div>
                              </div>
                              </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Patologia</label>
                                    <div class="col-sm-10">
                                        <select id="patJefe" class="form-control select2" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 50%;">
                                                <option selected>{{$JefeF->Patologia}}</option>
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
    $('#patJefe').select2();
  });
  </script>
  @endsection
@endsection