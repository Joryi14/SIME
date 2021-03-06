@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')

<div class="panel panel-success">
  <div class="panel-heading">
    <h4 class="content-row-title">Editar mensaje
      <a href="{{route('inicio_mensaje')}}" class="btn btn-info pull-right">
          <i class="fa fa-fw fa-reply-all"></i> Regresar
      </a>
    </h4>
    </div>
<form class= "form-horizontal" method="POST" action="/Mensajeria/{{$mensajeria->IdMensajeria}}">
 @method('PUT')
  @csrf
<div class= "panel-body">
      <div class="form-group">
            <label for="CodigoIncidente" class="col-sm-2 control-label">Código de incidente: </label>
            <div class="col-sm-9">
              <input type="text" name="CodigoIncidente" class= "form-control" value=" {{$mensajeria->CodigoIncidente}}" readonly>
            </div>
          </div>
          <div class="form-group">
               <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>
               <div class="col-sm-9">
                 <input type="text" name="Descripcion" class= "form-control" value=" {{$mensajeria->Descripcion}}" >
               </div>
             </div>

             <div class="form-group">
              <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
              <div class="col-sm-9">
              <input type="text" id="lg" value="{{$mensajeria->Longitud}}"   name="Longitud" class= "form-control" required readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="Latitud" class="col-sm-2 control-label">Latitud: </label>
              <div class="col-sm-9">
              <input type="text" id="lt" value="{{$mensajeria->Latitud}}"  name="Latitud" class= "form-control" required readonly>
              </div>
            </div>

                <div class="form-group">
                     <label for="Hora" class="col-sm-2 control-label">Hora: </label>
                     <div class="col-sm-9">
                       <input type="time" name="Hora" class= "form-control" value="{{$mensajeria->Hora}}" >
                     </div>
                   </div>


                   <div class="form-group">
                        <label for="Fecha" class="col-sm-2 control-label">Fecha: </label>
                        <div class="col-sm-9">
                          <input type="date" name="Fecha" class= "form-control" value="{{date('Y-m-d', strtotime($mensajeria['fecha']))}}" >
                        </div>
                      </div>

                   <div class="form-group">
                        <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>
                        <div class="btn-group-horizontal">

                            <div class="btn-group-horizontal" style="margin-top:2%">
                              <input type="radio" name="Categoria" value="Grave"  @if ($mensajeria->Categoria == 'Grave') checked="checked" @endif><span style="padding:1%; color:red">Grave</span>
                                          <input type="radio" name="Categoria" value="Moderada" @if ($mensajeria->Categoria == 'Moderada') checked="checked" @endif><span style="padding:1%; color:orange">Moderada </span>
                                          <input type="radio" name="Categoria" value="Leve"  @if ($mensajeria->Categoria == 'Leve') checked="checked" @endif><span style="padding:1%; color:green">Leve </span>
                                      </div>
                              </div>
                      </div>
                      <div class="form-group">
                           <label for="IdLiderComunal" class="col-sm-2 control-label">Id líder comunal: </label>
                           <div class="col-sm-9">
                             <input type="text" name="IdLiderComunal" class= "form-control" value=" {{$mensajeria->IdLiderComunal}}" readonly >
                           </div>
                         </div>
</div>
<div class="panel-footer">
      @include("Includes.boton-editar")
   </div>
  </form>
     </div>
@endsection
