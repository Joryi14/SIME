@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2-bootstrap.css")}}">
@section('Contenido')
<div class="row">
<div class="col-md-10">
    @include('Includes.Error-form')
    @include('Includes.mensaje-Succes')
    <div class="box box-info">
      <div class="box-header with-border"  style="padding:2%">
          <div class="box-tools pull-right">
              <div class="col-sm-12">
              <a href="{{route('inicio_noticia')}}" class="btn btn-block btn-info ">
                  <i class="fa fa-fw fa-reply-all"></i> Regresar
              </a>
              </div>
            </div>
        <h3 class="box-title">Crear nueva noticia</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/Noticia/store" enctype="multipart/form-data">
        @csrf
       <div class="box-body">
          <div class="form-group">
            <label for="Titulo" class="col-sm-2 control-label">Titulo: </label>
            <div class="col-sm-9">
              <input type="text" name="Titulo" class= "form-control" >
            </div>
          </div>
          <div class="form-group">
              <label for="IdAutor" class="col-sm-2 control-label">Autor: </label>
              <div class="col-sm-9">
                  <input type="text" name="IdAutor" class= "form-control" > 
              </div>
            </div>
            <div class="form-group">
                <label for="Imagenes" class="col-sm-2 control-label">Imagenes: </label>
                <button type="button" class="btn fa fa-plus bg-yellow">
                    <input type="file" name="Imagenes" accept="image/*"  >  
                  </button>
              </div>
              <div class="form-group">
                  <label for="Videos" class="col-sm-2 control-label">Videos: </label>
                  <button type="button" class="btn fa fa-plus bg-yellow">
                      <input type="file" name="Videos"> 
                  </button>
                </div>
               
                <div class="form-group">
                    <label for="Articulo" class="col-sm-2 control-label">Artículo: </label>
                    <div class="col-sm-9">
                        <input type="text" name="Articulo" class="form-control" >
                    </div>
                  </div>
               
                  <div class="form-group">
                      <label for="PDF" class="col-sm-2 control-label">PDF: </label>
                      <button type="button" class="btn fa fa-plus bg-yellow">
                          <input type="file" name="PDF" accept="application/PDF">
                      </button>
                  </div>
        </div>
        <div class="box-footer">
            @include("Includes.boton-form-create")
        </div>
    </form>
    </div>
  </div>
  </div>
</div>
@endsection
