<?php

    include('db-config.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = '$id'" ;
        $resultado = mysqli_query($db, $query);

        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
            
        }
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE task SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id"; 
        mysqli_query($db, $query);

        $_SESSION['mensaje'] = 'TAREA ACTUALIZADA';
        $_SESSION['mensaje_type'] = 'success';
        header("Location: index.php");
    }

?>


<?php  include('includes/header.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tareas</title>
</head>
<body>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="mb-3">
                            <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Actualiza el titulo">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="2" placeholder="Actualiza la descripcion">  <?php echo $descripcion; ?>  </textarea>
                        </div>
                        <button class="btn btn-success" name="actualizar">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>




<?php  include('includes/footer.php');?>