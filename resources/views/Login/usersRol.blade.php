@extends("theme/$theme/layout")
@section('Contenido')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">    
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
@include('Includes.mensaje-Error')
@include('Includes.mensaje-Succes')
<script>
  $(function () {
      $('#Rol_table').DataTable({
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
<div class="panel panel-danger">
  <div class="panel-heading">
    <h4 class="content-row-title">Roles
      <a href="{{route('crearRol')}}" class="btn btn-info pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
    </h4>
  </div>
  <div class="panel-body">
    <div class="content-row">
      <div class="table-responsive">
            <table id="Rol_table" class="table table-bordered" style="font-size:12px">
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
</div>
@endsection