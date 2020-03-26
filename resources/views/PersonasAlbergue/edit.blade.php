@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar personas en albergue
       <a href="{{route('inicio_personasAlbergue')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
        <form class="form-horizontal" method="POST" action="/PersonasAlbergue/{{$persona->idregistroA}}"readonly="readonly">
            @method('PUT')
            @csrf
            <div class="panel-body">
              <div class="form-group">
                <label for="idAlbergue" class="col-sm-2 control-label">Id del albergue: </label>
                <div class="col-sm-8">
                    <input type="text" name="idAlbergue" class= "form-control" value="{{$persona->idAlbergue}}"readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label for="idJefe" class="col-sm-2 control-label">Id del jefe de familia: </label>

                <div class="col-sm-8">
                    <input type="text" name="idJefe" class= "form-control" value="{{$persona->idJefe}}" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                  <label for="LugarDeProcedencia" class="col-sm-2 control-label">Lugar de procedencia:  </label>

                  <div class="col-sm-8">
                      <input type="text" name="LugarDeProcedencia" class= "form-control" value="{{$persona->LugarDeProcedencia}}" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                    <label for="FechaDeIngreso" class="col-sm-2 control-label">Fecha de ingreso: </label>

                    <div class="col-sm-8">
                        <input type="text" name="FechaDeIngreso" class= "form-control" value= "{{$persona->FechaDeIngreso}}"  readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="HoraDeIngreso" class="col-sm-2 control-label">Hora de ingreso: </label>

                      <div class="col-sm-8">
                          <input type="text" name="HoraDeIngreso" class= "form-control" value="{{$persona->HoraDeIngreso}}" readonly="readonly">
                      </div>
                    </div>

                      <div class="form-group">
                          <label for="FechaDeSalida" class="col-sm-2 control-label">Fecha de salida: </label>

                          <div class="col-sm-8">
                              <input type="text" name="FechaDeSalida" class= "form-control" value="{{$persona->FechaDeSalida}}" >
                          </div>
                        </div>

                          <div class="form-group">
                              <label for="HoraDeSalida" class="col-sm-2 control-label">Hora de salida: </label>

                              <div class="col-sm-8">
                                  <input type="text" name="HoraDeSalida" class= "form-control" value="{{$persona->HoraDeSalida}}" >
                              </div>
                            </div>
            </div>
            <div class="panel-footer">
                @include("Includes.boton-editar")
            </div>
        </form>
      </div>
    </div>
    </div>
@endsection
