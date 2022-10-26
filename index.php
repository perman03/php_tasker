<?php

    include ("db-config.php");

?>
<?php

    include ("includes/header.php");

?>



    <div class="container p-4">
        <div class="row">
            <!-- FORMULARIO -->
            <div class="col-md-4">

                <!-- MENSAJE DE CONFIRMACION  -->
                <?php if(isset($_SESSION['mensaje'])): ?>
                    <div class="alert alert-<?=$_SESSION['mensaje_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); endif; ?>
                <!-- FIN DE MENSAJE DE CONFIRMACION  -->

                <div class="card card-body">
                    <form action="/php_notes_crud/crear.php" method="POST">
                        <div class="mb-3">
                          <label for="titulo" class="form-label">Titulo</label>
                          <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Inserta el titulo de tu tarea" autofocus>
                        </div>
                        <div class="mb-3">
                          <label for="descripcion" class="form-label">Descripcion</label>
                          <textarea name="descripcion" id="descripcion" rows="2" class="form-control" placeholder="Describe tu tarea"></textarea>
                        </div>
                        <input type="submit" name="guardar-tarea" value="Guardar tarea" class="btn btn-success btn-block" >
                    </form>
                </div>
            </div>

            <!-- TABLA DE INFORMACION -->
            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha de creación:</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = "SELECT * FROM task";
                                $tareas = mysqli_query($db, $query);
                                while($row = mysqli_fetch_array($tareas)): ?>

                                <tr>
                                    <td><?php echo $row['titulo'];?></td>
                                    <td><?php echo $row['descripcion'];?></td>
                                    <td><?php echo $row['creado_en'];?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="/php_notes_crud/editar.php?id=<?php echo $row['id']?>"> <i class="fas fa-marker"></i>  </a>
                                        <a class="btn btn-danger" href="eliminar.php?id=<?php echo $row['id']?>"> <i class="far fa-trash-alt"></i> </a>
                                    </td>
                                </tr>


                            <?php endwhile; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    




<?php

    include ("includes/footer.php");

?>

