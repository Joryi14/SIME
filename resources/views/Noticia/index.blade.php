@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">    
@endsection
@section('Script')
<script type="text/javascript">
  $(document).on('click', '.show-modal', function() {
            $('#ar').text($(this).data('ar'));
         });
 </script>
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
<script>
$(function () {
    $('#Noticia_table').DataTable({
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="content-row-title">Noticia
      <a href="{{route('noticia_create')}}" class="btn  btn-success btn-lg pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
  </h4>
  <br>
  </div>
<div class="panel-body">
  <div class="content-row">
    <div class="table-responsive">
            <table id="Noticia_table" class="table table-bordered">
            <thead>
            <tr>
                <th>Id de las noticias</th>
                <th>Titulo</th>
                <th>Id del autor</th>
                <th>Imagenes</th>
                <th>Videos</th>
                <th>PDF</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($noticias as $item)
              <tr>
              <td>{{$item->IdNoticias}}</td>
              <td>{{$item->Titulo}}</td>
              <td>{{$item->IdAutor}}</td>
              <td>
              @if($item->Imagenes != null)
              <img style='display:block; width:100px;height:100px;' src='img/{{$item->Imagenes}}'>
              @endif
            </td>
              <td>
                @if($item->Videos != null)
                 <a style="color: blue" href="{{$item->Videos}}">{{$item->Videos}}</a> 
              @endif
                </td>
              <td>
              @if($item->PDF != null)   
                {{$item->PDF}}
              @endif
              </td>
              <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
              <td><a href="/Noticia/{{$item->IdNoticias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar noticia">
                <i class="fa fa-fw fa-pencil text-success"></i></a>
              @role('Admin')
                <form id="form1" action="{{route('noticia_delete', ['Noticia' => $item->IdNoticias])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar noticia" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>@endrole
              <button class="show-modal btn-accion-tabla tooltipsC" title="Mostar articulo" data-toggle="modal" data-target="#Detalle"  data-ar="{{$item->Articulo}}" ><i class="fa fa-fw fa-file-text-o text-info"></i></a>
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
          <h4 class="modal-title"><b>Articulo</b></h4>
        </div>
        <div class="modal-body">
          <div class="row">
         <div class="form-group ">
              <textarea required="" id="ar" class="form-control" rows="10" cols="30" name="Articulo" readonly></textarea>
        </div></div><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection