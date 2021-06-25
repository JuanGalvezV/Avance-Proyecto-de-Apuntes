<?php
    include("../data/DBConfig.php");
    if(isset($_POST['login'])){
 
        $username = mysqli_real_escape_string($conn,$_POST['txt_uname']);
        $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);
    
        if ($username != "" && $password != ""){
    
            $sql_query = "select count(*) as countUser from usuario where correo='".$username."' and clave='".$password."'";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
    
            $count = $row['countUser'];
    
            if($count > 0){
                $_SESSION['uname'] = $username;
                header('Location: contenido.php');
            }else{
                echo "Usuario o clave incorrectos";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar Sesion</title>
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
            #contenedor_iniciar_sesion{
                background-color: rgb(43, 43, 43);
                border-style: solid;
                border-color: black;
                position: absolute;
                left: 630.5px;
                top: 151px;
                padding-left: 25px;
                padding-right: 25px;
                padding-bottom: 25px;
                align: center;
                box-shadow: 5px 5px black;
            }
            #txt_uname, #txt_pwd, #buscar{
                background-color: rgb(69, 69, 69);
            }
            #boton_inicio_sesion{
                background-color: rgb(69, 69, 69);
                color: rgb(110, 173, 245);
                font-family: 'Lucida Sans';
            }
        </style>
    </head>
    <body>
        <div id="barra_tareas">
            <nav>  
                <a href="../index.php"><button class="button_barra_tareas">Home</button></a>
                <a href="contenido/iniciar_sesion.php"><button class="button_barra_tareas" disabled="true">Iniciar Sesion</button></a>
                <b id=barra_tareas_separacion></b>
                <button class="button_barra_tareas">Buscar</button>
                <input type="text" id="buscar" ></input>
            </nav>      
        </div>
        <div id="contenedor_iniciar_sesion">
            <h1>Iniciar sesion</h1>
            <form method="POST" action="">
                <div>
                    <input type="text" id="txt_uname" name="txt_uname" placeholder="Correo"/><br></br>
                </div>
                <div>
                    <input type="password" id="txt_pwd" name="txt_pwd" placeholder="Clave secreta"/><br></br>
                </div>
                <div>
                    <input type="submit" id="boton_inicio_sesion" value="Iniciar Sesion" name="login" id="login"/>
                </div>
            </form>
        </div>
    </body>
</html>