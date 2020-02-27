@extends("theme/$theme/layout")
@section('Contenido')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">    
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
@include('Includes.mensaje-Error')
@include('Includes.mensaje-Succes')
<script>
  $(function () {
      $('#users_table').DataTable({
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
<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="content-row-title">Usuarios</h4>
  </div>
  <div class="panel-body">
  <div class="content-row">
    <div class="table-responsive">
        <table id="users_table"class="table table-bordered" style="font-size:12px">
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
              <th>Acciones</th>
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
@endsection