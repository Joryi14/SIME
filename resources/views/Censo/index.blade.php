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
           if($(this).data('ref')== 1)
           $('#refr').text("Sí tiene");
           else
           $('#refr').text("No tiene");
           if($(this).data('coc')== 1)
           $('#coc').text("Sí tiene");
           else
           $('#coc').text("No tiene");
           if($(this).data('col')== 1)
           $('#col').text("Sí tiene");
           else
           $('#col').text("No tiene");
           if($(this).data('cam')== 1)
           $('#cam').text("Sí tiene");
           else
           $('#cam').text("No tiene");
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
    $('#Censo_table').DataTable({
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
                <a href="{{route('censo_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Censo
                </a>
            </div>
          <h3 class="box-title">Censos</h3>
        </div>
         <div class="box-body table-responsive" >
          <table id="Censo_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID Censo</th>
              <th>Cedula del Jefe de familia</th>
              <th>Acciones</th>
            </tr>
          </thead>
                @foreach ($censos as $item)
                  <tr>
                  <td>{{$item->IdCenso}}</td>    
                  <td>{{$item->jefeFamilia->Cedula}}</td>
                  <td><a href="/Censo/{{$item->IdCenso}}/edit" class="btn-accion-tabla tooltipsC" title="Editar censo">
                    <i class="fa fa-fw fa-pencil text-success"></i></a>
                  <form id="form1" action="{{route('censo_delete', ['Censo' => $item->IdCenso])}}" method="POST">
                    @csrf 
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Censo" onclick="confirmarEnvio()">
                        <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form>
                  <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar Censo" data-toggle="modal" data-target="#Detalle"  data-ref="{{$item->Refrigerador}}" data-coc="{{$item->Cocina}}" data-col="{{$item->Colchon}}" data-cam="{{$item->Cama}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
            <h4 class="modal-title"><b>Información de censo</b></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-md-4 "><b>Refrigerador:</b></label>
              <div class="col-md-4">
                  <span id="refr"></span>
              </div>
            </div>
           <br>
           <div class="form-group ">
            <label class="col-md-4"><b>Cocina:</b></label>
            <div class="col-md-4">
                <span id="coc"></span>
            </div>
          </div><br>
         <div class="form-group">
          <label  class="col-md-4"><b>Colchon:</b></label>
          <div class="col-md-4">
              <span id="col"></span>
          </div>
      </div><br>
       <div class="form-group">
        <label class="col-md-4"><b>Cama:</b></label>
        <div class="col-md-4">
            <span id="cam"></span>
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