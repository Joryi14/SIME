@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
      <h4 class="content-row-title">Crear rol
        <a href="{{route('inicio_Rol')}}" class="btn btn-success btn-md pull-right">
            <i class="fa fa-fw fa-reply-all"></i>Regresar
        </a></h4>    
        </div>
              <form class="form-horizontal" method="POST" action="/roles/store">
                @csrf
                <div class="panel-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class= "form-control" >
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                    @include("Includes.boton-form-create")
                </div>
              </form>
            </div>
        @endsection