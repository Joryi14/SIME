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
    $('#Emergencia_table').DataTable({
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
                <a href="{{route('emergencia_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Emergencia
                </a>
            </div>
            
          <h3 class="box-title">Emergencias</h3>
        </div>
       
          <div class="box-body table-responsive no-padding" >
          <table id="Emergencia_table" class="table table-bordered table-striped">
              <thead>
              
            <tr>
              <th>Id de la Emergencia</th>
              <th>Nombre de la Emergencias</th>
              <th>Categoria</th>
              <th>Tipo De Emergencia</th>
              <th>Descripcion</th>
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
              <form id="form1" action="{{route('emergencia_delete', ['Emergencia' => $item->idEmergencias])}}" method="POST">
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