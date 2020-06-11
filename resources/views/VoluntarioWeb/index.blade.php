@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }
  .example-modal .modal {
    background: transparent !important;
  }
</style>
@endsection
@section('Script')
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script type="text/javascript">
  $(document).on('click', '.show-modal', function() {
            $('#na').text($(this).data('na'));
            $('#ocu').text($(this).data('ocu'));
            $('#pat').text($(this).data('pat'));
            $('#Fec').text($(this).data('fec'));
         });
 </script>
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
             <td> {{-- <a href="/VoluntarioWeb/{{$item->IdVoluntarioWeb}}/edit" class="btn-accion-tabla tooltipsC" title="Editar VoluntarioWeb"> --}}
                {{-- <i class="fa fa-fw fa-pencil"></i></a> --}}
              @role('Admin')
                <form id="form1" action="{{route('voluntarioweb_delete', ['VoluntarioWeb' => $item->IdVoluntarioWeb])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar voluntario web" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              @endrole
              <button class="show-modal btn-accion-tabla tooltipsC"title="Mostrar Voluntarios" data-toggle="modal" data-target="#Detalle"  data-na="{{$item->NacionalidadVoluntarioWeb}}" data-ocu="{{$item->OcupacionWeb}}" data-pat="{{$item->PatologiaWeb}}" data-fec="{{date('d-m-Y',strtotime($item->created_at))}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
                
              </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="modal modal-default fade" id="Detalle">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Información de voluntarios</b></h4>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="form-group">
                <label class="col-md-4 "><b>Nacionalidad:</b></label>
                <div class="col-md-4">
                    <span id="na"></span>
                </div>
              </div></div>
             <br>
             <div class="row">
             <div class="form-group ">
              <label class="col-md-4"><b>Ocupación:</b></label>
              <div class="col-md-4">
                  <span id="ocu"></span>
              </div>
            </div></div><br>
            <div class="row">
           <div class="form-group">
            <label  class="col-md-4"><b>Patología:</b></label>
            <div class="col-md-4">
                <span id="pat"></span>
            </div>
        </div>
        </div><br>
             <div class="row">
                  <div class="form-group">
                    <label class="col-md-4"><b>Fecha:</b></label>
                    <div class="col-md-4">
                        <span id="Fec"></span>
                    </div>
                  </div>
                      </div><br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
@endsection
