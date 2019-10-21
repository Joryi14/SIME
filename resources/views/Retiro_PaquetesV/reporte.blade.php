<!DOCTYPE html>
<html>
    <head>
        
        <style>
             @page {
                margin: 100px 25px;
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
            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                 
                 /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

        </style>
</head>
<body>

        <header>
            <h1 class="box-title">Retiro de Paquetes </h1> 
         <img src="/var/www/SIME/public/Logo/cne.jpg"/> 
            </header>

           <footer>
                <p>{{$today}}</p>
           </footer>    
           <main>
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
           </main>
</body>
</html>