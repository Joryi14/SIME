@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('Noticia_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Noticia
                </a>
            </div>
            
          <h3 class="box-title">Noticia</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
                <th>IdNoticias</th>
                <th>FechaPublicacion</th>
                <th>Titulo</th>
                <th>IdAutor</th>
                <th>Imagenes</th>
                <th>Videos</th>
                <th>Articulo</th>
                
                <th>Nombre PDF</th>
                

             
            </tr>
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
              <form action="{{route('noticia_delete', ['Noticia' => $item->IdNoticias])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Noticia">
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