@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
          <h3 class="box-title">Usuarios</h3>
        </div>
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
            <tr>
              <th>ID Usuario</th>
              <th>email</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>patologia</th>
              <th>Nacionalidad</th>
              <th>Comunidad</th>
            </tr>
            @foreach ($users as $item)
              <tr>
              <td>{{$item->id}}</td>    
              <td>{{$item->email}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->Apellido1}}</td>
              <td>{{$item->Apellido2}}</td>
              <td>{{$item->Cedula}}</td>
              <td>{{$item->patologia}}</td>
              <td>{{$item->Nacionalidad}}</td>
              <td>{{$item->Comunidad}}</td>
              <td>
              <form action="{{route('user_delete', ['user' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                  @csrf @method('delete')
                  <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar usuario">
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
  <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Roles</h3>
            <div class="box-tools">
                <div class="row">
                <div class="col-sm-1">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              <div class="col-sm-9">
                <a href="{{route('crearRol')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo Rol
                  </a>
            </div>
                </div>
              </div>
          </div>
          <div class="box-body table-responsive no-padding"  id="tabla-data">
            <table class="table table-hover " >
              <tr>
                <th>ID Rol</th>
                <th>name</th>
                <th>Guard_Name</th>
              </tr>
              @foreach ($rols as $object)
                <tr>
                <td>{{$object->id}}</td>    
                <td>{{$object->name}}</td>
                <td>{{$object->guard_name}}</td>
                <td>
                <form action="{{route('rol_delete', ['roles' => $object->id])}}" class="d-inline form-eliminar" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar rol">
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
    <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Permisos</h3>
              <div class="box-tools">
                  <div class="row">
                  <div class="col-sm-1">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <div class="col-sm-9">
                  <a href="{{route('crear_permiso')}}" class="btn btn-block btn-primary btn-sm">
                      <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo Permiso
                    </a>
              </div>
                  </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding" id="tabla-data">
              <table class="table table-hover">
                <tr>
                  <th>ID Permiso</th>
                  <th>nombre</th>
                  <th>Guard_Name</th>
                </tr>
                @foreach ($permissions as $permiso)
                  <tr>
                  <td>{{$permiso->id}}</td>    
                  <td>{{$permiso->name}}</td>
                  <td>{{$permiso->guard_name}}</td>
                  <td>
                  <form action="{{route('permissions_delete', ['Permissions' => $permiso->id])}}" class="d-inline form-eliminar" method="POST">
                      @csrf @method('delete')
                      <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Permiso">
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