@extends("theme/$theme/layout")
@section('Contenido')

   <div class="row">
      <div class="col-md-10">
     @include('Includes.Error-form')
     @include('Includes.mensaje-Error')
    <div class="box box-info">
      <div class="box-header with-border"style="padding:2%">
        <div class="box-tools pull-right">
                      <div class="col-sm-12">
                      <a href="{{route('inicio_EntregaDonaciones')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
          </div>
      <h3 class="box-title">Crear entrega de donaciones</h3>
      </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonaciones/store" enctype="multipart/form-data">
        @csrf
             <div class="box-body">
            <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" class= "form-control" >
            <div class="form-group">
                <label for="IdJefe" class="col-sm-2 control-label"> Jefe de familia:</label>
                <div class="col-sm-9">
                    <select id='SelectJ' name="IdJefe" style='width: 25%;'>
                    <option value='0'>Seleccionar un Jefe</option></select>
                </div>
              </div>
             <div class="form-group">
                    <label for="IdRetiroPaquetes" class="col-sm-2 control-label">Id del Retiro de Paquetes: </label>
                    <div class="col-sm-10">
                        <input type="text" name="IdRetiroPaquetes"  class= "form-control" >
                    </div>
             </div>
             <div class="form-group">
                <label for="Foto" class="col-sm-2 control-label">Foto: </label>
                <button type="button" class="btn fa fa-plus bg-yellow">
                    <input type="file" name="Foto" accept="image/*"  >  
                  </button>
              </div>

      </div>
       <!-- /.box-body -->
       <div class="box-footer">
            @include("Includes.boton-form-create")
            </div>
            <!-- /.box-footer -->
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
             url: "{{route('Get_JefeE')}}",
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