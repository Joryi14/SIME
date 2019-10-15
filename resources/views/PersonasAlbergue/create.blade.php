@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-md-10">
        @include('Includes.Error-form')
        @include('Includes.mensaje-Error')
        <div class="box box-info">
          <div class="box-header with-border"  style="padding:2%">
              <h3 class="box-title">Crear persona en albergue</h3>
              <div class="box-tools pull-right">
                  <div class="col-sm-12">
                  <a href="{{route('inicio_personasAlbergue')}}" class="btn btn-block btn-info ">
                      <i class="fa fa-fw fa-reply-all"></i> Regresar
                  </a>
                  </div>
                </div>
          </div>
          <form class="form-horizontal" method="POST" action="/PersonasAlbergue/store">

            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="idAlbergue" class="col-sm-2 control-label">Id del albergue: </label>
                <div class="col-sm-8">
                    <input type="text" name="idAlbergue" class= "form-control" >
                </div>
              </div>
            
              <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" class= "form-control" >
              <div class="form-group">
                <label for="idJefe" class="col-sm-2 control-label">Id del jefe de familia: </label>
                <div class="col-sm-9">
                    <select id='SelectJ' name="idJefe" style='width: 25%;'>
                        <option value='0'>Seleccionar un Jefe</option></select>
                    {{-- <input type="text" name="idJefe" class= "form-control" > --}}
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2" class="col-sm-2 control-label"> O </label>
                <div class="col-sm-8">
                <a href="{{route('jefe_create')}}" class="btn btn-block btn-primary btn-sm">
                  <i class="fa fa-fw fa-plus-circle"></i> Crear jefe de familia
              </a>
            </div>
          </div>
          
              <div class="form-group">
                  <label for="LugarDeProcedencia" class="col-sm-2 control-label">Lugar de procedencia:  </label>
      
                  <div class="col-sm-8">
                      <input type="text" name="LugarDeProcedencia" class= "form-control" > 
                  </div>
                </div>


                <div class="form-group">
                    <label for="FechaDeIngreso" class="col-sm-2 control-label">Fecha de ingreso: </label>
        
                    <div class="col-sm-3">
                        <input type="date" name="FechaDeIngreso" class= "form-control" >
                    </div>
                  </div>


                  <div class="form-group">
                      <label for="HoraDeIngreso" class="col-sm-2 control-label">Hora de ingreso: </label>
          
                      <div class="col-sm-2">
                          <input type="time" name="HoraDeIngreso" class= "form-control">
                      </div>
                    </div>
                   
                      <div class="form-group">
                          <label for="FechaDeSalida" class="col-sm-2 control-label">Fecha de salida: </label>
              
                          <div class="col-sm-3">
                              <input type="date" name="FechaDeSalida" class= "form-control" >
                          </div>
                        </div>
                       
                          <div class="form-group">
                              <label for="HoraDeSalida" class="col-sm-2 control-label">Hora de salida: </label>
                  
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
 @section('Script')
 <!-- Script -->
 <script type="text/javascript">
   // CSRF Token
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
     $("#SelectJ").select2({
       ajax: { 
         url: "{{route('Get_IdJF')}}",
         type: "post",
         dataType: 'json',
         delay: 250,
         data: function (params) {
           return {
             _token: CSRF_TOKEN,
             search: params.term // search term
           };
         },
         processResults: function (response) {
           return {
             results: response
           };
         },
         cache: true
       }
     });
   });
   </script>
 @endsection   