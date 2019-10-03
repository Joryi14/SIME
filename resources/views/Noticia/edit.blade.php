@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
<div class="col-md-10">
    <div class="box box-info">
      <div class="box-header with-border">
          <div class="box-tools pull-right">
              
            </div>
        <h3 class="box-title">Editar Noticia</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/Noticia/{{$noticia->IdNoticias}}" enctype="multipart/form-data">
         @method('PUT')
        @csrf

         <!--<div class="box-body">
          <div class="form-group">
            <label for="FechaPublicacion" class="col-sm-2 control-label">Fecha de publicacion:</label>
            <div class="col-sm-9">
                <input type="date" name="FechaPublicacion" class= "form-control" >
            </div>
          </div>-->

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
                
                <div class="col-sm-2">
                
                    <input type="file" name="Imagenes" >  
                </div>
              </div>

              <div class="form-group">
                  <label for="Videos" class="col-sm-2 control-label">Videos: </label>
                  <div class="col-sm-3">
                      <input type="file" name="Videos"  value="{{$noticia->Videos}}"> 
                  </div>
                </div>
                <div class="form-group">
                    <label for="Articulo" class="col-sm-2 control-label">Artículo: </label>
                    <div class="col-sm-9">
                        <input type="text" name="Articulo" class="form-control" value=" {{$noticia->Articulo}}" >
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="PDF" class="col-sm-2 control-label">PDF: </label>
                      <div class="col-sm-9">
                          <input type="file" name="PDF" value=" {{$noticia->PDF}}" >
                      </div>
                    </div>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    </div>
  </div>
</div>
@endsection
