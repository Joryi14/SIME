<div class="form-group">
    <label for="Nombre" class="col-sm-2 control-label requerido">Nombre</label>

    <div class="col-sm-10">
      <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre')}}">
    </div>
  </div>
  <div class="form-group">
    <label for="url" class="col-sm-2 control-label requerido">Url</label>
    <div class="col-sm-10">
      <input type="text" name="url" class="form-control" id="url" value="{{old('url')}}">
    </div>
  </div>
  <div class="form-group">
    <label for="icono" class="col-sm-2 control-label">Icono</label>
    <div class="col-sm-9">
      <input type="text" name="icono"class="form-control" id="icono" value="{{old('icono')}}" >
    </div>
    <div class="col-sm-1">
        <span id="mostrar-icono" class="fa fa-fw {{old("icono")}}"></span>
      </div>
  </div>