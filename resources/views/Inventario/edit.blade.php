@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
  <div class="col-md-10">
      <div class="box box-success">
        <div class="box-header with-border" style="padding:2%">
            <div class="box-tools pull-right">
                <div class="col-sm-12">
                    <a href="{{route('inicio_inventario')}}" class="btn btn-block btn-info ">
                        <i class="fa fa-fw fa-reply-all"></i> Regresar
                    </a>
                    </div>
                
              </div>
          <h3 class="box-title">Editar inventario</h3>
        </div>
<form class= "form-horizontal" method="POST" action="/Inventario/{{$inventario->idInventario}}">
 @method('PUT')
  @csrf

<div class= "box-body">


    <div class="form-group">
        <label for="idEmergencias" class="col-sm-2 control-label">Id de las emergencias: </label>
        <div class="col-sm-9">
          <input type="text" name="idEmergencias" class= "form-control" value=" {{$inventario->idEmergencias}}" >
        </div>
      </div>
      
     <div class="form-group">
          <label for="Suministros" class="col-sm-2 control-label">Suministros: </label>
          <div class="col-sm-9">
            <input type="text" name="Suministros" readonly class= "form-control" value=" {{$inventario->Suministros}}" >
          </div>
        </div>

          <div class="form-group">
              <div class="checkbox">
                <label class="col-sm-2 control-label">
                 Colchonetas
                 <input type="hidden" name="Colchonetas" value="0" />
                <input type="checkbox" class="col-sm-6" name="Colchonetas" value="1">  
              </label>
            </div>
           </div>

           <div class="form-group">
              <div class="checkbox">
                <label class="col-sm-2 control-label">
                    Cobijas
                 <input type="hidden" name="Cobijas" value="0" />
                <input type="checkbox" class="col-sm-6" name="Cobijas" value="1">  
              </label>
            </div>
           </div>

           <div class="form-group">
              <div class="checkbox">
                <label class="col-sm-2 control-label">
                    Ropa
                 <input type="hidden" name="Ropa" value="0" />
                <input type="checkbox" class="col-sm-6" name="Ropa" value="1">  
              </label>
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