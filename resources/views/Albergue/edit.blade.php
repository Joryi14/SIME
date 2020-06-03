@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar albergue
       <a href="{{route('inicio_albergue')}}" class="btn btn-info pull-right">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
<form class= "form-horizontal" method="POST" action="/Albergue/{{$albergue->idAlbergue}}">
 @method('PUT')
  @csrf
  <div class="panel-body">
      <div class="form-group">
        <label for="Nombre deL albergue" class="col-sm-2 control-label">Nombre del albergue: </label>
        <div class="col-sm-8">
            <input type="text" name="Nombre" class= "form-control" value="{{$albergue->Nombre}}">
        </div>
      </div>
      <input type="hidden" name="PersonasAlbergue" class= "form-control" value="{{$albergue->PersonasAlbergue}}" readonly="readonly">

      <div class="form-group">
          <label for="Distrito" class="col-sm-2 control-label">Distrito: </label>

          <div class="col-sm-8">
              <input type="text" name="Distrito" class= "form-control" value="{{$albergue->Distrito}}">
          </div>
        </div>

        <div class="form-group">
            <label for="Comunidad" class="col-sm-2 control-label">Comunidad: </label>

            <div class="col-sm-8">
                <input type="text" name="Comunidad" class= "form-control" value="{{$albergue->Comunidad}}">
            </div>
          </div>


          <div class="form-group">
              <label for="TipoDeInstalacion" class="col-sm-2 control-label">Tipo de instalación: </label>

              <div class="col-sm-8">
                  <input type="text" name="TipoDeInstalacion" class= "form-control" value="{{$albergue->TipoDeInstalacion}}">
              </div>
            </div>



            <div class="form-group">
                    <label for="Capacidad" class="col-sm-2 control-label">Capacidad: </label>

                    <div class="col-sm-8">
                        <input type="number" name="Capacidad" class= "form-control" value="{{$albergue->Capacidad}}">
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="IdResponsable" class="col-sm-2 control-label">Id del responsable: </label>
                        <div class="col-sm-8">
                            <input type="text" name="model_id" class= "form-control" value="{{$albergue->model_id}}" readonly="readonly">
                        </div>
                      </div>
                         <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Número de teléfono: </label>

                            <div class="col-sm-8">
                                <input type="text" name="telefono" class= "form-control" value="{{$albergue->telefono}}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                             Duchas: </label>
                                             <div class="checkbox">
                                             <input type="hidden" name="Duchas" value="0" />
                                            <input type="checkbox" class="col-sm-6" name="Duchas" value="1"@if($albergue->Duchas == 1) checked="CHECKED" @endif>
                                        </div>
                            </div>
                            </div>
                            <div class="row">
                              <div class="form-group">
                                              <label class="col-sm-3 control-label">
                                               Inodoros: </label>
                                               <div class="checkbox">
                                               <input type="hidden" name="inodoros" value="0" />
                                              <input type="checkbox" class="col-sm-6" name="inodoros" value="1"@if($albergue->inodoros == 1) checked="CHECKED" @endif>
                                          </div>
                              </div>
                              </div>
                              <div class="row">
                                <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                 Espacio de cocina: </label>
                                                 <div class="checkbox">
                                                 <input type="hidden" name="EspaciosDeCocina" value="0" />
                                                <input type="checkbox" class="col-sm-6" name="EspaciosDeCocina" value="1"@if($albergue->EspaciosDeCocina == 1) checked="CHECKED" @endif>
                                            </div>
                                </div>
                                </div>
                                <div class="row">
                                  <div class="form-group">
                                                  <label class="col-sm-3 control-label">
                                                   Bodega: </label>
                                                   <div class="checkbox">
                                                   <input type="hidden" name="Bodega" value="0" />
                                                  <input type="checkbox" class="col-sm-6" name="Bodega" value="1"@if($albergue->Bodega == 1) checked="CHECKED" @endif>
                                              </div>
                                  </div>
                                  </div>

            <div class="form-group">
                <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>

                <div class="col-sm-8">
                    <input type="text" name="Longitud" class= "form-control" value="{{$albergue->Longitud}}" readonly="readonly">
                </div>
              </div>

              <div class="form-group">
                  <label for="Latitud" class="col-sm-2 control-label">Latitud: </label>

                  <div class="col-sm-8">
                      <input type="text" name="Latitud" class= "form-control" value="{{$albergue->Latitud}}" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label for="IdEmergencia" class="col-sm-2 control-label"> Estado:</label>
                    <div class="col-sm-8">
                      <input type="text" name="Estado" class= "form-control" value="{{$albergue->Estado}}" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                        <label for="Nececidades" class="col-sm-2 control-label">Necesidades: </label>

                        <div class="col-sm-8">
                            <input type="text" name="Nececidades" class= "form-control" value="{{$albergue->Nececidades}}">
                        </div>
                      </div>
              </div>
       <div class="panel-footer">
          @include("Includes.boton-editar")
        </div>
      </form>
    </div>
@endsection
