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
           if($(this).data('ref')== 1)
           $('#refr').text("Posee");
           else
           $('#refr').text("No posee");
           if($(this).data('coc')== 1)
           $('#coc').text("Posee");
           else
           $('#coc').text("No posee");
           if($(this).data('col')== 1)
           $('#col').text("Posee");
           else
           $('#col').text("No posee");
           if($(this).data('cam')== 1)
           $('#cam').text("Posee");
           else
           $('#cam').text("No posee");
        });
</script>
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
    @include('Includes.mensaje-Error')
    @include('Includes.mensaje-Succes')
    <div class="panel panel-warning ">
      <div class="panel-heading">
        <h4 class="content-row-title">Censos
                <a href="{{route('censo_create')}}" class="btn btn-info btn-lg pull-right">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear
                </a>
          </h4>
          <br>
        </div>
         <div class="panel-body">
          <table id="Censo_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id del censo</th>
              <th>Cédula del jefe de familia</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
                @foreach ($censos as $item)
                  <tr>
                  <td>{{$item->IdCenso}}</td>
                  <td>{{$item->jefeFamilia->Cedula}} {{$item->jefeFamilia->Nombre}} {{$item->jefeFamilia->Apellido1}} {{$item->jefeFamilia->Apellido2}}</td>
                  <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                  <td><a href="/Censo/{{$item->IdCenso}}/edit" class="btn-accion-tabla tooltipsC" title="Editar censo">
                    <i class="fa fa-fw fa-pencil text-success"></i></a>
                  <form id="form1" action="{{route('censo_delete', ['Censo' => $item->IdCenso])}}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar censo" onclick="confirmarEnvio()">
                        <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form>
                  <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar censo" data-toggle="modal" data-target="#Detalle"  data-ref="{{$item->Refrigerador}}" data-coc="{{$item->Cocina}}" data-col="{{$item->Colchon}}" data-cam="{{$item->Cama}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
            <div class="row">
            <div class="form-group">
              <label class="col-md-4 "><b>Refrigerador:</b></label>
              <div class="col-md-4">
                  <span id="refr"></span>
              </div>
            </div></div>
           <br>
           <div class="row">
           <div class="form-group ">
            <label class="col-md-4"><b>Cocina:</b></label>
            <div class="col-md-4">
                <span id="coc"></span>
            </div>
          </div></div> <br>
          <div class="row">
         <div class="form-group">
          <label  class="col-md-4"><b>Colchón:</b></label>
          <div class="col-md-4">
              <span id="col"></span>
          </div>
      </div></div> <br>
      <div class="row">
       <div class="form-group">
        <label class="col-md-4"><b>Cama:</b></label>
        <div class="col-md-4">
            <span id="cam"></span>
        </div>
      </div> </div>
          <br><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline btn-warning pull-left" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
