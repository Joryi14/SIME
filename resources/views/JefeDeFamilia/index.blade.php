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
            if($(this).data('pd')== 1)
            $('#pd').text("Si");
            else
            $('#pd').text("No");
            if($(this).data('mg')== 1)
            $('#mg').text("Sí");
            else
            $('#mg').text("No");
            if($(this).data('pi')== 1)
            $('#pi').text("Sí");
            else
            $('#pi').text("No");
            if($(this).data('pm')== 1)
            $('#pm').text("Sí");
            else
            $('#pm').text("No");
         });
 </script>
<script type="text/javascript">
  document.querySelector('#form2').addEventListener('submit', function(e) {
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
<div class="row">
    <div class="col-xs-12">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('jefe_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear jefe de familia
                </a>
            </div>
            
          <h3 class="box-title">Jefes de familia</h3>
        </div>
        <div class="box-body table-responsive">
          <table id="Jefe_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID jefe de familia</th>
              <th>Total de personas</th>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Cédula</th>
              <th>Edad</th>
              <th>Sexo</th>
              <th>Teléfono</th>
              <th>Patologia</th>
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
              <td>{{$item->Edad}}</td>
              <td>{{$item->sexo}}</td>    
              <td>{{$item->Telefono}}</td>
              <td>{{$item->Patologia}}</td>
              <td><a href="/JefeDeFamilia/{{$item->IdJefe}}/edit" class="btn-accion-tabla tooltipsC" title="Editar jefe de familia">
                <i class="fa fa-fw fa-pencil"></i></a>
                <form id="form2" action="{{route('jefe_delete', ['JefeDeFamilia' => $item->IdJefe])}}" method="POST">
                    @csrf 
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Jefe" onclick="confirmarEnvio()">
                        <i class="fa fa-fw fa-trash text-danger"></i>
                    </button>
                  </form> 
                  <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar jefe de familia" data-toggle="modal" data-target="#Detalle"  data-pd="{{$item->PcD}}" data-mg="{{$item->MG}}" data-pi="{{$item->PI}}" data-pm="{{$item->PM}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
            <div class="form-group">
              <label class="col-md-4 "><b>Persona con discapacidad:</b></label>
              <div class="col-md-4">
                  <span id="pd"></span>
              </div>
            </div>
           <br>
           <div class="form-group ">
            <label class="col-md-4"><b>Mujer Gestante:</b></label>
            <div class="col-md-4">
                <span id="mg"></span>
            </div>
          </div><br>
         <div class="form-group">
          <label  class="col-md-4"><b>Persona Indigena:</b></label>
          <div class="col-md-4">
              <span id="pi"></span>
          </div>
      </div><br>
       <div class="form-group">
        <label class="col-md-4"><b>Persona Migrante:</b></label>
        <div class="col-md-4">
            <span id="pm"></span>
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
