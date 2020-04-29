@extends("theme/$theme/layout")
@section('Contenido')

<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">    
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
@include('Includes.mensaje-Error')
@include('Includes.mensaje-Succes')
<script>
  $(function () {
      $('#UsersRol_table').DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar: ",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
          }
        },
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>


<div class="panel panel-warning">
    <div class="panel-heading">
      <h4 class="content-row-title">Usuarios y sus roles
        <a href="{{route('crear_UserRol')}}" class="btn btn-info btn-lg pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
        </a>
      </h4>
      <br>
    </div>
        <div class="panel-body">
           <div class="content-row">
            <div class="table-responsive">
                <table id="UsersRol_table"class="table table-bordered" style="font-size:12px">
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
                        <form  action="{{route('UserRol_delete', ['UserRol' => $UserRol->role_id])}}" method="POST">
                          @csrf @method('delete')
                          <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar permiso rol">
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