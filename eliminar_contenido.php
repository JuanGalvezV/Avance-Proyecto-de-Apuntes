<?php
    include("../data/DBConfig.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar Contenido</title>
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
            #contenedor_eliminar{
                position: absolute;
                background-color: rgb(63, 63, 63);
                border: 2px solid black;
                box-shadow: 5px 5px black;
                padding: 10px 10px 10px;
                left: 530px;
                top: 60px;
            }
            #eliminar{
                background-color: rgb(43, 43, 43);
                color: rgb(110, 173, 245);
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
        <div id="contenedor_eliminar">
            <h1>Datos actuales</h1>
            
            <?php 
                $query = "SELECT * FROM contenido WHERE id_contenido = ".$_GET['id']."";
                $resultado = mysqli_query($conn, $query);
                if(!empty($resultado) && !empty($_GET['id']))
                {
                    $line = $resultado->fetch_array(MYSQLI_ASSOC);
                }
            ?>  
            <p>Esta seguro que desea eliminar el contenido <?php echo $line['nombre'];?>?</p>
            <button type="button" id="eliminar"><a href="confirmacion_eliminar.php?id=<?php echo $_GET['id'];?>">Eliminar</a></button>
        </div>       
    </body>    
</html>