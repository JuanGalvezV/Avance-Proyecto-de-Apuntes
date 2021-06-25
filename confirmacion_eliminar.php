<?php
    include("../data/DBConfig.php");
    $query = "DELETE FROM contenido WHERE id_contenido = '".$_GET['id']."';";
    $resultado = mysqli_query($conn, $query);
    header("Location: contenido.php");
?>