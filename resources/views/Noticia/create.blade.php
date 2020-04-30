@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Succes')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="content-row-title">Crear nueva noticia
      <a href="{{route('inicio_noticia')}}" class="btn btn-success pull-right">
          <i class="fa fa-fw fa-reply-all"></i> Regresar
      </a>
          </h4>
    </div>
      <form class="form-horizontal" method="POST" action="/Noticia/store" enctype="multipart/form-data">
        @csrf
       <div class="panel-body">
          <div class="form-group">
            <label for="Titulo" class="col-sm-2 control-label">Titulo: </label>
            <div class="col-sm-9">
              <input type="text" name="Titulo" class= "form-control" >
            </div>
          </div>
        <input type="hidden" name="IdAutor" value="{{Auth::user()->id}}" class= "form-control" >
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
                        <input type="text" name="Articulo" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="PDF" class="col-sm-2 control-label">PDF: </label>
                          <input type="file" name="PDF" accept="application/PDF">
                  </div>
        </div>
        <div class="panel-footer">
            @include("Includes.boton-form-create")
        </div>
    </form>
    </div>
@endsection
