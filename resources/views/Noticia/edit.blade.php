@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
<div class="col-md-10">
    <div class="box box-success">
      <div class="box-header with-border" style="padding:2%">
          <div class="box-tools pull-right">
              <div class="col-sm-12">
                  <a href="{{route('inicio_noticia')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
              
            </div>
        <h3 class="box-title">Editar noticia</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/Noticia/{{$noticia->IdNoticias}}" enctype="multipart/form-data">
         @method('PUT')
        @csrf

         <div class="box-body">
          {{-- <div class="form-group">
            <label for="FechaPublicacion" class="col-sm-2 control-label">Fecha de publicacion:</label>
            <div class="col-sm-9">
                <input type="date" name="FechaPublicacion" class= "form-control" >
            </div>
          </div>--> --}}

          <div class="form-group">
            <label for="Titulo" class="col-sm-2 control-label">Titulo: </label>
            <div class="col-sm-9">
              <input type="text" name="Titulo" class= "form-control" value=" {{$noticia->Titulo}}" >
            </div>
          </div>
          <div class="form-group">
              <label for="IdAutor" class="col-sm-2 control-label">Autor: </label>
              <div class="col-sm-9">
                  <input type="text" name="IdAutor" class= "form-control" value=" {{$noticia->IdAutor}}"  > 
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
                        <input type="text" name="Articulo" class="form-control" value=" {{$noticia->Articulo}}" >
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="PDF" class="col-sm-2 control-label">PDF: </label>
                      <button type="button" class="btn fa fa-plus bg-yellow">
                          <input type="file" name="PDF" accept="application/PDF">
                      </button>
                    </div>            
        </div>
           <!-- /.box-body -->
           <div class="box-footer">
              @include("Includes.boton-editar")
           </div>
           <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>
@endsection
