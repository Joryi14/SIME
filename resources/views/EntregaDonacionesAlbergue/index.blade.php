@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
<script type="text/javascript">
  document.querySelector('#formEA').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault(); // <--- prevent form from submitting
  swal({
      title: "Esta seguro de eliminar?",
      text: "Una vez eliminado no se puede recuperar!",
      icon: "warning",
      buttons: [
        'Cancelar!',
        'Aceptar!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Exito!',
          text: 'Se ha Eliminado el registro!',
          icon: 'success'
        }).then(function() {
          form.submit(); // <--- submit form programmatically
        });
      } else {
        swal("Cancelado","" ,"error");
      }
    })
});
</script>
<script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
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
<div class="row">
  <div class="col-xs-10" style="margin-left:8%">
  <div class="box collapsed-box">
  <div class="box-header" style="padding:2%">
      <div class="box-tools pull-right" >
          <button type="button" class="btn btn-box-tool"  data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
    <h3  class="box-title">Reporte por fechas</h3>
  </div>
  <div class="box-body">
  <form class= "form-horizontal" method="POST" action="EntregaDonacionesAlbergue/ReporteFecha" target="_blank">
        @csrf 
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
  <div class="box-footer">
      <button type="submit" class="btn btn-primary ">Enviar</button>
  </div>
  </form>
  </div>
  </div>
  </div>
  </div>
<div class="row">
  <div class="col-xs-12">
    <a href="{{route('EntregadonacionesA_reporte')}}" class="btn btn-block btn-primary btn-sm" target="_blank">
      <i class="fa fa-fw fa-plus-circle"></i> Crear reporte de entrega de donciones en albergue
  </a>
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header"  style="padding:2%">
            <div class="box-tools pull-right">
                <a href="{{route('EntregaDonacionesA_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear 
                </a>
            </div>
          <h3 class="box-title">Entrega de donaciones en albergue</h3>
        </div>
         <div class="box-body table-responsive" >
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
                    <i class="fa fa-fw fa-pencil"></i></a>
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
  </div>
</div>
@endsection