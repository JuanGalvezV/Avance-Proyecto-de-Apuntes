<?php
    include("../data/DBConfig.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contenido de Apuntes</title>
        <style>
          html{
            background-image: url("../css/imagenes/fondo_web.jpg");
            background-size: cover;
            font-family: 'Lucida Sans';
            color: white;
          }
          #barra_tareas_separacion{
            padding-left: 900px;
          }
          #barra_tareas{
            background-color: rgb(43, 43, 43);
            padding-top: 0px;
            padding-bottom: 0px;
          }
          .button_barra_tareas{
            color: rgb(110, 173, 245);
            padding: 10px;
            background-color: rgb(43, 43, 43);
            font-family: 'Lucida Sans';
            text-align: center;
            border: black;
          }
          .button_el_ac{
            background-color: rgb(43, 43, 43);
            color: rgb(110, 173, 245);
          }
          .button_barra_tareas:hover{
            background-color:rgb(70, 70, 70);
          }
          table{
            background-color: rgb(63, 63, 63);
            position: absolute;
            left: 316px;
            top: 100px;
            border: 1px solid black;
            box-shadow: 5px 5px black;
          }
          th, td, tr{
            border: 1px solid black;
            padding: 10px 10px 10px;
          }
          #buscar{
            background-color:rgb(70, 70, 70);
            border-color: rgb(2, 0, 36);
            color: white;
            font-family: 'Lucida Sans';
          }
        </style>
    </head>
    <body>
        <div>
          <div id="barra_tareas">
            <nav>  
                <button type="button" class="button_barra_tareas" onclick="window.location = './../index.php'">Cerrar Sesion</button>
                <button type="button" class="button_barra_tareas" onclick="window.location = 'crear_contenido.php'">Crear contenido</button>
                <b id=barra_tareas_separacion></b>
                <button class="button_barra_tareas">Buscar</button>
                <input type="text" id="buscar" ></input>
            </nav>      
          </div>
            <?php
              $query = 'SELECT * FROM contenido';
              $result = mysqli_query($conn, $query) or die("Algo salio mal: ".mysqli_error($conn));
              if(!empty($result))
              {
                echo "<table>\n";
                echo "\t<tr>\n";
                echo "\t<th>ID</th>\n";
                echo "\t<th>Nombre Contenido</th>\n";
                echo "\t<th>Descripcion</th>\n";
                echo "\t<th>Fecha creacion</th>\n";
                echo "\t<th>Fecha actualizacion</th>\n";
                echo "\t<th></th>\n";
                echo "\t<tr>\n";
                while($line = $result->fetch_array(MYSQLI_ASSOC))
                {
                  echo "\t<tr>\n";
                  foreach ($line as $col_value)
                  {
                    echo "\t\t<td>$col_value</td>\n";
                  }
                  ?>
                  <td>
                    <a href="actualizar_contenido.php?id=<?php echo $line['id_contenido'];?>"><button type="button" class="button_el_ac">Actualizar</button></a><br></br>
                    <a href="eliminar_contenido.php?id=<?php echo $line['id_contenido'];?>"><button type="button" class="button_el_ac">Eliminar</button></a>
                  </td>
                  <?php
                  echo "\t</tr>\n";
                }
                echo "</table>\n";
              }
              else
              {
                echo "No hay contenidos";
              }
            ?>
          </div>
    </body>
</html>