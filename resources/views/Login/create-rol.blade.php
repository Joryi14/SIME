@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
        <div class="col-md-10">
            <div class="box box-info">
              <div class="box-header with-border">
                  <div class="box-tools pull-right">
                      <div class="col-sm-12">
                      <a href="{{route('inicio_usuario')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
                    </div>
                <h3 class="box-title">Crear Rol</h3>
              </div>
              <form class="form-horizontal" method="POST" action="/roles/store">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class= "form-control" >
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