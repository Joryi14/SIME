@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="content-row-title">Editar noticia
      <a href="{{route('inicio_noticia')}}" class="btn  btn-success pull-right">
          <i class="fa fa-fw fa-reply-all"></i> Regresar
      </a>
            </h3>
    </div>
      <form class="form-horizontal" method="POST" action="/Noticia/{{$noticia->IdNoticias}}" enctype="multipart/form-data">
         @method('PUT')
        @csrf
         <div class="panel-body">
          <div class="form-group">
            <label for="FechaPublicacion" class="col-sm-2 control-label">Fecha de publicacion:</label>
            <div class="col-sm-9">
                <input type="text" name="created_at" class= "form-control" value="{{$noticia->created_at}}" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="Titulo" class="col-sm-2 control-label">Titulo: </label>
            <div class="col-sm-9">
              <input type="text" name="Titulo" class= "form-control" value=" {{$noticia->Titulo}}" >
            </div>
          </div>
          <div class="form-group">
              <label for="IdAutor" class="col-sm-2 control-label">Autor: </label>
              <div class="col-sm-9">
                  <input type="text" name="IdAutor" class= "form-control" value=" {{$noticia->IdAutor}}"  readonly>
              </div>
            </div>
               <div class="form-group">
                <label for="Imagenes" class="col-sm-2 control-label">Imagenes: </label>

                    <input type="file" name="Imagenes" accept="image/*"  >

              </div>

              <div class="form-group">
                  <label for="Videos" class="col-sm-2 control-label">Videos: </label>

                      <input type="file" name="Videos">

                </div>
                <div class="form-group">
                    <label for="Articulo" class="col-sm-2 control-label">Artículo: </label>
                    <div class="col-sm-9">
                        <input type="text" name="Articulo" class="form-control" value=" {{$noticia->Articulo}}" >
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="PDF" class="col-sm-2 control-label">PDF: </label>

                          <input type="file" name="PDF" accept="application/PDF">

                    </div>
        </div>
           <div class="panel-footer">
              @include("Includes.boton-editar")
           </div>
      </form>
</div>
@endsection
