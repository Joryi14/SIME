@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
     @include('Includes.Error-form')
     @include('Includes.mensaje-Succes')
     <div class="box box-info">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_Retiro_PaquetesV')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
            <h3 class="box-title">Crear Retiro de Paquetes</h3>
        </div>
        <form class="form-horizontal" method="POST" action="/Retiro_PaquetesV/store">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="IdChofer" class="col-sm-2 control-label">Id de Chofer: </label>
              <div class="col-sm-10">
                  <input type="text" name="IdChofer" class= "form-control" >
              </div>
            </div>
            <div class="form-group">
              <label for="IdAdministradorI" class="col-sm-2 control-label">Id de AdministradorI: </label>
              <div class="col-sm-10">
                  <input type="text" name="IdAdministradorI" class= "form-control" > 
              </div>
            </div>
            <div class="form-group">
                <label for="IdVoluntario" class="col-sm-2 control-label">Id de Voluntario: </label>
                <div class="col-sm-10">
                    <input type="text" name="IdVoluntario" class= "form-control" > 
                </div>
              </div>
              <div class="form-group">
                  <label for="PlacaVehiculo" class="col-sm-2 control-label">Placa de Vehiculo: </label>
                  <div class="col-sm-10">
                      <input type="text" name="PlacaVehiculo" class= "form-control">
                  </div>
                </div>
                <div class="form-group">
                    <label for="DireccionAEntregar" class="col-sm-2 control-label">Direccion A Entregar: </label>
                    <div class="col-sm-10">
                        <input type="text" name="DireccionAEntregar" class= "form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="SuministrosGobierno" class="col-sm-2 control-label">Suministros Gobierno: </label>
                        <div class="col-sm-10">
                            <input type="text" name="SuministrosGobierno" class= "form-control" > 
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="SuministrosComision" class="col-sm-2 control-label">Suministros Comision: </label>
                          <div class="col-sm-10">
                              <input type="text" name="SuministrosComision" class= "form-control" >
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="IdInventario" class="col-sm-2 control-label">Id de Inventario: </label>
                            <div class="col-sm-10">
                                <input type="text" name="IdInventario" class= "form-control"  >
                            </div>
                          </div>
          </div>
          <div class="box-footer">
              @include("Includes.boton-editar")
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection