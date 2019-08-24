
<html>
  <head>
    <title>Censo</title>
  </head>
  <body>
    <form action="CensoController.php" method="post">
    <select name="jefedefamilia">
     
     <?php
    $sql= "SELECT concat_ws(' ', nombre, Apellido1, Apellido2) as NombreCompleto FROM jefedefamilia";
    $rec= mysql_query($sql);
    while($row = mysql_fetch_array($rec)){
        
        echo "<option>";
        echo $row['jefedefamilia'];
        echo "<option>"; 
 
    }  
     ?>

     <label><input type="checkbox" name="Refrigerador" value="1"> Refrigerador </label><br>
     <label><input type="checkbox" name="Cocina" value="1"> Cocina </label><br>
     <label><input type="checkbox" name="Colchon" value="1"> Colchon </label><br>
     <label><input type="checkbox" name="Cama" value="1"> Cama </label><br>
     <input type="submit" value="Enviar">
    </form>
  </body>
</html>
