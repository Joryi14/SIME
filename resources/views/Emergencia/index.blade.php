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
            $('#desc').text($(this).data('desc'));
           $('#lt').text($(this).data('lt'));
           $('#lg').text($(this).data('lg'));
           $('#rad').text($(this).data('rad'));
         });
 </script>
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
              <th>Nombre de la emergencia</th>
              <th>Categoría</th>
              <th>Tipo de emergencia</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($emergencias as $item)
              <tr>
              <td>{{$item->idEmergencias}}</td>
              <td>{{$item->NombreEmergencias}}</td>
              <td>{{$item->Categoria}}</td>
              <td>{{$item->TipoDeEmergencia}}</td>
              <td>
                @if($item->Estado == 'Activa')
                <span class="badge badge-success">{{$item->Estado}}</span></a>
                @else
                <span class="badge badge-danger">{{$item->Estado}}</span></a>
                @endif</td>
              <td><a href="/Emergencia/{{$item->idEmergencias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar emergencia">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
              <form id="formE"  action="{{route('emergencia_delete', ['Emergencia' => $item->idEmergencias])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar emergencia" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar emergencia" data-toggle="modal" data-target="#Detalle"  data-lt="{{$item->Latitud}}" data-lg="{{$item->Longitud}}" data-rad="{{$item->Radio}}" data-desc="{{$item->Descripcion}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
              </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="modal modal-default fade" id="Detalle">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Información de jefe de familia</b></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                <div class="form-group">
                  <label class="col-md-6"><b>Descripción:</b></label>
                  <div class="col-md-6">
                      <span id="desc"></span>
                  </div>
                </div>
              </div><br>
              <div class="row">
               <div class="form-group">
                <label class="col-md-6"><b>Latitud:</b></label>
                <div class="col-md-6">
                    <span id="lt"></span>
                </div>
              </div>
            </div><br>
              <div class="row">
             <div class="form-group">
              <label  class="col-md-6"><b>Longitud:</b></label>
              <div class="col-md-6">
                  <span id="lg"></span>
              </div>
          </div>
        </div><br>
          <div class="row">
           <div class="form-group">
            <label class="col-md-6"><b>Radio:</b></label>
            <div class="col-md-6">
                <span id="rad"></span>
            </div>
          </div>
        </div>
                <br><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline btn-primary pull-left" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
