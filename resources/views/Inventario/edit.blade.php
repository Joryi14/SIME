@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar inventario
       <a href="{{route('inicio_inventario')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
<form class= "form-horizontal" method="POST" action="/Inventario/{{$inventario->idInventario}}">
 @method('PUT')
  @csrf
<div class= "panel-body">
    <div class="form-group">
        <label for="idEmergencias" class="col-sm-2 control-label">Id de las emergencias: </label>
        <div class="col-sm-9">
          <input readonly type="text" name="idEmergencias" class= "form-control" value=" {{$inventario->idEmergencias}}" >
        </div>
      </div>

     <div class="form-group">
          <label for="Suministros" class="col-sm-2 control-label">Suministros: </label>
          <div class="col-sm-9">
            <input type="text" name="Suministros" readonly class= "form-control" value=" {{$inventario->Suministros}}" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">
              Colchonetas:</label>
              <div class="col-sm-4">
            <input type="number" min="0" class= "form-control"  name="Colchonetas">
              </div>
          </div>
  <div class="form-group">
        <label class="col-sm-2 control-label">
            Cobijas:</label>
            <div class="col-sm-4">
          <input type="number" min="0" class= "form-control"  name="Cobijas">
           </div>
    </div>
           <div class="form-group">
             <label class="col-sm-2 control-label">
                 Ropa</label>
              <div class="checkbox">
                 <input type="hidden" name="Ropa" value="0" />
                <input type="checkbox" class="col-sm-6" name="Ropa" value="1">
            </div>
           </div>
  </div>
  <div class="panel-footer">
      @include("Includes.boton-editar")
   </div>
  </form>
     </div>
@endsection
