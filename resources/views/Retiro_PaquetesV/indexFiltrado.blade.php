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
           $('#nc').text($(this).data('nc'));
           $('#pac').text($(this).data('pac'));
           $('#sac').text($(this).data('sac'));
           $('#pv').text($(this).data('pv'));
           $('#de').text($(this).data('de'));
           $('#Fec').text($(this).data('fec'));
        });
</script>
<script>
$(function () {
    $('#Retiro_PaquetesV_table').DataTable({
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
                <h4 class="content-row-title">Retiro de paquetes
                  <a href="{{route('Retiro_PaquetesV_create')}}" class="btn pull-right btn-success btn-lg">
                      <i class="fa fa-fw fa-plus-circle"></i> Crear
                  </a>
                      </h4>
                      <br>
                    </div>
        <div class="panel-body table-responsive" >
          <table id="Retiro_PaquetesV_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del retiro paquetes</th>
              <th>Id del administrador de inventario</th>
              <th>Id del voluntario</th>
              <th>Suministros del gobierno </th>
              <th>Suministros de la comisión</th>
              <th>Id del inventario</th>
              <th>Emergencia</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($retiro as $item)
              <tr>
              <td>{{$item->IdRetiroPaquetes}}</td>
              <td>{{$item->name}} {{$item->Apellido1}} {{$item->Cedula}}</td>
              <td>{{$item->vol}} {{$item->av}} {{$item->Ced}}</td>
              <td>{{$item->SuministrosGobierno}}</td>
              <td>{{$item->SuministrosComision}}</td>
              <td>{{$item->idInventario}}</td>
              <td>{{$item->idEmergencias}} {{$item->NombreEmergencias}}</td>
              <td><a href="/Retiro_PaquetesV/{{$item->IdRetiroPaquetes}}/edit" class="btn-accion-tabla tooltipsC" title="Editar retiro de paquetes">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
                @role('Admin|Director')
                <form id="form1" action="{{route('Retiro_PaquetesV_delete', ['Retiro_PaquetesV' => $item->IdRetiroPaquetes])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar retiro de raquetes" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                  </button>
                </form>
                @endrole
                <button class="show-modal btn-accion-tabla tooltipsC"title="Mostrar retiro de paquetes" data-toggle="modal" data-target="#Detalle"  data-nc="{{$item->NombreChofer}}" data-pac="{{$item->Apellido1C}}" data-sac="{{$item->Apellido2C}}" data-pv="{{$item->PlacaVehiculo}}"  data-de="{{$item->DireccionAEntregar}}" data-fec="{{date('d-m-Y',strtotime($item->created_at))}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
          <div class="form-group">
            <label class="col-md-4 "><b>Nombre del chofer:</b></label>
            <div class="col-md-4">
                <span id="nc"></span>
            </div>
          </div></div>
         <br>
         <div class="row">
         <div class="form-group ">
          <label class="col-md-4"><b>Primer apellido del chofer:</b></label>
          <div class="col-md-4">
              <span id="pac"></span>
          </div>
        </div></div><br>
        <div class="row">
       <div class="form-group">
        <label  class="col-md-4"><b>Segundo apellido del chofer:</b></label>
        <div class="col-md-4">
            <span id="sac"></span>
        </div>
    </div>
    </div><br>
    <div class="row">
     <div class="form-group">
      <label class="col-md-4"><b>Placa de vehículo:</b></label>
      <div class="col-md-4">
          <span id="pv"></span>
      </div>
    </div></div>
        <br>
        <div class="row">
        <div class="form-group">
          <label class="col-md-4"><b>Dirección a entregar:</b></label>
          <div class="col-md-4">
              <span id="de"></span>
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
  <div class="form-group">
    <a href="{{route('Retiro_PaquetesV_reporte')}}" class="btn btn-info" target="_blank">
        <i class="fa fa-fw fa-plus-circle"></i> Crear reporte de retiro de paquetes
    </a>
  </div>
  <div class="form-group">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ReporteF">  <i class="fa fa-fw fa-plus-circle"></i>Reporte de retiro de paquetes por fechas</button>
  </div>
  <div class="modal modal-default fade" id="ReporteF">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><b>Reporte de retiro de paquetes por fechas</b></h4>
          </div>
          <form class= "form-horizontal" method="POST" action="/Retiro_PaquetesVController/ReporteFecha" target="_blank">
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
