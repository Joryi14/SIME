<!DOCTYPE html>
<html>
    <head>
    </head>
        <style>
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
        </style>
        <script type="text/php">
            if (isset($pdf))
            {
            $font = Font_Metrics::get_font("Arial", "bold");
            $pdf->page_text(765, 550, "Pagina {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0, 0, 0));
            }
            </script>
<body>
    <CENTER><h1 class="box-title">Retiro de Paquetes </h1></CENTER> <p>{{$today}}</p>
    
    <table>
         
    
            <tr >
                <th>Id de RetiroPaquetes</th>
                <th>Id de AdministradorI</th>
                <th>Nombre del chofer</th>
                <th>Primer apellido del chofer</th>
                <th>Segundo apellido del chofer</th>
                <th>Id de Voluntario</th>
                <th>Placa de Vehiculo</th>
                <th>Direccion A Entregar</th>
                <th>Suministros Gobierno </th>
                <th>Suministros Comision</th>
                <th>Id de Inventario</th>
             
            </tr>
      

            @foreach ($Retiro as $item)
              <tr>
                <td>{{$item->IdRetiroPaquetes}}</td>      
                <td>{{$item->IdAdministradorI}}</td>
                <td>{{$item->NombreChofer}}</td>  
                <td>{{$item->Apellido1C}}</td>  
                <td>{{$item->Apellido2C}}</td>  
                <td>{{$item->IdVoluntario}}</td>
                <td>{{$item->PlacaVehiculo}}</td>
                <td>{{$item->DireccionAEntregar}}</td>
                <td>{{$item->SuministrosGobierno}}</td>
                <td>{{$item->SuministrosComision}}</td>
                <td>{{$item->IdInventario}}</td>     
              </tr>
            @endforeach
    </table>
    
</body>
</html>