<?php
    include("../data/DBConfig.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Actualizar Contenido</title>
        <style>
            html{
                background-image: url("../css/imagenes/fondo_web.jpg");
                background-size: cover;
                font-family: 'Lucida Sans';
                color: white;
            }
            .button_barra_tareas{
                color: rgb(110, 173, 245);
                padding: 10px;
                background-color: rgb(43, 43, 43);
                font-family: 'Lucida Sans';
                text-align: center;
                border: black;
            }
            .button_barra_tareas:hover{
                background-color:rgb(70, 70, 70);
            }
            #barra_tareas_separacion{
                padding-left: 900px;
            }
            #barra_tareas{
                background-color: rgb(43, 43, 43);
                padding-top: 0px;
                padding-bottom: 0px;
            }
            #boton_enviar{
                background-color: rgb(43, 43, 43);
                color: rgb(110, 173, 245);
            }
            #buscar{
                background-color:rgb(70, 70, 70);
                border-color: rgb(2, 0, 36);
                color: white;
                padding: 10px 10px 10px;
                
            }
            #contenedor_actual{
                position: absolute;
                background-color: rgb(63, 63, 63);
                border: 2px solid black;
                box-shadow: 5px 5px black;
                padding: 10px 10px 10px;
                top: 60px;
                left: 553px;
            }
            #contenedor_cambios{
                position: absolute;
                background-color: rgb(63, 63, 63);
                border: 2px solid black;
                box-shadow: 5px 5px black;
                padding: 10px 10px 10px;
                top: 300px;
                left: 482px;
            }
            .guardar_volver{
                background-color: rgb(43, 43, 43);
                color: rgb(110, 173, 245);
            }
            #upd_nombre, #upd_descripcion{
                background-color:rgb(70, 70, 70);
                border-color: rgb(2, 0, 36);
                color: white;
            }

        </style>
    </head>
    <body>
        <div id="barra_tareas">
            <nav>  
                <button type="button" class="button_barra_tareas" onclick="window.location = './../index.php'">Cerrar Sesion</button>
                <button type="button" class="button_barra_tareas" onclick="window.location = 'contenido.php'">Ver contenidos</button>
                <b id=barra_tareas_separacion></b>
                <button class="button_barra_tareas">Buscar</button>
                <input type="text" id="buscar" ></input>
            </nav>      
        </div>
        <div id="contenedor_actual">
            <h1>Datos actuales</h1>
            
            <?php 
                $query = "SELECT * FROM contenido WHERE id_contenido = ".$_GET['id']."";
                $resultado = mysqli_query($conn, $query);
                if(!empty($resultado) && !empty($_GET['id']))
                {
                    $line = $resultado->fetch_array(MYSQLI_ASSOC);
                }
            ?>  
            <p>Nombre del contenido: <?php echo $line['nombre'];?></p>
            <p>Descripcion del contenido: <?php echo $line['descripcion'];?></p>
            <button type="button" class="guardar_volver"><a href="contenido.php">Volver sin actualizar</a></button>
        </div>
        <div id="contenedor_cambios">
            <h1>Aqui abajo coloque sus cambios</h1>
            <form method="post">
                <label for="upd_name">Nombre:</label>
                <input type="text" id="upd_nombre" name="upd_name" placeholder="Nuevo nombre de contenido"/><br></br>
                <label for="upd_descripcion">Descripcion:</label>
                <input type="text" id="upd_descripcion" name="upd_descripcion" placeholder="Nueva descripcion"/><br></br>
                <input type="submit" class="guardar_volver" value="Guardar cambios"/>
            </form>

            <?php

            if(!empty($_POST['upd_name']) || !empty($_POST['upd_descripcion']))
            {
                $query2 = "UPDATE contenido SET nombre ='".$_POST['upd_name']."', descripcion ='".$_POST['upd_descripcion']."', fecha_actualizacion = now() WHERE id_contenido = '".$_GET['id']."';";
                $resultado2 = mysqli_query($conn, $query2);

                if($resultado2>0)
                {
                    echo "Contenido actualizado";
                    header("Location: contenido.php");
                }
            }
            ?>
        </div>
    </body>    
</html>