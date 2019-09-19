@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
<script type="text/javascript">
  document.querySelector('#form1').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault(); // <--- prevent form from submitting
  Swal.fire({
      title: "Esta seguro de eliminar?",
      text: "Una vez eliminado no se puede recuperar!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
     reverseButtons: true
    }).then((result)=> {
      if (result.value) {
        swalWithBootstrapButtons.fire('Deleted!',
      'Your file has been deleted.',
      'success')}
        else if (
      result.dismiss === Swal.DismissReason.cancel) 
      {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
});
</script>
<script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script>
$(function () {
    $('#Albergue_Table').DataTable({
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
    <div class="col-xs-10">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('albergue_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Albergue
                </a>
            </div>
            
          <h3 class="box-title">Albergue</h3>
        </div>
        
        
        <div class="box-body table-responsive no-padding" >
          <table id="Albergue_Table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del albergue</th>
              <th>Nombre del albergue</th>
              <th>Distrito</th>
              <th>Comunidad</th>
              <th>Tipo de la instalacion</th>
              <th>Capacidad del lugar</th>
              <th>Cedula del responsable</th>
              <th>Telefono</th>
              <th>Duchas</th>
              <th>Inodoros</th>
              <th>Espacios de cocina</th>
              <th>Bodega</th>
              <th>Longitud</th>
              <th>Latitud</th>
              <th>Nececidades</th>
              <th>Acciones</th>
              </tr>
              </thead>
            @foreach ($albergue as $item)
              <tr>
              <td>{{$item->idAlbergue}}</td>    
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Distrito}}</td>
              <td>{{$item->Comunidad}}</td>
              <td>{{$item->TipoDeInstalacion}}</td>
              <td>{{$item->Capacidad}}</td>
              <td>{{$item->IdResponsable}}</td>
              <td>{{$item->telefono}}</td>
              <td>{{$item->Duchas}}</td>
              <td>{{$item->inodoros}}</td>
              <td>{{$item->EspacioDeCocina}}</td>
              <td>{{$item->Bodega}}</td>
              <td>{{$item->Longitud}}</td>
              <td>{{$item->Latitud}}</td>
              <td>{{$item->Nececidades}}</td>
              <td><a href="/Albergue/{{$item->idAlbergue}}/edit" class="btn-accion-tabla tooltipsC" title="Editar albergue">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('albergue_delete', ['Albergue' => $item->idAlbergue])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Albergue" onclick="confirmarEnvio()">
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