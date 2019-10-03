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
            $('#fi').text($(this).data('fi'));
            $('#hi').text($(this).data('hi'));
            $('#fs').text($(this).data('fs'));
            $('#hs').text($(this).data('hs'));
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
<div class="row">
    <div class="col-xs-12">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('personasAlbergue_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear PersonasAlbergue
                </a>
            </div>
            
          <h3 class="box-title">PersonasAlbergue</h3>
        </div>
        <div class="box-body table-responsive" >
          <table id="PersonaAlbergue_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del registroA</th>
              <th>Id del albergue</th>
              <th>Cédula del jefe de familia</th>
              <th>Lugar de procedencia</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($persona as $item)
              <tr>
               <td>{{$item->idregistroA}}</td> 
              <td>{{$item->idAlbergue}}</td>      
              <td>{{$item->idJefe->Cedula}}</td>  
              <td>{{$item->LugarDeProcedencia}}</td>
              <td><a href="/PersonasAlbergue/{{$item->idregistroA}}/edit" class="btn-accion-tabla tooltipsC" title="Editar PersonasAlbergue">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('personasAlbergue_delete', ['PersonasAlbergue' => $item->idregistroA])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar PersonasAlbergue" onclick="confirmarEnvio()">
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
       <div class="form-group ">
        <label class="col-md-4"><b>Fecha de ingreso:</b></label>
        <div class="col-md-4">
            <span id="fi"></span>
        </div>
      </div><br>
     <div class="form-group">
      <label  class="col-md-4"><b>Hora de ingreso:</b></label>
      <div class="col-md-4">
          <span id="hi"></span>
      </div>
  </div><br>
   <div class="form-group">
    <label class="col-md-4"><b>Fecha de salida:</b></label>
    <div class="col-md-4">
        <span id="fs"></span>
    </div>
  </div>    
      <br><br>
      <div class="form-group">
        <label class="col-md-4"><b>Hora de salida:</b></label>
        <div class="col-md-4">
            <span id="hs"></span>
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