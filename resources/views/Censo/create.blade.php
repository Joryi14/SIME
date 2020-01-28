@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
       <div class="col-md-10">
       @include('Includes.Error-form')
       @include('Includes.mensaje-Error')
       <div class="box box-info">
       <div class="box-header with-border"style="padding:2%">
       <h3 class="box-title">Crear censo</h3>
              <div class="box-tools pull-right">
                            <div class="col-sm-12">
                            <a href="{{route('inicio_censo')}}" class="btn btn-block btn-info ">
                                <i class="fa fa-fw fa-reply-all"></i> Regresar
                            </a>
                            </div>
                          </div>
</div>
<form class="form-horizontal" method="POST" action="/Censo/store">
       @csrf
       <div class="box-body">
       <div class="form-group">
              <label for="Idjefefamilia" class="col-sm-2 control-label">Id de jefe de familia: </label>
              <div class="col-sm-10">
                     <div class="col-sm-9">
                            <select id='SelectC' name="IdJefeFam" style='width: 50%;'>
                            <option value='0'>Seleccionar un Jefe</option></select>
                     </div>
              </div>
       </div>
       <div class="form-group">
              <label class="col-sm-2" class="col-sm-2 control-label"> O </label>
            <div class="col-sm-3">
            <a href="{{route('jefe_create')}}" class="btn btn-block btn-primary btn-sm">
              <i class="fa fa-fw fa-plus-circle"></i> Crear jefe de familia
          </a>
        </div>
      </div>
       <div class="form-group">
                     <div class="checkbox">
                       <label class="col-sm-2 control-label">
                        Refrigerador 
                        <input type="hidden" name="Refrigerador" value="0" />
                       <input type="checkbox" class="col-sm-6" name="Refrigerador" value="1">  
                     </label>
                   </div>
       </div>
       <div class="form-group">
              <div class="checkbox">
                     <label class="col-sm-2 control-label">
                     Cocina
                     <input type="hidden" name="Cocina" value="0" />
                     <input type="checkbox" class="col-sm-6" name="Cocina" value="1">  
              </label>
              </div>
       </div>
       <div class="form-group">
              <div class="checkbox">
                     <label class="col-sm-2 control-label">
                     Colchón
                     <input type="hidden" name="Colchon" value="0" />
                     <input type="checkbox" class="col-sm-6" name="Colchon" value="1">  
              </label>
              </div>
       </div>
       <div class="form-group">
                     <div class="checkbox">
                            <label class="col-sm-2 control-label">
                            Cama
                            <input type="hidden" name="Cama" value="0" />
                            <input type="checkbox" class="col-sm-6" name="Cama" value="1">  
                     </label>
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
    $("#SelectC").select2({
      ajax: { 
        url: "{{route('Get_JefeC')}}",
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
            results:  $.map(response,function(item){
              return{
                    text: item.Cedula+', '+item.Nombre+' '+item.Apellido1+' '+item.Apellido2,
                    id:item.id
              }
            })
          };
        },
        cache: true
      }
    });
  });
  </script>
@endsection