@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
      @include('includes.Error-form')
        <div class="box box-info">
          <div class="box-header with-border">
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_albergue')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
            <h3 class="box-title">Crear Albergue</h3>
          </div>
<form class= "form-horizontal" method="POST" action="/Albergue/store">
  @csrf
  <div class="box-body">
      <div class="form-group">
        <label for="Nombre" class="col-sm-2 control-label">Nombre del albergue: </label>
        <div class="col-sm-8">
            <input type="text" name="Nombre" class= "form-control" >
        </div>
      </div>

      <div class="form-group">
          <label for="Distrito" class="col-sm-2 control-label">Distrito: </label>

          <div class="col-sm-8">
              <input type="text" name="Distrito" class= "form-control" >
          </div>
        </div>


        <div class="form-group">
            <label for="Comunidad" class="col-sm-2 control-label">Comunidad: </label>
  
            <div class="col-sm-8">
                <input type="text" name="Comunidad" class= "form-control" >
            </div>
          </div>


          <div class="form-group">
              <label for="TipoDeInstalacion" class="col-sm-2 control-label">Tipo de instalacion: </label>
    
              <div class="col-sm-8">
                  <input type="text" name="TipoDeInstalacion" class= "form-control" >
              </div>
            </div>
  
            <div class="form-group">
                <label for="Capacidad" class="col-sm-2 control-label">Capacidad del lugar: </label>
      
                <div class="col-sm-8">
                    <input type="text" name="Capacidad" class= "form-control" >
                </div>
              </div>


            <div class="form-group">
                    <label for="IdResponsable" class="col-sm-2 control-label">Cedula del responsable: </label>
          
                    <div class="col-sm-8">
                        <input type="text" name="IdResponsable" class= "form-control" >
                    </div>
                 </div>

             <div class="form-group">
                     <label for="telefono" class="col-sm-2 control-label">Telefono: </label>
              
                    <div class="col-sm-8">
                     <input type="text" name="telefono" class= "form-control" >
                     </div>
                  </div>

                  <div class="form-group">
                        <div class="checkbox">
                               <label class="col-sm-2 control-label">
                               Duchas
                               <input type="hidden" name="Duchas" value="0" />
                               <input type="checkbox" class="col-sm-6" name="Duchas" value="1">  
                        </label>
                        </div>  
                    </div> 

                 <div class="form-group">
                       <div class="checkbox">
                               <label class="col-sm-2 control-label">
                                inodoros
                                <input type="hidden" name="inodoros" value="0" />
                                <input type="checkbox" class="col-sm-6" name="inodoros" value="1">  
                         </label>
                         </div>  
                        </div> 
        
         <div class="form-group">
                <div class="checkbox">
                   <label class="col-sm-2 control-label">
                    Espacios de cocina
                    <input type="hidden" name="EspacioDeCocina" value="0" />
                      <input type="checkbox" class="col-sm-6" name="EspacioDeCocina" value="1">  
                </label>
                </div>  
            </div> 

                <div class="form-group">
                        <div class="checkbox">
                           <label class="col-sm-2 control-label">
                                Bodega
                            <input type="hidden" name="Bodega" value="0" />
                              <input type="checkbox" class="col-sm-6" name="Bodega" value="1">  
                        </label>
                        </div>                          
                    </div> 
    
    <div class="form-group">
            <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
  
            <div class="col-sm-8">
                <input type="text" name="Longitud" class= "form-control" >
            </div>
          </div>


              <div class="form-group">
                  <label for="Latitud" class="col-sm-2 control-label">Latitud: </label>
        
                  <div class="col-sm-8">
                      <input type="text" name="Latitud" class= "form-control" >
                  </div>
                </div>
  


                <div class="form-group">
                        <label for="Nececidades" class="col-sm-2 control-label">Nececidades: </label>
                 
                       <div class="col-sm-8">
                        <input type="text" name="Nececidades" class= "form-control" >
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