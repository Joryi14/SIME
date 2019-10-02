@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        <div class="box box-success">
          <div class="box-header with-border">
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_personasAlbergue')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
            <h3 class="box-title">Editar PersonasAlbergue</h3>
          </div>
          <form class="form-horizontal" method="POST" action="/PersonasAlbergue/{{$persona->idregistroA}}"readonly="readonly">
            @method('PUT')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="idAlbergue" class="col-sm-2 control-label">idAlbergue: </label>
                <div class="col-sm-8">
                    <input type="text" name="idAlbergue" class= "form-control" value="{{$persona->idAlbergue}}"readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label for="idJefe" class="col-sm-2 control-label">idJefe: </label>
    
                <div class="col-sm-8">
                    <input type="text" name="idJefe" class= "form-control" value="{{$persona->idJefe}}" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                  <label for="LugarDeProcedencia" class="col-sm-2 control-label">LugarDeProcedencia:  </label>
      
                  <div class="col-sm-8">
                      <input type="text" name="LugarDeProcedencia" class= "form-control" value="{{$persona->LugarDeProcedencia}}" readonly="readonly"> 
                  </div>
                </div>
                <div class="form-group">
                    <label for="FechaDeIngreso" class="col-sm-2 control-label">FechaDeIngreso: </label>
        
                    <div class="col-sm-8">
                        <input type="text" name="FechaDeIngreso" class= "form-control" value= "{{$persona->FechaDeIngreso}}"  readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="HoraDeIngreso" class="col-sm-2 control-label">HoraDeIngreso: </label>
          
                      <div class="col-sm-8">
                          <input type="text" name="HoraDeIngreso" class= "form-control" value="{{$persona->HoraDeIngreso}}" readonly="readonly">
                      </div>
                    </div>
                   
                      <div class="form-group">
                          <label for="FechaDeSalida" class="col-sm-2 control-label">FechaDeSalida: </label>
              
                          <div class="col-sm-8">
                              <input type="text" name="FechaDeSalida" class= "form-control" value="{{$persona->FechaDeSalida}}" >
                          </div>
                        </div>
                       
                          <div class="form-group">
                              <label for="HoraDeSalida" class="col-sm-2 control-label">HoraDeSalida: </label>
                  
                              <div class="col-sm-8">
                                  <input type="text" name="HoraDeSalida" class= "form-control" value="{{$persona->HoraDeSalida}}" > 
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
    @section('Script')
    <script>
          $(document).ready(function() { 
            $('.select2').select2({tags: true});
                }); </script>
            @endsection
@endsection