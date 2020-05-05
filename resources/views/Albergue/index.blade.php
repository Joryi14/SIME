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
           if($(this).data('du')== 1)
           $('#du').text("Posee");
           else
           $('#du').text("No posee");

           if($(this).data('ino')== 1)
           $('#ino').text("Posee");
           else
           $('#ino').text("No posee");

           if($(this).data('edc')== 1)
           $('#edc').text("Posee");
           else
           $('#edc').text("No posee");

           if($(this).data('bo')== 1)
           $('#bo').text("Posee");
           else
           $('#bo').text("No posee");

            $('#lon').text($(this).data('lon'));
            $('#lat').text($(this).data('lat'));
            $('#tip').text($(this).data('tip'));
            $('#nec').text($(this).data('nec'));
            var d = $(this).data('fec');
            $('#fec').text(d.toString());
            $('#per').text($(this).data('per'));
         });
 </script>
<script>
$(function () {
    $('#Albergue_Table').DataTable({
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
    <h4 class="content-row-title">Albergue
      <a href="{{route('albergue_create')}}" class="btn btn-success btn-lg  pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
          </h4>
          <br>
        </div>
        <div class="panel-body table-responsive" >
          <table id="Albergue_Table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del albergue</th>
              <th>Nombre del albergue</th>
              <th>Distrito</th>
              <th>Comunidad</th>
              <th>Capacidad del lugar</th>
              <th>Cédula del responsable</th>
              <th>Teléfono</th>
              <th>Estado</th>
              <th>Acciones</th>
              </tr>
              </thead>
            @foreach ($albergue as $item)
              <tr>
              <td>{{$item->idAlbergue}}</td>
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Distrito}}</td>
              <td>{{$item->Comunidad}}</td>
              <td>{{$item->Capacidad}}</td>
              <td>{{$item->User->Cedula}}</td>
              <td>{{$item->telefono}}</td>
              <td>
                @if($item->Estado == 'Activa')
                <span class="badge badge-success">{{$item->Estado}}</span></a>
                @else
              <span class="badge badge-danger">{{$item->Estado}}</span></a>
                @endif</td>
              <td><a href="/Albergue/{{$item->idAlbergue}}/edit" class="btn-accion-tabla tooltipsC" title="Editar albergue">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
              <form id="form1" action="{{route('albergue_delete', ['Albergue' => $item->idAlbergue])}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar albergue" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
            <button  class="show-modal btn-accion-tabla tooltipsC"title="Información de albergue" data-toggle="modal" data-target="#Detalle"  data-du="{{$item->Duchas}}" data-ino="{{$item->inodoros}}" data-edc="{{$item->EspaciosDeCocina}}" data-bo="{{$item->Bodega}}" data-lon="{{$item->Longitud}}" data-lat="{{$item->Latitud}}" data-tip ="{{$item->TipoDeInstalacion}}" data-nec="{{$item->Nececidades}}" data-fec="{{date('d-m-Y',strtotime($item->created_at))}}" data-per ="{{$item->PersonasAlbergue}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
       <div class="form-group ">
        <label class="col-md-4"><b>Duchas:</b></label>
        <div class="col-md-4">
            <span id="du"></span>
        </div>
      </div>
      </div><br>
      <div class="row">
     <div class="form-group">
      <label  class="col-md-4"><b>Inodoros:</b></label>
      <div class="col-md-4">
          <span id="ino"></span>
      </div>
  </div>
  </div><br>
  <div class="row">
   <div class="form-group">
    <label class="col-md-4"><b>Espacios de cocina:</b></label>
    <div class="col-md-4">
        <span id="edc"></span>
    </div>
  </div></div>
      <br>
      <div class="row">
        <div class="form-group">
          <label class="col-md-4"><b>Bodega:</b></label>
          <div class="col-md-4">
            <span id="bo"></span>
          </div>
        </div>
      </div>
          <br>
          <div class="row">
          <div class="form-group">
        <label class="col-md-4"><b>Longitud:</b></label>
        <div class="col-md-4">
            <span id="lon"></span>
        </div>
      </div></div>
          <br>
          <div class="row">
          <div class="form-group">
        <label class="col-md-4"><b>Latitud:</b></label>
        <div class="col-md-4">
            <span id="lat"></span>
        </div>
      </div></div>
          <br>
          <div class="row">
          <div class="form-group">
            <label class="col-md-4"><b>Tipo de instalación:</b></label>
            <div class="col-md-4">
                <span id="tip"></span>
            </div>
          </div>
          </div>
          <br>
          <div class="row">
          <div class="form-group">
            <label class="col-md-4"><b>Nececidades:</b></label>
            <div class="col-md-4">
                <span id="nec"></span>
            </div>
          </div>
          </div><br>
          <div class="row">
          <div class="form-group">
            <label class="col-md-4"><b>Fecha:</b></label>
            <div class="col-md-4">
                <span id="fec"></span>
            </div>
          </div>
        </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="col-md-4"><b>Personas en Albergue:</b></label>
              <div class="col-md-4">
                  <span id="per"></span>
              </div>
            </div>
            </div><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline btn-danger  pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection
