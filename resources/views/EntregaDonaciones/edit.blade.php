@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-primary">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar entrega de donaciones
       <a href="{{route('inicio_EntregaDonaciones2')}}" class="btn pull-right btn-info ">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
  </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonaciones/{{$entregadonaciones->IdEntrega}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
             <div class="panel-body">
             <div class="form-group">
                    <label for="IdUsuarioRol" class="col-sm-2 control-label"> Usuario: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdUsuarioRol"  readonly value=" {{$entregadonaciones->IdVoluntario}}" class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                    <label for="IdJefe" class="col-sm-2 control-label">Id del jefe de familia: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdJefe" readonly value=" {{$entregadonaciones->IdJefe}}" class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                    <label for="IdRetiroPaquetes" class="col-sm-2 control-label">Id del retiro de paquetes: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdRetiroPaquetes" readonly value=" {{$entregadonaciones->IdRetiroPaquetes}}" class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                <label for="idEmergencia" class="col-sm-2 control-label">Emergencia: </label>
                <div class="col-sm-10">
                    <input type="text" name="idEmergencia" readonly value=" {{$entregadonaciones->idEmergencia}}" class= "form-control" >
                </div>
         </div>
             <div class="form-group">
                    <label for="Foto" class="col-sm-2 control-label">Foto: </label>
                    <div class="col-sm-10">
                         <input type="file" name="Foto" accept="image/*"  >
                    </div>
                        </div>
      </div>
             <div class="panel-footer">
                @include("Includes.boton-editar")
             </div>
      </form>
      </div>
@endsection
