@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">
@endsection
@section('Script')
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script>
$(function () {
    $('#Emergencia_table').DataTable({
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="content-row-title">Lista de emergencias
      <a href="{{route('emergencia_create')}}" class="btn  btn-info pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
      </h4>
    </div>
          <div class="panel-body table-responsive" >
          <table id="Emergencia_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id de la emergencia</th>
              <th>Nombre de las emergencias</th>
              <th>Categoría</th>
              <th>Tipo de emergencia</th>
              <th>Descripción</th>
              <th>Longitud</th>
              <th>Latitud</th>
              <th>Estado</th>
              <th>Radio</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($emergencias as $item)
              <tr>
              <td>{{$item->idEmergencias}}</td>
              <td>{{$item->NombreEmergencias}}</td>
              <td>{{$item->Categoria}}</td>
              <td>{{$item->TipoDeEmergencia}}</td>
              <td>{{$item->Descripcion}}</td>
              <td>{{$item->Longitud}}</td>
              <td>{{$item->Latitud}}</td>
              <td>
                @if($item->Estado == 'Activa')
                <span class="badge badge-success">{{$item->Estado}}</span></a>
                @else
                <span class="badge badge-danger">{{$item->Estado}}</span></a>
                @endif</td>
                <td>{{$item->Radio}}</td>
              <td><a href="/Emergencia/{{$item->idEmergencias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar emergencia">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
              <form id="formE"  action="{{route('emergencia_delete', ['Emergencia' => $item->idEmergencias])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar emergencia" onclick="confirmarEnvio()">
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
