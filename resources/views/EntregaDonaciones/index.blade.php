@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">
@endsection
@section('Script')
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script>
$(function () {
    $('#Entregadonaciones_table').DataTable({
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
    <h4 class="content-row-title">Entrega de donaciones
      </h4>
    </div>
         <div class="panel-body table-responsive" >
          <table id="Entregadonaciones_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id de la entrega</th>
              <th>Voluntario cédula</th>
              <th>Jefe de familia</th>
              <th>Id retiro de paquetes</th>
              <th>Foto</th>
              <th>Emergencia</th>
              <th>Cantidad</th>
              <th>Fecha</th>
              {{-- <th>Acciones</th> --}}
            </tr>
          </thead>
                @foreach ($entregadonaciones as $item)
                  <tr>
                  <td>{{$item->IdEntrega}}</td>
                  <td>{{$item->User->Cedula}}</td>
                  <td>Cedula:{{$item->jefeFamilia->Cedula}} <br> Nombre: {{$item->jefeFamilia->Nombre}} {{$item->jefeFamilia->Apellido1}}</td>
                  <td>{{$item->IdRetiroPaquetes}}</td>
                  <td>
                    <img style='display:block; width:100px; height:100px;' src='Foto/{{$item->Foto}}' alt="base64 test">
                  </td>
                  <td>Id: {{$item->Emergencia->idEmergencias}}<br> Nombre: {{$item->Emergencia->NombreEmergencias}}</td>
                  <td>{{$item->Cantidad}}</td>
                  <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                  {{-- <td><a href="/EntregaDonaciones/{{$item->IdEntrega}}/edit" class="btn-accion-tabla tooltipsC" title="Editar entrega donaciones">
                    <i class="fa fa-fw fa-pencil text-success"></i></a>
                  <form id="form1" action="{{route('entregadonaciones_delete', ['EntregaDonaciones' => $item->IdEntrega])}}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar entrega de donaciones" onclick="confirmarEnvio()">
                        <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form>
                  </td> --}}
                  </tr>
                @endforeach
          </table>
      </div>
    </div>
        
    <br>
    <div class="form-group">
        <a href="{{route('Entregadonaciones_reporte')}}" class="btn btn-info" target="_blank">
              <i class="fa fa-fw fa-plus-circle"></i> Crear reporte de entrega de donaciones
        </a>
    </div>
    <div class="form-group">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ReporteF">  <i class="fa fa-fw fa-plus-circle"></i>Reporte de entrega de donaciones por fechas</button>
    </div>
    <div class="modal modal-default fade" id="ReporteF">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Reporte de entrega de donaciones por fechas</b></h4>
            </div>
              <form class= "form-horizontal" method="POST" action="/EntregaDonaciones/ReporteFecha" target="_blank">
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
