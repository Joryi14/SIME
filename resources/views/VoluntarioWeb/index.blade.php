@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">
@endsection
@section('Script')
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script>
$(function () {
    $('#VoluntariosWeb_table').DataTable({
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
<div class="panel panel-danger">
  <div class="panel-heading">
    <h4 class="content-row-title">Incripciones web de voluntarios
      </h4>
    </div>
        <div class="panel-body table-responsive">
            <table id="VoluntariosWeb_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Cédula</th>
              <th>Teléfono</th>
              <th>Nacionalidad</th>
              <th>Ocupación</th>
              <th>Patología</th>
              <th>Acciones</th>
            </tr>
              </thead>
            @foreach ($voluntariosWeb as $item)
              <tr>
              <td>{{$item->IdVoluntarioWeb}}</td>
              <td>{{$item->NombreVoluntarioWeb}}</td>
              <td>{{$item->ApellidoVoluntario1Web}}</td>
              <td>{{$item->ApellidoVoluntario2Web}}</td>
              <td>{{$item->CedulaVoluntarioWeb}}</td>
              <td>{{$item->TelefonoVoluntarioWeb}}</td>
              <td>{{$item->NacionalidadVoluntarioWeb}}</td>
              <td>{{$item->OcupacionWeb}}</td>
              <td>{{$item->PatologiaWeb}}</td>
             <td> {{-- <a href="/VoluntarioWeb/{{$item->IdVoluntarioWeb}}/edit" class="btn-accion-tabla tooltipsC" title="Editar VoluntarioWeb"> --}}
                {{-- <i class="fa fa-fw fa-pencil"></i></a> --}}
              <form id="form1" action="{{route('voluntarioweb_delete', ['VoluntarioWeb' => $item->IdVoluntarioWeb])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar voluntario web" onclick="confirmarEnvio()">
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
