@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
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
    $('#Noticia_table').DataTable({
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
                <a href="{{route('noticia_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Noticia
                </a>
            </div>
            
          <h3 class="box-title">Noticia</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
            <table id="Noticia_table" class="table table-bordered table-striped">
              <thead>
           
            <tr>
                <th>IdNoticias</th>
                <th>FechaPublicacion</th>
                <th>Titulo</th>
                <th>IdAutor</th>
                <th>Imagenes</th>
                <th>Videos</th>
                <th>Articulo</th>
<<<<<<< HEAD
                
                <th>Nombre PDF</th>
                

             
=======
                <th>PDF</th>
                <th>Acciones</th>
>>>>>>> monica
            </tr>
          </thead>
            @foreach ($noticias as $item)
              <tr>
              <td>{{$item->IdNoticias}}</td>  
              <td>{{$item->created_at}}</td>    
              <td>{{$item->Titulo}}</td>
              <td>{{$item->IdAutor}}</td>
              <td>
              <img style='display:block; width:100px;height:100px;' src='data:image/jpeg;base64,{{$item->Imagenes}}'  alt="base64 test">
            </td>
              <td><video width="200" height="120"  controls>
                  <source src='data:video/mp4;base64,{{$item->Videos}}' type="video/mp4">
                  </video>
                  </td>
              <td><p>{{$item->Articulo}}<p></td>
             
              <td>{{$item->NombrePDF}}</td>
              <td><a href="/Noticia/{{$item->IdNoticias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar Noticia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('noticia_delete', ['Noticia' => $item->IdNoticias])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Noticias" onclick="confirmarEnvio()">
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