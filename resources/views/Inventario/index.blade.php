@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">
@endsection
@section('Script')
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script type="text/javascript">
  $(document).on('click', '.show-modal', function() {
    $('#col').text($(this).data('col'));
    $('#cob').text($(this).data('cob'));
            if($(this).data('rop')== 1)
            $('#rop').text("Sí hay");
            else
            $('#rop').text("No hay");
         });
 </script>
<script>
$(function () {
    $('#Inventario_Table').DataTable({
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
          <h4 class="box-title">Inventario
            <a href="{{route('inventario_create')}}" class="btn btn-success btn-lg pull-right">
                <i class="fa fa-fw fa-plus-circle"></i> Crear
            </a>
                </h4>
                <br>
              </div>
        <div class="panel-body table-responsive" >
          <table id="Inventario_Table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del inventario</th>
              <th>Nombre de la emergencia</th>
              <th>Suministros</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($inventarios as $item)
              <tr>
              <td>{{$item->idInventario}}</td>
              <td>{{$item->idEmergencias}}  {{$item->Emergencia->NombreEmergencias}}</td>
              <td>{{$item->Suministros}}</td>
              <td><a href="/Inventario/{{$item->idInventario}}/edit" class="btn-accion-tabla tooltipsC" title="Editar Inventario">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
                <a href="/Inventario/{{$item->idInventario}}/editSuministro" class="btn-accion-tabla tooltipsC" title="Aumentar Suministros">
                  <i class="fa fa-fw fa-plus-circle text-success"></i></a>
              <form id="form1" action="{{route('inventario_delete', ['Inventario' => $item->idInventario])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Inventario" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              <button class="show-modal btn-accion-tabla tooltipsC"title="Mostrar Inventario" data-toggle="modal" data-target="#Detalle"  data-col="{{$item->Colchonetas}}" data-cob="{{$item->Cobijas}}" data-rop="{{$item->Ropa}}"><i class="fa fa-fw fa-file-text-o text-info"></i></button>
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
                <h4 class="modal-title"><b>Información de Inventario</b></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                <div class="form-group">
                  <label class="col-md-4 "><b>Colchonetas:</b></label>
                  <div class="col-md-4">
                      <span id="col"></span>
                  </div>
                </div></div>
               <br>
               <div class="row">
               <div class="form-group ">
                <label class="col-md-4"><b>Cobijas:</b></label>
                <div class="col-md-4">
                    <span id="cob"></span>
                </div>
              </div></div><br>
              <div class="row">
             <div class="form-group">
              <label  class="col-md-4"><b>Ropa:</b></label>
              <div class="col-md-4">
                  <span id="rop"></span>
              </div>
          </div><br>
        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline btn-info pull-left" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
<br>
<div class="form-group">
    <a href="{{route('inventario_reporte')}}" class="btn btn-info" target="_blank">
          <i class="fa fa-fw fa-plus-circle"></i> Crear reporte de inventario
    </a>
</div>
<div class="form-group">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ReporteF">  <i class="fa fa-fw fa-plus-circle"></i>Reporte inventario por fechas</button>
</div>
<div class="modal modal-default fade" id="ReporteF">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Reporte de inventario por fechas</b></h4>
        </div>
          <form class= "form-horizontal" method="POST" action="/Inventario/ReporteFecha" target="_blank">
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
