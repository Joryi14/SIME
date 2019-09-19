@extends("theme/$theme/layout")
@section('Contenido')
   <div class="row">
      <div class="col-md-10">
      <div class="box box-success">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
                      <div class="col-sm-12">
                      <a href="{{route('inicio_EntregaDonacionesA')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
          </div>
      <h3 class="box-title">Editar Entrega</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonaciones/{{$entregadonacionesA->IdEntregaA}}">
        @method('PUT')
        @csrf
             <div class="box-body">
             <div class="form-group">
                    <label for="IdJefeFa" class="col-sm-2 control-label">Id del jefe de familia: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdJefeFa" value=" {{$entregadonacionesA->IdJefeFa}}" class= "form-control" >
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