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
           $('#ape1').text($(this).data('ape1'));
           $('#ape2').text($(this).data('ape2'));
           $('#par').text($(this).data('par'));
           $('#eda').text($(this).data('eda'));
           $('#se').text($(this).data('se'));
           $('#pcd').text($(this).data('pcd'));
           $('#mg').text($(this).data('mg'));
           $('#pi').text($(this).data('pi'));
           $('#pm').text($(this).data('pm'));
           $('#pa').text($(this).data('pa'));
        });
</script>
<script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script>
$(function () {
    $('#Familias_table').DataTable({
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
      @include('Includes.mensaje-Error')
      @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header" style="padding:2%">
            <div class="box-tools pull-right">
                <a href="{{route('familias_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear
                </a>
            </div>
            
          <h3 class="box-title">Familias</h3>
        </div>
        <div class="box-body table-responsive" >
          <table id="Familias_table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id de familia</th>
              <th>Cedula del jefe de familia</th>
              <th>Cédula</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($Familias as $item)
              <tr>
              <td>{{$item->IdFamilia}}</td>      
              <td>{{$item->jefeDeFamilia->Cedula}}</td>  
              <td>{{$item->Cedula}}</td>
              <td>{{$item->Nombre}}</td>
              <td><a href="/Familias/{{$item->IdFamilia}}/edit" class="btn-accion-tabla tooltipsC" title="Editar familia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('familias_delete', ['Familias' => $item->IdFamilia])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar familia" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar censo" data-toggle="modal" data-target="#Detalle"  
              data-ape1="{{$item->Apellido1}}" 
              data-ape2="{{$item->Apellido2}}" 
              data-par="{{$item->Parentesco}}" 
              data-eda="{{$item->Edad}}"
              data-se="{{$item->sexo}}"
              data-pcd="{{$item->PcD}}"
              data-mg="{{$item->MG}}"
              data-pi="{{$item->PI}}"
              data-pm="{{$item->PM}}"
              data-pa="{{$item->Patologia}}">
              <i class="fa fa-fw fa-file-text-o text-info">
              </i>
              </a>
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
                <h4 class="modal-title"><b>Información del Familiar</b></h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-4"><b>Primer apellido</b></label>
                    <div class="col-md-4">
                        <span id="ape1"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Segundo apellido</b></label>
                    <div class="col-md-4">
                        <span id="ape2"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Parentesco</b></label>
                    <div class="col-md-4">
                        <span id="par"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Edad</b></label>
                    <div class="col-md-4">
                        <span id="eda"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Sexo</b></label>
                    <div class="col-md-4">
                        <span id="se"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Persona con Discapacidad</b></label>
                    <div class="col-md-4">
                        <span id="pcd"></span>
                    </div>
                </div><br>
                <div class="form-group">
                    <label class="col-md-4"><b>Mujer Gestante</b></label>
                    <div class="col-md-4">
                        <span id="mg"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Persona Indigena</b></label>
                    <div class="col-md-4">
                        <span id="pi"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Persona Migrante</b></label>
                    <div class="col-md-4">
                        <span id="pm"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4"><b>Patologia</b></label>
                    <div class="col-md-4">
                        <span id="pa"></span>
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