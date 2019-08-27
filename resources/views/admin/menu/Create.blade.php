@extends("theme/$theme/layout")
@section("Script")
<script>
    $(document).ready(function () {
     $('#icono').on('blur', function () {
         $('#mostrar-icono').removeClass().addClass('fa fa-fw ' + $(this).val());
     });
    });
 </script>
@endsection
@section('Contenido')
<div class="row">
<div class="col-md-10">
  @include('Includes.mensaje-Succes')
  @include('Includes.Error-form')
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">Crear Menu</h3>
      </div>
      <form action="{{route('menu_guardar')}}"id="form-general" class="form-horizontal" method="POST" autocomplete="off">
        @csrf
        <div class="box-body">
         @include('admin.menu.form')
        </div>
          <div class="box-footer">
            <div class="col-lg-3"></div>
            <div class="col-lg-6"></div>
            @include('includes.boton-form-create')
        </div>
      </form>
    </div>
</div>
</div>
@endsection