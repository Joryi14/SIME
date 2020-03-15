@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar Retiro de Paquetes
       <a href="{{route('inicio_Retiro_PaquetesV')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
        <form class="form-horizontal" method="POST" action="/Retiro_PaquetesV/{{$retiroPV->IdRetiroPaquetes}}">
          @method('PUT')
          @csrf
          <div class="panel-body">
            <div class="form-group">
              <label for="IdAdministradorI" class="col-sm-2 control-label">IdAdministradorI: </label>
              <div class="col-sm-10">
                  <input type="text" name="IdAdministradorI" class= "form-control" value="{{$retiroPV->IdAdministradorI}}" readonly="readonly">
              </div>
            </div>
            <div class="form-group">
              <label for="NombreChofer" class="col-sm-2 control-label">Nombre del chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="NombreChofer" class= "form-control" value="{{$retiroPV->NombreChofer}}">
              </div>
            </div>
            <div class="form-group">
              <label for="Apellido1C" class="col-sm-2 control-label">Primer apellido del Chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="Apellido1C" class= "form-control" value="{{$retiroPV->Apellido1C}}">
              </div>
            </div>
            <div class="form-group">
              <label for="Apellido2C" class="col-sm-2 control-label">Segundo apellido del Chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="Apellido2C" class= "form-control" value="{{$retiroPV->Apellido2C}}">
              </div>
            </div>
            <div class="form-group">
                <label for="IdVoluntario" class="col-sm-2 control-label">Id del voluntario: </label>
                <div class="col-sm-10">
                    <input type="text" name="IdVoluntario" class= "form-control" value="{{$retiroPV->IdVoluntario}}" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                  <label for="PlacaVehiculo" class="col-sm-2 control-label">Placa del vehículo: </label>
                  <div class="col-sm-10">
                      <input type="text" name="PlacaVehiculo" class= "form-control" value= "{{$retiroPV->PlacaVehiculo}}"  readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                    <label for="DireccionAEntregar" class="col-sm-2 control-label">Dirección a entregar: </label>
                    <div class="col-sm-10">
                        <input type="text" name="DireccionAEntregar" class= "form-control" value="{{$retiroPV->DireccionAEntregar}}" >
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="SuministrosGobierno" class="col-sm-2 control-label">Suministros del gobierno: </label>
                        <div class="col-sm-10">
                            <input type="text" name="SuministrosGobierno" class= "form-control" value="{{$retiroPV->SuministrosGobierno}}" readonly="readonly">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="SuministrosComision" class="col-sm-2 control-label">Suministros de la comisión: </label>
                          <div class="col-sm-10">
                              <input type="text" name="SuministrosComision" class= "form-control" value= "{{$retiroPV->SuministrosComision}}"  readonly="readonly">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="IdInventario" class="col-sm-2 control-label">Id del inventario: </label>
                            <div class="col-sm-10">
                                <input type="text" name="IdInventario" class= "form-control" value="{{$retiroPV->IdInventario}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="idEmergencia" class="col-sm-2 control-label">Emergencia: </label>
                            <div class="col-sm-10">
                                <input type="text" name="idEmergencia" class= "form-control" value="{{$retiroPV->idEmergencia}}" readonly>
                            </div>
                          </div>

          </div>
          <div class="panel-footer">
              @include("Includes.boton-editar")
          </div>
        </form>
      </div>
  @endsection
