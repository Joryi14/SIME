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
            $('#fi').text($(this).data('fi'));
            $('#hi').text($(this).data('hi'));
            $('#fs').text($(this).data('fs'));
            $('#hs').text($(this).data('hs'));
         });
 </script>
<script>
$(function () {
    $('#PersonaAlbergue_table').DataTable({
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
                <h4 class="content-row-title">Personas en albergue
                  <a href="{{route('personasAlbergue_create')}}" class="btn pull-right btn-success btn-lg">
                      <i class="fa fa-fw fa-plus-circle"></i> Crear
                  </a>
                      </h4>
                      <br>
                    </div>
        <div class="panel-body table-responsive" >
          <table id="PersonaAlbergue_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del registro del albergue</th>
              <th>Id del albergue</th>
              <th>Id de la emergencia</th>
              <th>Cédula del jefe de familia</th>
              <th>Lugar de procedencia</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($persona as $item)
              <tr>
              <td>{{$item->idregistroA}}</td>
              <td>{{$item->idAlbergue}}</td>
              <td>{{$item->idEmergencias}}</td>
              <td>{{$item->jefeFamilia->Cedula}}</td>
              <td>{{$item->LugarDeProcedencia}}</td>
              <td><a href="/PersonasAlbergue/{{$item->idregistroA}}/edit" class="btn-accion-tabla tooltipsC" title="Editar personas en albergue">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
              <form id="form1" action="{{route('personasAlbergue_delete', ['PersonasAlbergue' => $item->idregistroA])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar personas en albergue" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar retiro de paquetes" data-toggle="modal" data-target="#Detalle"  data-fi="{{$item->FechaDeIngreso}}" data-hi="{{$item->HoraDeIngreso}}" data-fs="{{$item->FechaDeSalida}}" data-hs="{{$item->HoraDeSalida}}" ><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
        <h4 class="modal-title"><b>Información de retiro de paquetes</b></h4>
      </div>
      <div class="modal-body">
        <div class="row">
       <div class="form-group ">
        <label class="col-md-4"><b>Fecha de ingreso:</b></label>
        <div class="col-md-4">
            <span id="fi"></span>
        </div>
      </div></div><br>
      <div class="row">
     <div class="form-group">
      <label  class="col-md-4"><b>Hora de ingreso:</b></label>
      <div class="col-md-4">
          <span id="hi"></span>
      </div>
  </div></div><br>
  <div class="row">
   <div class="form-group">
    <label class="col-md-4"><b>Fecha de salida:</b></label>
    <div class="col-md-4">
        <span id="fs"></span>
    </div>
  </div>
      </div><br>
      <div class="row">
      <div class="form-group">
        <label class="col-md-4"><b>Hora de salida:</b></label>
        <div class="col-md-4">
            <span id="hs"></span>
        </div>
      </div></div>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<br>
    <div class="form-group">
        <a href="{{route('personaAlbergue_reporte')}}" class="btn btn-info" target="_blank">
              <i class="fa fa-fw fa-plus-circle"></i> Crear reporte de personas en albergue
        </a>
    </div>
    <div class="form-group">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ReporteF">  <i class="fa fa-fw fa-plus-circle"></i>Reporte de personas en albergue por fechas</button>
    </div>
    <div class="modal modal-default fade" id="ReporteF">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Reporte de personas en albergue por fechas</b></h4>
            </div>
              <form class= "form-horizontal" method="POST" action="/PersonasAlbergue/ReporteFecha" target="_blank">
                    @csrf
              <div class="modal-body">
               <div class="col-md-6">
              <div class="form-group">
                      <label for="Fecha" class="col-sm-4 control-label">Desde: </label>
                      <div class="col-sm-8">
                          <input required type="date" name="Fecha1" class= "form-control" >
                      </div>
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label for="Fecha" class="col-sm-4 control-label">Hasta: </label>
                  <div class="col-sm-8">
                      <input required type="date" name="Fecha2" class= "form-control" >
                  </div>
              </div>
              </div>
            </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary ">Enviar</button>
                  <button type="button" class="btn btn-outline btn-danger pull-left" data-dismiss="modal">Cerrar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <br>
    @endsection
