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

            $('#pd').text($(this).data('pd'));
           $('#mg').text($(this).data('mg'));
           $('#pi').text($(this).data('pi'));
           $('#pm').text($(this).data('pm'));
            $('#ed').text($(this).data('ed'));
           $('#se').text($(this).data('se'));
           $('#tel').text($(this).data('tel'));
           $('#pat').text($(this).data('pat'));
         });
 </script>
 <script>
$(function () {
    $('#Jefe_table').DataTable({
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
    <h4 class="content-row-title">Jefes de familia
                <a href="{{route('jefe_create')}}" class="btn  btn-info btn-lg pull-right">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear
                </a>
          </h4>
          <br>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <table id="Jefe_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id del jefe de familia</th>
              <th>Total de personas</th>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Cédula</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
            </thead>
            @foreach ($JefeF as $item)
              <tr>
              <td>{{$item->IdJefe}}</td>  
              <td>{{$item->TotalPersonas}}</td>    
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Apellido1}}</td>
              <td>{{$item->Apellido2}}</td>
              <td>{{$item->Cedula}}</td>
              <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
               <td><a href="/JefeDeFamilia/{{$item->IdJefe}}/edit" class="btn-accion-tabla tooltipsC" title="Editar jefe de familia">
                <i class="fa fa-pencil text-success"></i></a>
                <a href="/JefeDeFamilia/{{$item->IdJefe}}/agregarfamiliar" class="btn-accion-tabla tooltipsC" title="Agregar familiar">
                  <i class="fa fa-fw fa-plus-circle text-success"></i></a>
                  @role('Admin')
                  <form action="{{route('jefe_delete', ['JefeDeFamilia' => $item->IdJefe])}}" method="POST">
                    @csrf 
                    <input name="_method" type="hidden" value="DELETE">
                    <button  type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar jefe de familia">
                        <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form>
                  @endrole 
                  <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar jefe de familia" data-toggle="modal" data-target="#Detalle"  data-pd="{{$item->PcD}}" data-mg="{{$item->MG}}" data-pi="{{$item->PI}}" data-pm="{{$item->PM}}" data-ed="{{$item->Edad}}" data-se="{{$item->sexo}}" data-tel="{{$item->Telefono}}" data-pat="{{$item->Patologia}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
            <h4 class="modal-title"><b>Información de jefe de familia</b></h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="form-group">
              <label class="col-md-6"><b>Persona con discapacidad:</b></label>
              <div class="col-md-6">
                  <span id="pd"></span>
              </div>
            </div>
          </div><br>
          <div class="row">
           <div class="form-group">
            <label class="col-md-6"><b>Mujer Gestante:</b></label>
            <div class="col-md-6">
                <span id="mg"></span>
            </div>
          </div>
        </div><br>
          <div class="row">
         <div class="form-group">
          <label  class="col-md-6"><b>Persona Indigena:</b></label>
          <div class="col-md-6">
              <span id="pi"></span>
          </div>
      </div>
    </div><br>
      <div class="row">
       <div class="form-group">
        <label class="col-md-6"><b>Persona Migrante:</b></label>
        <div class="col-md-6">
            <span id="pm"></span>
        </div>
      </div>  
    </div>  
          <br>
          <div class="row">
          <div class="form-group">
            <label class="col-md-6"><b>Edad:</b></label>
            <div class="col-md-6">
                <span id="ed"></span>
            </div>
          </div>
        </div>    
              <br>
              <div class="row">
              <div class="form-group">
                <label class="col-md-6"><b>Sexo:</b></label>
                <div class="col-md-6">
                    <span id="se"></span>
                </div>
              </div>
            </div>    
                  <br>
                  <div class="row">
                  <div class="form-group">
                    <label class="col-md-6"><b>Telefono:</b></label>
                    <div class="col-md-6">
                        <span id="tel"></span>
                    </div>
                  </div>
                </div>    
                      <br>
                      <div class="row">
                      <div class="form-group">
                        <label class="col-md-6"><b>Patologia:</b></label>
                        <div class="col-md-6">
                            <span id="pat"></span>
                        </div>
                      </div>   
                    </div> 
                          <br><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline btn-warning pull-left" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
