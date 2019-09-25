@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        @include('includes.Error-form')
        @include('Includes.mensaje-Error')
        <div class="box box-info">
          <div class="box-header with-border">
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_personasAlbergue')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
            <h3 class="box-title">Crear persona en albergue</h3>
          </div>
          <form class="form-horizontal" method="POST" action="/PersonasAlbergue/store">

            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="idAlbergue" class="col-sm-2 control-label">idAlbergue: </label>
                <div class="col-sm-8">
                    <input type="text" name="idAlbergue" class= "form-control" >
                </div>
              </div>
              <div class="form-group">
                <label for="idJefe" class="col-sm-2 control-label">idJefe: </label>
    
                <div class="col-sm-8">
                    <input type="text" name="idJefe" class= "form-control" >
                </div>
              </div>
              <div class="form-group">
                  <label for="LugarDeProcedencia" class="col-sm-2 control-label">LugarDeProcedencia:  </label>
      
                  <div class="col-sm-8">
                      <input type="text" name="LugarDeProcedencia" class= "form-control" > 
                  </div>
                </div>


                <div class="form-group">
                    <label for="FechaDeIngreso" class="col-sm-2 control-label">FechaDeIngreso: </label>
        
                    <div class="col-sm-3">
                        <input type="date" name="FechaDeIngreso" class= "form-control" >
                    </div>
                  </div>


                  <div class="form-group">
                      <label for="HoraDeIngreso" class="col-sm-2 control-label">HoraDeIngreso: </label>
          
                      <div class="col-sm-2">
                          <input type="time" name="HoraDeIngreso" class= "form-control">
                      </div>
                    </div>
                   
                      <div class="form-group">
                          <label for="FechaDeSalida" class="col-sm-2 control-label">FechaDeSalida: </label>
              
                          <div class="col-sm-3">
                              <input type="date" name="FechaDeSalida" class= "form-control" >
                          </div>
                        </div>
                       
                          <div class="form-group">
                              <label for="HoraDeSalida" class="col-sm-2 control-label">HoraDeSalida: </label>
                  
                              <div class="col-sm-2">
                                  <input type="time" name="HoraDeSalida" class= "form-control" > 
                              </div>
                            </div>
                </div>
              <div class="box-footer">
                   @include("Includes.boton-form-create")
              </div>
         </form>
       </div>
   </div>
  </div>
 @endsection    
     