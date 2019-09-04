@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
<div class="col-md-10">
    <div class="box box-info">
      <div class="box-header with-border">
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_mensaje')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
        <h3 class="box-title">Crear Reporte de incidente</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/Mensajeria/store">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="Codigo de Incidente" class="col-sm-2 control-label">CodigoIncidente:</label>
            <div class="col-sm-9">
                <input type="text" name="CodigoIncidente" class= "form-control" >
            </div>
          </div>
          <div class="form-group">
            <label for="Descripción" class="col-sm-2 control-label">Descripción: </label>
            <div class="col-sm-9">
              <input type="text" name="Descripcion" class= "form-control" >
            </div>
          </div>
          <div class="form-group">
              <label for="Ubicación" class="col-sm-2 control-label">Ubicación: </label>
              <div class="col-sm-9">
                  <input type="text" name="Ubicacion" class= "form-control" > 
              </div>
            </div>
            <div class="form-group">
                <label for="Hora" class="col-sm-2 control-label">Hora: </label>
                <div class="col-sm-2">
                    <input type="time" name="Hora" class= "form-control" >  
                </div>
              </div>
              <div class="form-group">
                  <label for="Fecha" class="col-sm-2 control-label">Fecha: </label>
                  <div class="col-sm-3">
                      <input type="date" name="Fecha" class= "form-control" > 
                  </div>
                </div>
                <div class="form-group">
                    <label for="Categoria" class="col-sm-2 control-label">Categoria: </label>
                    <div class="col-sm-9">
                        <input type="text" name="Categoria" class= "form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="IddeLiderComunal" class="col-sm-2 control-label">Id de Lider Comunal: </label>
                      <div class="col-sm-9">
                          <input type="text" name="IdLiderComunal" class= "form-control" >
                      </div>
                    </div>
        </div>
        <div class="box-footer">
            @include("Includes.boton-form-create")
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
