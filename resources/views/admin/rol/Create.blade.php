@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
<div class="col-md-10">
  @include('Includes.mensaje-Succes')
  @include('Includes.Error-form')
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">Crear Rol</h3>
      </div>
      <form action="{{route('rol_guardar')}}"id="form-general" class="form-horizontal" method="POST" autocomplete="off">
        @csrf
        <div class="box-body">
         @include('admin.rol.form')
        </div>
          <div class="box-footer">
          <div class="box-tools pull-left">
                        <a href="{{route('rol_index')}}" class="btn btn-block btn-warning btn-sm">
                            <i class="fa fa-fw fa-reply"></i> Regresar
                        </a>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6"></div>
            @include('includes.boton-form-create')
            
        </div>
      </form>
    </div>
</div>
</div>
@endsection