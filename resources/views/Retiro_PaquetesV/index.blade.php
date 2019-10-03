@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
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
    <div class="col-xs-12">
      @include('Includes.mensaje-Succes')
      <div class="box-tools pull-rigth">
          <a href="{{route('Retiro_PaquetesV_reporte')}}" class="btn btn-block btn-primary btn-sm">
              <i class="fa fa-fw fa-plus-circle"></i> Crear Reporte de retiro de paquetes
          </a>
        </div>
      <div class="box box-primary">
        
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('Retiro_PaquetesV_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Retiro Paquetes
                </a>
            </div>
           
          <h3 class="box-title">Retiro de Paquetes </h3>
        </div>
        <div class="box-body table-responsive" >
          <table id="Retiro_PaquetesV_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id de RetiroPaquetes</th>
              <th>Id de AdministradorI</th>
              <th>Nombre del chofer</th>
              <th>Primer apellido del chofer</th>
              <th>Segundo apellido del chofer</th>
              <th>Id de Voluntario</th>
              <th>Placa de Vehiculo</th>
              <th>Direccion A Entregar</th>
              <th>Suministros Gobierno </th>
              <th>Suministros Comision</th>
              <th>Id de Inventario</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($retiroPV as $item)
              <tr>
              <td>{{$item->IdRetiroPaquetes}}</td>      
              <td>{{$item->IdAdministradorI}}</td>
              <td>{{$item->NombreChofer}}</td>  
              <td>{{$item->Apellido1C}}</td>  
              <td>{{$item->Apellido2C}}</td>  
              <td>{{$item->IdVoluntario}}</td>
              <td>{{$item->PlacaVehiculo}}</td>
              <td>{{$item->DireccionAEntregar}}</td>
              <td>{{$item->SuministrosGobierno}}</td>
              <td>{{$item->SuministrosComision}}</td>
              <td>{{$item->IdInventario}}</td>    
    
              <td><a href="/Retiro_PaquetesV/{{$item->IdRetiroPaquetes}}/edit" class="btn-accion-tabla tooltipsC" title="Editar Retiro_PaquetesV">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('Retiro_PaquetesV_delete', ['Retiro_PaquetesV' => $item->IdRetiroPaquetes])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Retiro_PaquetesV" onclick="confirmarEnvio()">
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