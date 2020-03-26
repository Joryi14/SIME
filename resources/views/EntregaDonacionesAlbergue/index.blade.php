@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">
@endsection
@section('Script')
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script>
$(function () {
    $('#EntregaDonacionesAlbergue_table').DataTable({
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
        "search": "Buscar:",
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
@endsection
@section('Contenido')
@include('Includes.mensaje-Error')
@include('Includes.mensaje-Succes')
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4 class="content-row-title">Entrega de donaciones en albergue
                  <a href="{{route('EntregaDonacionesA_create')}}" class="btn pull-right btn-info btn-sm">
                      <i class="fa fa-fw fa-plus-circle"></i> Crear
                  </a>
                      </h4>
                    </div>
         <div class="panel-body table-responsive" >
          <table id="EntregaDonacionesAlbergue_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id de la entrega</th>
              <th>Jefe de familia</th>
              <th>Albergue</th>
              <th>Emergencia</th>
              <th>Acciones</th>
            </tr>
          </thead>
                @foreach ($entregadonacionesAlbergue as $item)
                  <tr>
                  <td>{{$item->IdEntregaA}}</td>
                  <td>Cedula: {{$item->JefeFamilia->Cedula}} <br> Nombre: {{$item->JefeFamilia->Nombre}}  {{$item->JefeFamilia->Apellido1}}</td>
                  <td>{{$item->Albergue->Nombre}}</td>
                  <td>{{$item->idEmergencias}}     {{$item->Emergencia->NombreEmergencias}}</td>
                  <td><a href="/EntregaDonacionesAlbergue/{{$item->IdEntregaA}}/edit" class="btn-accion-tabla tooltipsC" title="Editar la entrega de donaciones en albergue">
                    <i class="fa fa-fw fa-pencil text-success"></i></a>
                  <form id="formEA" action="{{route('EntregadonacionesA_delete', ['EntregaDonacionesAlbergue' => $item->IdEntregaA])}}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar entrega de donaciones en albergue" onclick="confirmarEnvio()">
                        <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form>
                  </td>
                  </tr>
                @endforeach
          </table>
      </div>
    </div>
@endsection
