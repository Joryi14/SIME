@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
      <div class="col-md-10">
          <div class="box box-success">
            <div class="box-header with-border " style="padding:2%"> 
                <div class="box-tools pull-right">
                    <div class="col-sm-12">
                        <a href="{{route('inicio_mensaje')}}" class="btn btn-block btn-info ">
                            <i class="fa fa-fw fa-reply-all"></i> Regresar
                        </a>
                        </div>
                    
                  </div>
              <h3 class="box-title">Editar mensaje</h3>
            </div>
<form class= "form-horizontal" method="POST" action="/Mensajeria/{{$mensajeria->IdMensajeria}}">
 @method('PUT')
  @csrf

<div class= "box-body">

      <div class="form-group">
            <label for="CodigoIncidente" class="col-sm-2 control-label">Código de incidente: </label>
            <div class="col-sm-9">
              <input type="text" name="CodigoIncidente" class= "form-control" value=" {{$mensajeria->CodigoIncidente}}" >
            </div>
          </div>


          <div class="form-group">
               <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>
               <div class="col-sm-9">
                 <input type="text" name="Descripcion" class= "form-control" value=" {{$mensajeria->Descripcion}}" >
               </div>
             </div>

             <div class="form-group">
                  <label for="Ubicacion" class="col-sm-2 control-label">Ubicación: </label>
                  <div class="col-sm-9">
                    <input type="text" name="Ubicacion" class= "form-control" value=" {{$mensajeria->Ubicacion}}" >
                  </div>
                </div>

                <div class="form-group">
                     <label for="Hora" class="col-sm-2 control-label">Hora: </label>
                     <div class="col-sm-9">
                       <input type="text" name="Hora" class= "form-control" value=" {{$mensajeria->Hora}}" >
                     </div>
                   </div>


                   <div class="form-group">
                        <label for="Fecha" class="col-sm-2 control-label">Fecha: </label>
                        <div class="col-sm-9">
                          <input type="text" name="Fecha" class= "form-control" value=" {{$mensajeria->fecha}}" >
                        </div>
                      </div>
                      
                   <div class="form-group">
                        <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>
                        <div class="col-sm-9">
                          <input type="text" name="Categoria" class= "form-control" value=" {{$mensajeria->Categoria}}" >
                        </div>
                      </div>

                      <div class="form-group">
                           <label for="IdLiderComunal" class="col-sm-2 control-label">Id líder comunal: </label>
                           <div class="col-sm-9">
                             <input type="text" name="IdLiderComunal" class= "form-control" value=" {{$mensajeria->IdLiderComunal}}" >
                           </div>
                         </div>



</div>

<div class="box-footer">
      @include("Includes.boton-editar")
   </div>
  </form>
     </div>  
  </div>
</div>
 
@endsection