@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
      @include('Includes.Error-form')
        <div class="box box-info">
          <div class="box-header with-border"style="padding:2%">
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_emergencia')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
            <h3 class="box-title">Crear emergencia</h3>
          </div>
<form class= "form-horizontal" method="POST" action="/Emergencia/store">
  @csrf
  <div class="box-body">
      <div class="form-group">
        <label for="NombreEmergencias" class="col-sm-2 control-label">Nombre de la emergencia: </label>
        <div class="col-sm-8">
            <input type="text" name="NombreEmergencias" class= "form-control" >
        </div>
      </div>

      <div class="form-group">
        <label for="Categoria" class="col-sm-2 control-label">Categoría: </label>
       
        <div class="btn-group-horizontal">
           
      <div class="btn-group-horizontal" style="margin-top:2%">
        <input type="radio" name="Categoria" value="Grave"><span style="padding:1%; color:red">Grave</span>  
                      
        <input type="radio" name="Categoria" value="Moderada"><span style="padding:1%; color:orange">Moderada </span>
                      
        <input type="radio" name="Categoria" value="Leve"><span style="padding:1%; color:green">Leve </span>
      </div>
      </div>
      </div>
        <div class="form-group">
            <label for="TipoDeEmergencia" class="col-sm-2 control-label">Tipo de emergencia: </label>
  
            <div class="col-sm-8">
                <input type="text" name="TipoDeEmergencia" class= "form-control" >
            </div>
          </div>


          <div class="form-group">
              <label for="Descripcion" class="col-sm-2 control-label">Descripción: </label>
    
              <div class="col-sm-8">
                  <input type="text" name="Descripcion" class= "form-control" >
              </div>
            </div>
  
            <div class="form-group">
                <label for="Longitud" class="col-sm-2 control-label">Longitud: </label>
      
                <div class="col-sm-8">
                    <input type="number" name="Longitud" class= "form-control" >
                </div>
              </div>

              <div class="form-group">
                  <label for="Latitudd" class="col-sm-2 control-label">Latitud: </label>
        
                  <div class="col-sm-8">
                      <input type="number" name="Latitud" class= "form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="Estado">Estado</label>
                  <div class="col-sm-8">
                  <select class="form-control select2"  data-minimum-results-for-search="Infinity" name="Estado" value=""  style="width: 50%;">
                                  <option value="Activa">Activa</option>
                                  <option value="Inactiva">Inactiva</option>
                  </select>
                  </div>
                </div>
                </div>
              </div>
              <div class="box-footer">
                  @include("Includes.boton-form-create")
              </div>
        </form>
        </div>
      </div>
      @section('Script')
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
<script>
      $(function() { 
        $('.select2').select2();
        });  
</script>
        @endsection
@endsection
