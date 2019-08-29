<div class="form-group">
    <label for="Nombre de Rol" class="col-sm-2 control-label requerido">Nombre de Rol</label>

    <div class="col-sm-10">
      <input type="text" name="NombreRol" class="form-control" id="NombreRol" value="{{old('NombreRol',$roles->NombreRol ?? '')}}">
    </div>
  </div>