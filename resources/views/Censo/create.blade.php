@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/Select2/css/select2.min.css")}}">
@endsection
@section('Contenido')
@include('Includes.Error-form')
  <div class="panel panel-warning">
    <div class="panel-heading">
       <h4 class="content-row-title">Crear censo
                            <a href="{{route('inicio_censo')}}" class="btn  btn-info pull-right">
                                <i class="fa fa-fw fa-reply-all"></i> Regresar
                            </a></h4>
</div>
<form class="form-horizontal" method="POST" action="/Censo/store">
       @csrf
       <div class="panel-body">
       <div class="form-group">
       <div class="row">
              <label for="Idjefefamilia" class="col-sm-3 control-label">Id de jefe de familia: </label>
                     <div class="col-sm-6">
                            <select id='SelectC' name="IdJefeFam" style='width: 50%;'>
                            <option value='0'>Seleccionar un Jefe</option></select>
                     </div>
       </div>
       <div class="row">
         <label class="col-sm-3 control-label">O</label>
         <div class="col-sm-6">
           <div class="form-group">
             <a href="{{route('jefe_create')}}" class="btn btn-primary">
               <i class="fa fa-fw fa-plus-circle"></i> Crear jefe de familia
             </a>
           </div>
         </div>
       </div>
       <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">
            Refrigerador:
          </label>
        <div class="col-sm-6">
              <div class="checkbox">
                  <input type="hidden" name="Refrigerador" value="0" />
                  <input type="checkbox" name="Refrigerador" value="1">
              </div>
        </div>
    </div>
  </div>
       <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">
            Cocina:
          </label>
        <div class="col-sm-6">
              <div class="checkbox">
                  <input type="hidden" name="Cocina" value="0" />
                  <input type="checkbox" name="Cocina" value="1">
              </div>
        </div>
    </div>
  </div>
       <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">
            Colchón:
          </label>
        <div class="col-sm-6">
              <div class="checkbox">
                  <input type="hidden" name="Colchon" value="0" />
                  <input type="checkbox" name="Colchon" value="1">
              </div>
        </div>
    </div>
  </div>
       <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">
            Cama:
          </label>
        <div class="col-sm-6">
              <div class="checkbox">
                  <input type="hidden" name="Cama" value="0" />
                  <input type="checkbox" name="Cama" value="1">
              </div>
        </div>
    </div>
  </div>
</div>
       <div class="panel-footer">
       @include("Includes.boton-form-create")
       </div>

  </form>
</div>
@endsection
@section('Script')
<script src="{{asset("assets/$theme/Select2/js/select2.full.min.js")}}"></script>

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
