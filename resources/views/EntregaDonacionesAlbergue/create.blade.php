@extends("theme/$theme/layout")
@section('Contenido')

   <div class="row">
      <div class="col-md-10">
     @include('Includes.Error-form')
     @include('Includes.mensaje-Error')
    <div class="box box-info">
      <div class="box-header with-border" style="padding:2%">
          <h3 class="box-title">Crear entrega de donaciones en albergue</h3>
        <div class="box-tools pull-right">
                      <div class="col-sm-12">
                      <a href="{{route('inicio_EntregaDonacionesA')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
          </div>
      </div>
      <form class="form-horizontal" method="POST" action="/EntregaDonacionesAlbergue/store" files="true" >
        @csrf
             <div class="box-body">

                <input type="hidden" name="IdUsuarioRol" value="{{Auth::user()->id}}" class= "form-control" >
             <div class="form-group">
                    <label for="IdJefeFa" class="col-sm-2 control-label">Id del jefe de familia: </label>
                    <div class="col-sm-9">
                        <select id='SelectJ' name="IdJefeFa" style='width: 25%;'>
                            <option value='0'>Seleccionar un jefe</option></select>
                {{-- <input type="text" name="IdJefeFa" class= "form-control" > --}}
                    </div>
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
             url: "{{route('Get_IdJefeFa')}}",
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