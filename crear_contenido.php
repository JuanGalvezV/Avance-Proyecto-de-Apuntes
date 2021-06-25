<?php
    include("../data/DBConfig.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Crear Contenido</title>
        <style>
            html{
                background-image: url("../css/imagenes/fondo_web.jpg");
                background-size: cover;
                font-family: 'Lucida Sans';
                color: white;
            }
            #contenedor_creador{
                position: absolute;
                background-color: rgb(63, 63, 63);
                border: 2px solid black;
                left: 626px;
                top: 100px;
                padding: 10px 10px 10px;
                box-shadow: 5px 5px black;
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
            #nombre, #descripcion{
                background-color: rgb(43, 43, 43);
            }
            #buscar{
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
        <div id="contenedor_creador">
            <form method="POST" action="">
                <label for="nombre">Titulo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese titulo del contenido"><br></br>
                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion"><br></br>
                <input type="submit" id="boton_enviar" value="Enviar">
            </form>
        </div>
        <?php
            if(isset($_POST['nombre']) && isset($_POST['descripcion']))
            {
                if($_POST['nombre']!="" && $_POST['descripcion']!="")
                {
                    $query = "INSERT INTO contenido(nombre, descripcion, fecha_creacion, fecha_actualizacion)VALUES";
                    $query .= "('".$_POST['nombre']."','".$_POST['descripcion']."',now(),now())";
                    $result = mysqli_query($conn, $query);
                
                    if($result>0){
                        echo "Contenido creado";
                        header("Location: contenido.php");
                    }
                    else
                    {
                        echo "OH OH";
                    }
                }
            }
        ?>
    </body>
</html>