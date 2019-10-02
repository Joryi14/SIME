@extends("theme/$theme/layout")
@section('Contenido')
   <div class="row">
      <div class="col-md-10">
     @include('Includes.Error-form')
     @include('Includes.mensaje-Error')
    <div class="box box-info">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
                      <div class="col-sm-12">
                      <a href="{{route('inicio_EntregaDonaciones')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
          </div>
      <h3 class="box-title">Crear entrega de donaciones</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonaciones/store">
        @csrf
             <div class="box-body">
             <div class="form-group">
                    <label for="IdUsuarioRol" class="col-sm-2 control-label">Id del usuario: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdUsuarioRol"  class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                    <label for="IdJefe" class="col-sm-2 control-label">Id del jefe de familia: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdJefe" class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                    <label for="IdRetiroPaquetes" class="col-sm-2 control-label">Id del Retiro de Paquetes: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdRetiroPaquetes"  class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                <label for="Foto" class="col-sm-2 control-label">Foto: </label>
                <div class="col-sm-2">
                    <input type="file" name="Foto" accept="image/*"  >  
                </div>
              </div>

      </div>
       <!-- /.box-body -->
       <div class="box-footer">
            @include("Includes.boton-form-create")
            </div>
            <!-- /.box-footer -->
     </form>
     </div>
     </div>  
     </div>  
     @endsection