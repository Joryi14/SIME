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
            $('#fi').val($(this).data('fi'));
            $('#hi').val($(this).data('hi'));
            $('#fs').val($(this).data('fs'));
            $('#hs').val($(this).data('hs'));
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
              <th>Albergue</th>
              <th>Emergencia</th>
              <th>Jefe de familia</th>
              <th>Lugar de procedencia</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($persona as $item)
              <tr>
              <td>{{$item->idregistroA}}</td>
              <td>Id:  {{$item->idAlbergue}}<br> Nombre {{$item->n}}</td>
              <td>Id: {{$item->idEmergencias}}<br> Nombre: {{$item->NombreEmergencias}}</td>
              <td>Cedula: {{$item->Cedula}}<br> Nombre: {{$item->Nombre}} {{$item->Apellido1}}</td>
              <td>{{$item->LugarDeProcedencia}}</td>
              <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
              <td><a href="/PersonasAlbergue/{{$item->idregistroA}}/edit" class="btn-accion-tabla tooltipsC" title="Editar personas en albergue">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
                @role('Admin')
                <form id="form1" action="{{route('personasAlbergue_delete', ['PersonasAlbergue' => $item->idregistroA])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar personas en albergue">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              @endrole
              <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostar personas en albergue" data-toggle="modal" data-target="#Detalle"  data-fi="{{date('d-m-Y',strtotime($item->FechaDeIngreso))}}" data-hi="{{$item->HoraDeIngreso}}" data-fs="{{date('d-m-Y',strtotime($item->FechaDeSalida))}}" data-hs="{{$item->HoraDeSalida}}" ><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
        <h4 class="modal-title"><b>Información de personas en albergue</b></h4>
      </div>
      <div class="modal-body">
        <div class="row">
       <div class="form-group ">
        <label class="col-md-4"><b>Fecha de ingreso:</b></label>
        <div class="col-md-4">
            <input type="text" id="fi" readonly>
        </div>
      </div></div><br>
      <div class="row">
     <div class="form-group">
      <label  class="col-md-4"><b>Hora de ingreso:</b></label>
      <div class="col-md-4">
          <input type="time" id="hi" readonly>
      </div>
  </div></div><br>
  <div class="row">
   <div class="form-group">
    <label class="col-md-4"><b>Fecha de salida:</b></label>
    <div class="col-md-4">
        <input type="text" id="fs" readonly>
    </div>
  </div>
      </div><br>
      <div class="row">
      <div class="form-group">
        <label class="col-md-4"><b>Hora de salida:</b></label>
        <div class="col-md-4">
            <input type="time" id="hs" readonly>
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
        <a href="{{route('personaAlbergue_reporteFi')}}" class="btn btn-info" target="_blank">
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
              <form class= "form-horizontal" method="POST" action="/PersonasAlbergue/ReporteFecha_Filtrado" target="_blank">
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
