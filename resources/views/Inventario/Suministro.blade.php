@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="box-title">Agregar suministros
       <a href="{{route('inicio_inventario')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
<form class= "form-horizontal" method="POST" action="/Suministro/{{$inventario->idInventario}}">
 @method('PUT')
  @csrf
<div class= "panel-body">
    <div class="form-group">
        <label for="idEmergencias" class="col-sm-2 control-label">Id de las emergencias: </label>
        <div class="col-sm-9">
          <input type="text" name="idEmergencias" class= "form-control" value=" {{$inventario->idEmergencias}}"readonly="readonly">
        </div>
      </div>

     <div class="form-group">
          <label for="Suministros" class="col-sm-2 control-label">Suministros: </label>
          <div class="col-sm-9">
            <input type="text" name="Suministros" class= "form-control" value=" {{$inventario->Suministros}}"readonly="readonly" >
          </div>
        </div>
          <div class="form-group">
              <label for="Suministros" class="col-sm-2 control-label">Cantidad de suministros que desea agregar: </label>
              <div class="col-sm-9">
              <input type="number" min="0" name="suma" class= "form-control" value="{{$inventario->suma}}">
            </div>
          </div>
          <div class="panel-footer">
              @include("Includes.boton-editar")
           </div>
          </form>
             </div>
          </div>
@endsection
