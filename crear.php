<?php 

include('db-config.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // var_dump($_POST);
    $title = $_POST['titulo'];
    $description = $_POST['descripcion'];
    $creado_en = date('Y-m-d H:i:s');
    echo $title . " " . $description;

    $query = "INSERT INTO task(titulo, descripcion, creado_en) VALUES ('$title', '$description', '$creado_en')";
    $resultado = mysqli_query($db, $query);

    if(!$resultado){
        die("Query failed");
        
    }

    //sesiones para desplegar mensaje de confirmacion
    $_SESSION['mensaje'] = 'TAREA REGISTRADA CORRECTAMENTE';
    $_SESSION['mensaje_type'] = 'success';

    header("Location: index.php");
   

}

?>



