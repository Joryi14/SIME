@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
       <div class="col-md-10">
       @include('Includes.Error-form')
       @include('Includes.mensaje-Error')
       <div class="box box-info">
       <div class="box-header with-border">
              <div class="box-tools pull-right">
                            <div class="col-sm-12">
                            <a href="{{route('inicio_censo')}}" class="btn btn-block btn-info ">
                                <i class="fa fa-fw fa-reply-all"></i> Regresar
                            </a>
                            </div>
                          </div>
       <h3 class="box-title">Crear Censo</h3>
</div>
<form class="form-horizontal" method="POST" action="/Censo/store">
       @csrf
       <div class="box-body">
       <div class="form-group">
              <label for="Idjefefamilia" class="col-sm-2 control-label">Id de jefe de familia: </label>
              <div class="col-sm-10">
                     <input type="text" name="IdJefeFam" class= "form-control" >
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
                     Colchon
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
