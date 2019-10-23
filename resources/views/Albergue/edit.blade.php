@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        @include('Includes.Error-form')
        <div class="box box-success">
          <div class="box-header with-border"style="padding:2%">
              <h3 class="box-title">Editar albergue</h3>
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_albergue')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
          </div>
<form class= "form-horizontal" method="POST" action="/Albergue/{{$albergue->idAlbergue}}">
 @method('PUT')
  @csrf
  <div class="box-body">
      <div class="form-group">
        <label for="Nombre deL albergue" class="col-sm-2 control-label">Nombre del albergue: </label>
        <div class="col-sm-8">
            <input type="text" name="Nombre" class= "form-control" value="{{$albergue->Nombre}}">
        </div>
      </div>

      <div class="form-group">
          <label for="Distrito" class="col-sm-2 control-label">Distrito: </label>

          <div class="col-sm-8">
              <input type="text" name="Distrito" class= "form-control" value="{{$albergue->Distrito}}" readonly="readonly">
          </div>
        </div>

        <div class="form-group">
            <label for="Comunidad" class="col-sm-2 control-label">Comunidad: </label>
  
            <div class="col-sm-8">
                <input type="text" name="Comunidad" class= "form-control" value="{{$albergue->Comunidad}}" readonly="readonly">
            </div>
          </div>
    
          
          <div class="form-group">
              <label for="TipoDeInstalacion" class="col-sm-2 control-label">Tipo de instalación: </label>
    
              <div class="col-sm-8">
                  <input type="text" name="TipoDeInstalacion" class= "form-control" value="{{$albergue->TipoDeInstalacion}}" readonly="readonly">
              </div>
            </div>



            <div class="form-group">
                    <label for="Capacidad" class="col-sm-2 control-label">Capacidad: </label>
          
                    <div class="col-sm-8">
                        <input type="text" name="Capacidad" class= "form-control" value="{{$albergue->Capacidad}}" readonly="readonly">
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
                                <input type="text" name="telefono" class= "form-control" value="{{$albergue->telefono}}" readonly="readonly">
                            </div>
                          </div>


    
                          <div class="form-group">
                                <label for="Duchas" class="col-sm-2 control-label">Duchas: </label>
                      
                                <div class="col-sm-8">
                                    <input type="text" name="Duchas" class= "form-control" value="{{$albergue->Duchas}}" readonly="readonly">
                                </div>
                              </div>

                              <div class="form-group">
                                    <label for="inodoros" class="col-sm-2 control-label">Inodoros: </label>
                          
                                    <div class="col-sm-8">
                                        <input type="text" name="inodoros" class= "form-control" value="{{$albergue->inodoros}}" readonly="readonly">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                        <label for="EspaciosDeCocina" class="col-sm-2 control-label">Espacios de Cocina: </label>
                              
                                        <div class="col-sm-8">
                                            <input type="text" name="EspaciosDeCocina" class= "form-control" value="{{$albergue->EspaciosDeCocina}}" readonly="readonly">
                                        </div>
                                      </div>
    
                                      
                                      <div class="form-group">
                                            <label for="Bodega" class="col-sm-2 control-label">Bodega: </label>
                                  
                                            <div class="col-sm-8">
                                                <input type="text" name="Bodega" class= "form-control" value="{{$albergue->Bodega}}" readonly="readonly">
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
                        <label for="Nececidades" class="col-sm-2 control-label">Nececidades: </label>
              
                        <div class="col-sm-8">
                            <input type="text" name="Nececidades" class= "form-control" value="{{$albergue->Nececidades}}" readonly="readonly">
                        </div>
                      </div>
              </div>
       <div class="box-footer">   -    
          @include("Includes.boton-editar")
        </div>
      </form>
    </div>
  </div>
   </div>  
@endsection

