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
                    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
                    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 80px; background-color: orange; }
                     #footer .page:after { content: counter(page, upper-roman); }
        
                </style>
        </head>
        
        <body>
        
                <div id = "header">
                    
                    <h4 class="box-title">Comisión Nacional de Prevención de Riesgos Y Atención de Emergencia </h4>
                            <h4 class="box-title"> Comité Comunal de Emergencia de: Nosara</h4>     
                        <h5 class="box-title"> Reporte de inventario</h5>
                        <img style="position: absolute; left: 10px; top: 30px; height: 70px;" src="{{asset("assets/images/1.png")}}" alt="Logo" height="75px;">
                        <img style="position: absolute; right: 78px; top: 30px; height: 70px;"  src="{{asset("assets/images/3.png")}}" alt="Logo" height="75px;">
                </div>
        
                   <div id="footer">
                       <center> <p>{{$today}}</p><center>
                   </div>  
        
        <main>
   <table>
                    <tr>
                    <th>IdInventario</th>
                    <th>idEmergencias</th>
                    <th>Suministros</th>
                    <th>Colchonetas</th>
                    <th>Cobijas</th>
                    <th>Ropa</th>
                  </tr>
                </thead>
                  @foreach ($inventario as $item)
                    <tr>
                    <td>{{$item->idInventario}}</td> 
                    <td>{{$item->idEmergencias}}</td>    
                    <td>{{$item->Suministros}}</td>
                    <td>{{$item->Colchonetas}}</td>
                    <td>{{$item->Cobijas}}</td>
                    <td>{{$item->Ropa}}</td>
       
                    </tr>
            @endforeach
    </table>
</main>
</body>
</html>