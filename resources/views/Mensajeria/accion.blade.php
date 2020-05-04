@extends("theme/$theme/layout") @section('Contenido')
@include('Includes.Error-form') @include('Includes.mensaje-Error')
<div class="panel panel-warning">
    <div class="panel-heading">
        <h4 class="content-row-title">Añadir acciones
            <a href="{{route('inicio_mensaje')}}" class="btn btn-info pull-right">
                <i class="fa fa-fw fa-reply-all"></i>
                Regresar
            </a>
        </h4>
    </div>
    <form class="form-horizontal" method="POST" action="/Mensajeria/storeA">
        @csrf
        <div class="panel-body">
            <div class="form-group">
                <label for="idMensajeria" class="col-sm-2 control-label">Mensajeria:</label>
                <div class="col-sm-9">
                    <input
                        type="text"
                        name="idMensajeria"
                        class="form-control"
                        value="{{$mensajeria->IdMensajeria}}"
                        readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label for="Titulo" class="col-sm-2 control-label">Título:
                </label>
                <div class="col-sm-2">
                    <input type="text" name="titulo" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="Descripción" class="col-sm-2 control-label">Descripción:
                </label>
                <div class="col-sm-9">
                    <input type="text" name="descripcion" class="form-control">
                </div>
            </div>
            <div class="panel-footer">
                @include("Includes.boton-form-create")
            </div>
        </form>
    </div>
</div>
@endsection