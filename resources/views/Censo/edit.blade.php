@extends("theme/$theme/layout")
@section('Contenido')
@include('Includes.Error-form')
@include('Includes.mensaje-Error')
<div class="panel panel-warning">
  <div class="panel-heading">
     <h4 class="content-row-title">Editar censo
       <a href="{{route('inicio_censo')}}" class="btn btn-info pull-right">
           <i class="fa fa-fw fa-reply-all"></i> Regresar
       </a>
     </h4>
     </div>
      <form class="form-horizontal" method="POST" action="/Censo/{{$censo->IdCenso}}">
        @method('PUT')
        @csrf
             <div class="panel-body">
            <input type="hidden" name="IdJefeFam" value=" {{$censo->IdJefeFam}}" class= "form-control" readonly>

            <div class="row">
             <div class="form-group">
                    <label for="Idjefefamilia" class="col-sm-3 control-label">Cédula: </label>
                    <span>{{$censo->jefeFamilia->Cedula}}</span>
                    </div>
             </div>
             <div class="row">
             <div class="form-group">
                             <label class="col-sm-3 control-label">
                              Refrigerador</label>
                              <div class="checkbox">
                              <input type="hidden" name="Refrigerador" value="0" />
                             <input type="checkbox" class="col-sm-6" name="Refrigerador" value="1"@if($censo->Refrigerador == 1) checked="CHECKED" @endif>
                         </div>
             </div>
             </div>
             <div class="row">
             <div class="form-group">
                           <label class="col-sm-3 control-label">
                           Cocina</label>
                             <div class="checkbox">
                           <input type="hidden" name="Cocina" value="0" />
                           <input type="checkbox" class="col-sm-6" name="Cocina" value="1" @if($censo->Cocina == 1) checked="CHECKED" @endif>
                    </div>
             </div>
             </div>
             <div class="row">
             <div class="form-group">
                           <label class="col-sm-3 control-label" >
                           Colchón</label>
                           <div class="checkbox">
                           <input type="hidden" name="Colchon" value="0" />
                           <input type="checkbox" class="col-sm-6" name="Colchon" value="1" @if($censo->Colchon == 1) checked="CHECKED" @endif>
                    </div>
             </div>
             </div>
             <div class="row">
             <div class="form-group">
                  <label class="col-sm-3 control-label">
                   Cama</label>
                   <div class="checkbox">
                  <input type="hidden" name="Cama" value="0" />
                  <input type="checkbox" class="col-sm-6" name="Cama" value="1"@if($censo->Cama == 1) checked="CHECKED" @endif>
                  </div>
             </div>
             </div>
      </div>
             <div class="panel-footer">
                @include("Includes.boton-editar")
             </div>
      </form>
      </div>
@endsection
