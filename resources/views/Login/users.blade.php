@extends("theme/$theme/layout")

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

@section('Contenido')
@include('Includes.mensaje-Error')
@include('Includes.mensaje-Succes')

<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="content-row-title">Usuarios</h4>
  </div>
<div class="panel-body">
  <div class="content-row">
    <div class="table-responsive" >
        <table class="table table-bordered" style="font-size:12px">
            <thead>
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
            </thead>
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
<div class="panel panel-danger">
  <div class="panel-heading">
    <h4 class="content-row-title">Roles
      <a href="{{route('crearRol')}}" class="btn btn-primary pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
    </h4>
  </div>
  <div class="panel-body">
    <div class="content-row">
            <table class="table table-bordered" style="font-size:12px">
              <thead>
              <tr>
                <th>Id rol</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
              </thead>
              
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
<div class="panel panel-warning">
  <div class="panel-heading">
    <h4 class="content-row-title">Usuario Rol
      <a href="{{route('crear_UserRol')}}" class="btn btn-primary pull-right">
        <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
    </h4>
  </div>
      <div class="panel-body">
         <div class="content-row">
              <table class="table table-bordered" style="font-size:12px">
                <thead>
                <tr>
                  <th>Id usuario</th>
                  <th>Nombre</th>
                  <th>Id rol</th>
                  <th>Rol</th>
                  <th>Acciones</th>
                </tr>
                </thead>
               
                @foreach ($UserRol as $UserRol)
                  <tr>
                  <td>{{$UserRol->model_id}}</td>
                  <td>{{$UserRol->model->name}} {{$UserRol->model->Apellido1}}</td>   
                  <td>{{$UserRol->role_id}}</td>
                  <td>{{$UserRol->roles->name}}</td>
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
@endsection