@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
      @include('includes.Error-form')
        <div class="box box-info">
          <div class="box-header with-border">
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_emergencia')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
            <h3 class="box-title">Crear Emergencia</h3>
          </div>
<form class= "form-horizontal" method="POST" action="/Emergencia/store">
  @csrf
  <div class="box-body">
      <div class="form-group">
        <label for="NombreEmergencias" class="col-sm-2 control-label">Nombre de la Emergencia: </label>
        <div class="col-sm-8">
            <input type="text" name="NombreEmergencias" class= "form-control" >
        </div>
      </div>

      <div class="form-group">
          <label for="Categoria" class="col-sm-2 control-label">Categoria: </label>

          <div class="col-sm-8">
              <input type="text" name="Categoria" class= "form-control" >
          </div>
        </div>


        <div class="form-group">
            <label for="TipoDeEmergencia" class="col-sm-2 control-label">Tipo De Emergencia: </label>
  
            <div class="col-sm-8">
                <input type="text" name="TipoDeEmergencia" class= "form-control" >
            </div>
          </div>


          <div class="form-group">
              <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>
    
              <div class="col-sm-8">
                  <input type="text" name="Descripcion" class= "form-control" >
              </div>
            </div>
  
            <div class="form-group">
                <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
      
                <div class="col-sm-8">
                    <input type="text" name="Longitud" class= "form-control" >
                </div>
              </div>

              <div class="form-group">
                  <label for="Latitudd" class="col-sm-2 control-label">Latitud: </label>
        
                  <div class="col-sm-8">
                      <input type="text" name="Latitud" class= "form-control" >
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
