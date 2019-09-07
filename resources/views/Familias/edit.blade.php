@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Familia</h3>
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_familia')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
        </div>
        <form class="form-horizontal" method="POST" action="/Familias/{{$Familia->IdFamilia}}">
          @method('PUT')
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="IdJefef" class="col-sm-2 control-label">IdJefeF: </label>
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
                <label for="Apellido1" class="col-sm-2 control-label">Apellido1: </label>
                <div class="col-sm-10">
                    <input type="text" name="Apellido1" class= "form-control" value="{{$Familia->Apellido1}}" readonly="readonly"> 
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido2" class="col-sm-2 control-label">Apellido2: </label>
                  <div class="col-sm-10">
                      <input type="text" name="Apellido2" class= "form-control" value= "{{$Familia->Apellido2}}"  readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                    <label for="Cedula" class="col-sm-2 control-label">Cedula: </label>
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
                      <label>Patologia</label>
                      <select class="form-control select2" multiple="multiple" name="Patologia[]"  data-placeholder="Seleccion de Patologias" style="width: 100%;">
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
                      </select>
                      </div>
                                            
          </div>
          <div class="box-footer">
              @include("Includes.boton-editar")
          </div>
        </form>
      </div>
    </div>
  </div>
  @section('Script')
  <script>
        $(document).ready(function() { 
          $('.select2').select2({tags: true});
              }); </script>
          @endsection
@endsection