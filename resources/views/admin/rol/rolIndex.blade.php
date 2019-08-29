@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-8">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('rol_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Rol
                </a>
            </div>
            
          <h3 class="box-title">Roles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
            <tr>
              <th>ID Rol</th>
              <th>Nombre de Rol</th>
              <th></th>
            </tr>
            @foreach ($roles as $item)
                <tr>
                <td>{{$item->IdRol}}</td>    
                <td>{{$item->NombreRol}}</td>
                <td>
                    <a href="{{route('rol_edit', ['id' => $item->IdRol])}}" class="btn-accion-tabla tooltipsC" title="Editar Rol">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <form action="{{route('rol_delete', ['id' => $item->IdRol])}}" class="d-inline form-eliminar" method="POST">
                        @csrf @method('delete')
                        <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Rol">
                            <i class="fa fa-fw fa-trash text-danger"></i>
                        </button>
                    </form>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection