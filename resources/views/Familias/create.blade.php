@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        @include('Includes.mensaje-Succes')
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Familia</h3>
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
              <label for="IdJefef" class="col-sm-2 control-label">IdJefeF: </label>
              <div class="col-sm-10">
                  <input type="text" name="IdJefeF" class= "form-control" >
              </div>
            </div>
            <div class="form-group">
              <label for="Nombre" class="col-sm-2 control-label">Nombre: </label>
              <div class="col-sm-10">
                  <input type="text" name="Nombre" class= "form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="Apellido1" class="col-sm-2 control-label">Apellido1: </label>
                <div class="col-sm-10">
                    <input type="text" name="Apellido1" class= "form-control">
                </div>
              </div>
              <div class="form-group">
                  <label for="Apellido2" class="col-sm-2 control-label">Apellido2: </label>
                  <div class="col-sm-10">
                      <input type="text" name="Apellido2" class= "form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="Cedula" class="col-sm-2 control-label">Cedula: </label>
                    <div class="col-sm-10">
                        <input type="text" name="Cedula" class= "form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="Parentesco" class="col-sm-2 control-label">Parentesco: </label>
                      <div class="col-sm-10">
                          <input type="text" name="Parentesco" class= "form-control">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="Edad" class="col-sm-2 control-label">Edad: </label>
                        <div class="col-sm-10">
                            <input type="text" name="Edad" class= "form-control">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="Sexo" class="col-sm-2 control-label">Sexo: </label>
                          <div class="col-sm-10">
                              <input type="text" name="sexo" class= "form-control">
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
                      <label for="Patologia" class="col-sm-2 control-label">Patologia: </label>
                      <div class="col-sm-8">
                          <input type="text" name="Patologia" class= "form-control" >
                      </div>
                  </div>
          </div>
          <div class="box-footer">
              @include("Includes.boton-form-create")
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
