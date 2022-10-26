<?php

include("db-config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // var_dump($identificador);
    $query = "DELETE FROM task WHERE id = $id ";
    $resultado = mysqli_query($db, $query);

    if(!$resultado) {
      die('Fallo de consulta');
  }

        
  $_SESSION['mensaje'] = 'TAREA ELIMINADA CORRECTAMENTE';
  $_SESSION['mensaje_type'] = 'danger';
  header('Location: index.php');
  
}


