@if (session("mensaje"))
<div class="alert alert-danger alert-dismissible" data-auto-dismiss ="5000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-ban"></i> Error en el Formulario</h4>
    <ul>
            <li>{{session("mensaje")}}</li>
    </ul>
    </div>
@endif