@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar emergencia
       <a href="{{route('inicio_emergencia')}}" class="btn btn-info pull-right">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
<form class= "form-horizontal" method="POST" action="/Emergencia/{{$emergencia->idEmergencias}}">
 @method('PUT')
  @csrf
  <div class="panel-body">
      <div class="form-group">
        <label for="Nombre de la Emergencia" class="col-sm-2 control-label">Nombre de la emergencia: </label>
        <div class="col-sm-8">
            <input type="text" name="NombreEmergencias" class= "form-control" value="{{$emergencia->NombreEmergencias}}">
        </div>
      </div>

      <div class="form-group">
          <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>
          <div class="btn-group-horizontal" style="margin-top:2%">
            <input type="radio" name="Categoria" value="Grave"@if($emergencia->Categoria =="Grave") CHECKED @endif><span style="padding:1%; color:red">Grave</span>
            <input type="radio" name="Categoria" value="Moderada" @if($emergencia->Categoria =="Moderada") CHECKED @endif><span style="padding:1%; color:orange">Moderada </span>
            <input type="radio" name="Categoria" value="Leve" @if($emergencia->Categoria =="Leve") CHECKED @endif><span style="padding:1%; color:green">Leve </span>
          </div>
        </div>

        <div class="form-group">
            <label for="TipoDeEmergencia" class="col-sm-2 control-label">Tipo de emergencia: </label>

            <div class="col-sm-8">
                <input type="text" name="TipoDeEmergencia" class= "form-control" value="{{$emergencia->TipoDeEmergencia}}">
            </div>
          </div>


          <div class="form-group">
              <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>

              <div class="col-sm-8">
                  <input type="text" name="Descripcion" class= "form-control" value="{{$emergencia->Descripcion}}">
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
              <div class="form-group">
                <label class="col-sm-2 control-label" for="Estado">Estado</label>
                <div class="col-sm-8">
                  <input type="text" name="Estado" class= "form-control" value="{{$emergencia->Estado}}" readonly="readonly">
                </div>
              </div>
       <div class="panel-footer">
          @include("Includes.boton-editar")
        </div>
      </form>
    </div>
  </div>
   </div>
   @section('Script')
   <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
   <script>
         $(function() {
           $('.select2').select2();
           });
   </script>
           @endsection


@endsection
