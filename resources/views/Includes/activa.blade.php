@if (session("nota2"))
<div class="alert alert-success alert-dismissible" data-auto-dismiss ="7000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="glyphicon glyphicon-arrow-up"></i> ¡Atencion!</h4>
    <ul>
            <li>{{session("nota2")}}</li>
    </ul>
    </div>
@endif