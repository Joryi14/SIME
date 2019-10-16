@extends("theme/$theme/layout")
@section('Contenido')
   <div class="row">
      <div class="col-xs-10">
      <div class="box box-success">
      <div class="box-header with-border" style="padding:2%">
       <h3 class="box-title">Editar censo</h3>
        <div class="box-tools pull-right">
                      <div class="col-xs-12">
                      <a href="{{route('inicio_censo')}}" class="btn btn-block btn-info ">
                          <i class="fa fa-fw fa-reply-all"></i> Regresar
                      </a>
                      </div>
          </div>
      </div>
      <form class="form-horizontal" method="POST" action="/Censo/{{$censo->IdCenso}}">
        @method('PUT')
        @csrf
             <div class="box-body">
                     <input type="hidden" name="IdJefeFam" value=" {{$censo->IdJefeFam}}" class= "form-control" readonly>
             <div class="form-group">
                    <label for="Idjefefamilia" class="col-xs-2 control-label">Cédula: </label>
                    <div class="col-xs-8" style="margin-top: 3%;margin-left:8%">{{$censo->jefeFamilia->Cedula}}
                    </div>
             </div>
             <div class="form-group">
                           <div class="checkbox">
                             <label class="col-xs-2 control-label" style="margin-left:4%">
                              Refrigerador 
                              <input type="hidden" name="Refrigerador" value="0" />
                             <input type="checkbox" class="col-xs-6" style="margin-left:8%" name="Refrigerador" value="1">  
                           </label>
                         </div>
             </div>
             <div class="form-group">
                    <div class="checkbox">
                           <label class="col-xs-2 control-label" style="margin-left:4%">
                           Cocina
                           <input type="hidden" name="Cocina" value="0" />
                           <input type="checkbox" class="col-xs-6" style="margin-left:8%" name="Cocina" value="1">  
                    </label>
                    </div>
             </div>
             <div class="form-group">
                    <div class="checkbox">
                           <label class="col-xs-2 control-label" style="margin-left:4%">
                           Colchón
                           <input type="hidden" name="Colchon" value="0" />
                           <input type="checkbox" class="col-xs-6" style="margin-left:8%" name="Colchon" value="1">  
                    </label>
                    </div>
             </div>
             <div class="form-group">
                           <div class="checkbox">
                                  <label class="col-xs-2 control-label" style="margin-left:4%">
                                   Cama
                                  <input type="hidden" name="Cama" value="0" />
                                  <input type="checkbox" class="col-xs-6" style="margin-left:8%" name="Cama" value="1">  
                           </label>
                           </div>
             </div>
      </div>
             <!-- /.box-body -->
             <div class="box-footer">
                @include("Includes.boton-editar")
             </div>
             <!-- /.box-footer -->
      </form>
      </div>
      </div>  
      </div>  
@endsection