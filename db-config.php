<?php 

    //iniciar sesion
    session_start();

    $db = mysqli_connect('localhost', 'root', 'noviembre3', 'php-notes');

    // if(!$db){
    //     echo 'No se ha podido conectar con la base de datos';
    // }