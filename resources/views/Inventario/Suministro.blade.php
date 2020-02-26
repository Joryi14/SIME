@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        <div class="box box-success">
          <div class="box-header with-border"  style="padding:2%">
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                      <a href="{{route('inicio_inventario')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
                  
                </div>
            <h3 class="box-title">Agregar suministros</h3>
          </div>

<form class= "form-horizontal" method="POST" action="/Suministro/{{$inventario->idInventario}}">
 @method('PUT')
  @csrf
<div class= "box-body">

    <div class="form-group">
        <label for="idEmergencias" class="col-sm-2 control-label">Nombre de las emergencias: </label>
        <div class="col-sm-9">
          <input type="text" name="idEmergencias" class= "form-control" value=" {{$inventario->Emergencia->NombreEmergencias}}"readonly="readonly">
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
              <input type="number" name="suma" class= "form-control" value="{{$inventario->suma}}">
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