<!DOCTYPE html>
<html>
        <head>
        
                <style>
                     @page {
                        margin: 180px 50px;
                    }
                    table {
                        border: none;
                        width: 100%;
                        border-collapse: collapse;
                    }
        
                    td,th { 
                        padding: 2px 1px;
                        text-align: center;
                        border: 1px solid #999;
                    }
        
                    tr:nth-child(1) {
                        background: #dedede;
                    }
                    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 165px; background-color: orange; text-align: center; }
                    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 80px; background-color: orange; }
                     #footer .page:after { content: counter(page, upper-roman); }
        
                </style>
        </head>
        
        <body>
        
                <div id = "header">
                    
                    <h4 class="box-title">Comisión Nacional de Prevención de Riesgos Y Atención de Emergencia </h4>
                            <h5 class="box-title"> Comité Comunal de Emergencia de: Nosara</h5>     
                        <h5 class="box-title"> Reporte de emergencias</h5>
                        <p>{{$today}}</p>
                        <img style="position: absolute; left: 10px; top: 30px; height: 70px;" src="{{asset("assets/images/logos/1.png")}}" alt="Logo" height="75px;">
                        <img style="position: absolute; right: 78px; top: 30px; height: 70px;"  src="{{asset("assets/images/logos/3.png")}}" alt="Logo" height="75px;">
                </div>
        
                   <div id="footer">
                       <center> <p>{{$today}}</p><center>
                   </div>  
        
        <main>
   <table>
       <tr>
    
        <th>Número de emergencia</th>
        <th>Nombre de la emergencia</th>
        <th>Categoría</th>
        <th>Tipo de emergencia</th>
        <th>Descripción</th>
        <th>Longitud</th>
        <th>Latitud</th>
        <th>Estado</th>
      
      </tr>
    </thead>
      @foreach ($Emergencia as $item)
        <tr>
        <td>{{$item->idEmergencias}}</td>    
        <td>{{$item->NombreEmergencias}}</td>
        <td>{{$item->Categoria}}</td>
        <td>{{$item->TipoDeEmergencia}}</td>
        <td>{{$item->Descripcion}}</td>
        <td>{{$item->Longitud}}</td>
        <td>{{$item->Latitud}}</td>
        <td>
          @if($item->Estado == 'Activa')
            <a style="color:green;">{{$item->Estado}}</a>
          @else
          <a style="color:red;">{{$item->Estado}}</a>
          @endif</td>
                    </tr>
            @endforeach
    </table>
</main>
</body>
</html>