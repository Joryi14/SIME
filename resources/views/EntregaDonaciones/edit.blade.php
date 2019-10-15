@extends("theme/$theme/layout")
@section('Contenido')
   <div class="row">
      <div class="col-md-10">
      <div class="box box-success">
      <div class="box-header with-border" style="padding:2%">
    <h3 class="box-title">Editar Entrega</h3>
        <div class="box-tools pull-right">
                      <div class="col-sm-12" style="padding:2%">
                      <a href="{{route('inicio_EntregaDonaciones')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
          </div>
      </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonaciones/{{$entregadonaciones->IdEntrega}}">
        @method('PUT')
        @csrf
             <div class="box-body">
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
                    <label for="IdRetiroPaquetes" class="col-sm-2 control-label">Id del Retiro de Paquetes: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdRetiroPaquetes" readonly value=" {{$entregadonaciones->IdRetiroPaquetes}}" class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                    <label for="Foto" class="col-sm-2 control-label">Foto: </label>
                    <div class="col-sm-10">
                        <button type="button" class="btn fa fa-plus bg-yellow">
                         <input type="file" name="Foto" accept="image/*"  >  
                        </button>
                        <img style='display:block; width:100px; height:100px;' src='data:image/jpeg;base64,{{$entregadonaciones->Foto}}' alt="base64 test">
                    </div>
                        </div>
      </div>
             <!-- /.box-body -->
             <div class="box-footer">
                @include("Includes.boton-editar")
             </div>
             <!-- /.box-footer -->
      </form>
      </div>
      </div>  
      </div>  
@endsection
