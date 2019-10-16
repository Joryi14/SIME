@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script type="text/javascript">
  document.querySelector('#form2').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault(); // <--- prevent form from submitting
  swal({
      title: "Esta seguro de eliminar?",
      text: "Una vez eliminado no se puede recuperar!",
      icon: "warning",
      buttons: [
        'Cancelar!',
        'Aceptar!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Exito!',
          text: 'Se ha Eliminado el registro!',
          icon: 'success'
        }).then(function() {
          form.submit(); // <--- submit form programmatically
        });
      } else {
        swal("Cancelado","" ,"error");
      }
    })
});
</script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header" style="padding:2%">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          <h3 class="box-title">Usuarios</h3>
          </div>
        <div class="box-body table-responsive">
          <table class="table table-hover">
            <tr>
              <th>Id usuario</th>
              <th>Email</th>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Cédula</th>
              <th>Patologias</th>
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
              <form id="form1" action="{{route('user_delete', ['user' => $item->id])}}" method="POST">
                  @csrf @method('delete')
                  <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar usuario" onclick="confirmarEnvio()">
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
      <div class="col-xs-12">
        <div class="box box-primary box-solid">
          <div class="box-header" style="padding:2%">
            <h3 class="box-title">Roles</h3>
            <div class="box-tools pull left">
                <div class="row">
                <div class="col-sm-4 col-xs-4">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              <div class="col-sm-8 col-xs-8 ">
                <a href="{{route('crearRol')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear
                </a>
              </div>
                </div>
              </div>
          </div>
          <div class="box-body table-responsive" >
            <table class="table table-hover" >
              <tr>
                <th>Id rol</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
              @foreach ($rols as $object)
                <tr>
                <td>{{$object->id}}</td>    
                <td>{{$object->name}}</td>
                <td>
                <form id="form2" action="{{route('rol_delete', ['roles' => $object->id])}}" method="POST">
                    @csrf @method('delete')
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar rol">
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
    {{-- <div class="row">
        <div class="col-sm-12">
          <div class="box box-warning box-solid">
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
             <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID Permiso</th>
                  <th>Nombre</th>
                </tr>
                @foreach ($permissions as $permiso)
                  <tr>
                  <td>{{$permiso->id}}</td>    
                  <td>{{$permiso->name}}</td>
                  <td>{{$permiso->guard_name}}</td>
                  <td>
                  <form id="form3" action="{{route('permissions_delete', ['Permissions' => $permiso->id])}}" method="POST">
                      @csrf 
                      <input name="_method" type="hidden" value="DELETE">
                      <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Permiso" onclick="confirmarEnvio()">
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
      </div> --}}
      {{-- <div class="row">
        <div class="col-sm-12">
          <div class="box box-success box-solid">
            <div class="box-header with-borders">
              <h3 class="box-title">Permisos Rol</h3>
              <div class="box-tools">
                  <div class="row">
                  <div class="col-sm-1">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <div class="col-sm-9">
                  <a href="{{route('crear_permisoRol')}}" class="btn btn-block btn-primary btn-sm">
                      <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo PermisoRol
                    </a>
              </div>
                  </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID Permiso</th>
                  <th>ID Rol</th>
                </tr>
                @foreach ($permisoRol as $permisoRol)
                  <tr>
                  <td>{{$permisoRol->permission_id}}</td>    
                  <td>{{$permisoRol->role_id}}</td>
                  <td>
                  <form id="form4" action="{{route('permisoRol_delete', ['PermisoRol' => $permisoRol->permission_id])}}" method="POST">
                      @csrf 
                      <input name="_method" type="hidden" value="DELETE">
                      <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar PermisoRol" onclick="confirmarEnvio()">
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
      </div> --}}
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-danger box-solid">
            <div class="box-header" style="padding:2%">
              <h3 class="box-title">Usuario Rol</h3>
              <div class="box-tools">
                  <div class="row">
                  <div class="col-xs-4">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <div class="col-xs-8">
                  <a href="{{route('crear_UserRol')}}" class="btn btn-block btn-primary btn-sm">
                      <i class="fa fa-fw fa-plus-circle"></i> Crear
                    </a>
              </div>
                  </div>
                </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-hover">
                <tr>
                  <th>Id usuario</th>
                  <th>Id rol</th>
                  <th>Acciones</th>
                </tr>
                @foreach ($UserRol as $UserRol)
                  <tr>
                  <td>{{$UserRol->model_id}}</td>   
                  <td>{{$UserRol->role_id}}</td>
                  <td>
                  <form id="form5" action="{{route('UserRol_delete', ['UserRol' => $UserRol->role_id])}}" method="POST">
                      @csrf 
                      <input name="_method" type="hidden" value="DELETE">
                      <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar permiso rol" onclick="confirmarEnvio()">
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