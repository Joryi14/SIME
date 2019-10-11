@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
<script type="text/javascript">
  document.querySelector('#formE').addEventListener('submit', function(e) {
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
    $('#Emergencia_table').DataTable({
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
        <div class="box-header" style="padding:2%">
            {{-- <div class="box-tools pull-right">
                <a href="{{route('emergencia_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear
                </a>
            </div>
             --}}
          <h3 class="box-title">Lista de emergencias</h3>
        </div>
       
          <div class="box-body table-responsive" >
          <table id="Emergencia_table" class="table table-bordered table-striped">
              <thead>
              
            <tr>
              <th>Id de la emergencia</th>
              <th>Nombre de las emergencias</th>
              <th>Categoría</th>
              <th>Tipo de emergencia</th>
              <th>Descripción</th>
              <th>Longitud</th>
              <th>Latitud</th>
              <th>Acciones</th>
            
            </tr>
          </thead>
            @foreach ($emergencias as $item)
              <tr>
              <td>{{$item->idEmergencias}}</td>    
              <td>{{$item->NombreEmergencias}}</td>
              <td>{{$item->Categoria}}</td>
              <td>{{$item->TipoDeEmergencia}}</td>
              <td>{{$item->Descripcion}}</td>
              <td>{{$item->Longitud}}</td>
              <td>{{$item->Latitud}}</td>
              <td><a href="/Emergencia/{{$item->idEmergencias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar emergencia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="formE"  action="{{route('emergencia_delete', ['Emergencia' => $item->idEmergencias])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Emergencia" onclick="confirmarEnvio()">
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