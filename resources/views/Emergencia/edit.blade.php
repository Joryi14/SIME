@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        @include('Includes.Error-form')
        <div class="box box-success">
          <div class="box-header with-border"style="padding:2%">
          <h3 class="box-title">Editar Emergencia</h3>
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_emergencia')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
          </div>
<form class= "form-horizontal" method="POST" action="/Emergencia/{{$emergencia->idEmergencias}}">
 @method('PUT')
  @csrf
  <div class="box-body">
      <div class="form-group">
        <label for="Nombre de la Emergencia" class="col-sm-2 control-label">Nombre de la emergencia: </label>
        <div class="col-sm-8">
            <input type="text" name="NombreEmergencias" class= "form-control" value="{{$emergencia->NombreEmergencias}}">
        </div>
      </div>

      <div class="form-group">
          <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>

          <div class="col-sm-8">
              <input type="text" name="Categoria" class= "form-control" value="{{$emergencia->Categoria}}" readonly="readonly">
          </div>
        </div>

        <div class="form-group">
            <label for="TipoDeEmergencia" class="col-sm-2 control-label">Tipo de emergencia: </label>
  
            <div class="col-sm-8">
                <input type="text" name="TipoDeEmergencia" class= "form-control" value="{{$emergencia->TipoDeEmergencia}}" readonly="readonly">
            </div>
          </div>
    
          
          <div class="form-group">
              <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>
    
              <div class="col-sm-8">
                  <input type="text" name="Descripcion" class= "form-control" value="{{$emergencia->Descripcion}}" readonly="readonly">
              </div>
            </div>


            <div class="form-group">
                <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
      
                <div class="col-sm-8">
                    <input type="text" name="Longitud" class= "form-control" value="{{$emergencia->Longitud}}" readonly="readonly">
                </div>
              </div>

              <div class="form-group">
                  <label for="Latitud" class="col-sm-2 control-label">Latitud: </label>
        
                  <div class="col-sm-8">
                      <input type="text" name="Latitud" class= "form-control" value="{{$emergencia->Latitud}}" readonly="readonly">
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

