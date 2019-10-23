@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
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
<script type="text/javascript">
 $(document).on('click', '.show-modal', function() {
           $('#nc').text($(this).data('nc'));
           $('#pac').text($(this).data('pac'));
           $('#sac').text($(this).data('sac'));
           $('#pv').text($(this).data('pv'));
           $('#de').text($(this).data('de'));
        });
</script>
<script type="text/javascript">
  document.querySelector('#form1').addEventListener('submit', function(e) {
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
    <form class= "form-horizontal" method="POST" action="/Retiro_PaquetesVController/ReporteFecha" target="_blank">
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
      @include('Includes.mensaje-Succes')
      <div class="box-tools pull-rigth">
          <a href="{{route('Retiro_PaquetesV_reporte')}}" class="btn btn-block btn-primary btn-sm" target="_blank">
              <i class="fa fa-fw fa-plus-circle"></i> Crear reporte de retiro de paquetes
          </a>
        </div>
      <div class="box box-primary">
        
        <div class="box-header" style="padding:2%">
            <div class="box-tools pull-right">
                <a href="{{route('Retiro_PaquetesV_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear 
                </a>
            </div>
           
          <h3 class="box-title">Retiro de paquetes </h3>
        </div>
        <div class="box-body table-responsive" >
          <table id="Retiro_PaquetesV_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del retiro paquetes</th>
              <th>Id del administradorI</th>
              <th>Id del voluntario</th>
              <th>Suministros del gobierno </th>
              <th>Suministros de la comisión</th>
              <th>Id del inventario</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($retiroPV as $item)
              <tr>
              <td>{{$item->IdRetiroPaquetes}}</td>      
              <td>{{$item->IdAdministradorI}}</td> 
              <td>{{$item->IdVoluntario}}</td>
              <td>{{$item->SuministrosGobierno}}</td>
              <td>{{$item->SuministrosComision}}</td>
              <td>{{$item->IdInventario}}</td>    
    
              <td><a href="/Retiro_PaquetesV/{{$item->IdRetiroPaquetes}}/edit" class="btn-accion-tabla tooltipsC" title="Editar retiro de paquetes">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('Retiro_PaquetesV_delete', ['Retiro_PaquetesV' => $item->IdRetiroPaquetes])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar retiro de raquetes" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                  </button>
                </form>
                <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar retiro de paquetes" data-toggle="modal" data-target="#Detalle"  data-nc="{{$item->NombreChofer}}" data-pac="{{$item->Apellido1C}}" data-sac="{{$item->Apellido2C}}" data-pv="{{$item->PlacaVehiculo}}"  data-de="{{$item->DireccionAEntregar}}" ><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
          <div class="form-group">
            <label class="col-md-4 "><b>Nombre del chofer:</b></label>
            <div class="col-md-4">
                <span id="nc"></span>
            </div>
          </div>
         <br>
         <div class="form-group ">
          <label class="col-md-4"><b>Primer apellido del chofer:</b></label>
          <div class="col-md-4">
              <span id="pac"></span>
          </div>
        </div><br>
       <div class="form-group">
        <label  class="col-md-4"><b>Segundo apellido del chofer:</b></label>
        <div class="col-md-4">
            <span id="sac"></span>
        </div>
    </div><br>
     <div class="form-group">
      <label class="col-md-4"><b>Placa de vehículo:</b></label>
      <div class="col-md-4">
          <span id="pv"></span>
      </div>
    </div>    
        <br><br>
        <div class="form-group">
          <label class="col-md-4"><b>Dirección a entregar:</b></label>
          <div class="col-md-4">
              <span id="de"></span>
          </div>
        </div>    
            <br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline bg-red pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection