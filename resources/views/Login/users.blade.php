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
            $('#pat').text($(this).data('pat'));
           $('#nac').text($(this).data('nac'));
           $('#com').text($(this).data('com'));
         });
 </script>
<script>
  $(function () {
      $('#users_table').DataTable({
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
          "search": "Buscar: ",
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
<div class="panel panel-info">
  <div class="panel-heading">
    <h4 class="content-row-title">Usuarios</h4>
  </div>
  <div class="panel-body">
  <div class="content-row">
    <div class="table-responsive">
        <table id="users_table"class="table table-bordered" style="font-size:12px">
            <thead>
            <tr>
              <th>Id usuario</th>
              <th>Correo</th>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Cédula</th>
              <th>Acciones</th>
            </tr>
            </thead>
            @foreach ($users as $item)
              <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->Apellido1}}</td>
              <td>{{$item->Apellido2}}</td>
              <td>{{$item->Cedula}}</td>
              <td>
              <form id="form1" action="{{route('user_delete', ['user' => $item->id])}}" method="POST">
                  @csrf @method('delete')
                  <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar usuario">
                      <i class="fa fa-fw fa-trash text-danger"></i>
                  </button>
                </form>
                  <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar usuarios" data-toggle="modal" data-target="#Detalle"  data-nac="{{$item->Nacionalidad}}" data-pat="{{$item->patologia}}" data-com="{{$item->Comunidad}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
    </div>
  </div>
  </div>
<div class="modal modal-default fade" id="Detalle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Información de jefe de familia</b></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="form-group">
          <label class="col-md-6"><b>Patologías:</b></label>
          <div class="col-md-6">
              <span id="pat"></span>
          </div>
        </div>
      </div><br>
      <div class="row">
       <div class="form-group">
        <label class="col-md-6"><b>Nacionalidad:</b></label>
        <div class="col-md-6">
            <span id="nac"></span>
        </div>
      </div>
    </div><br>
      <div class="row">
     <div class="form-group">
      <label  class="col-md-6"><b>Comunidad:</b></label>
      <div class="col-md-6">
          <span id="com"></span>
      </div>
  </div>
</div>
        <br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-primary pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
