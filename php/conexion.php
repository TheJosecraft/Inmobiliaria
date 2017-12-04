<?php
$conexion = mysqli_connect('localhost', 'root', '', 'inmobiliaria');
mysqli_set_charset($conexion, 'utf8');

if(!$conexion){
    echo "Ha habido un error en la conexión a la base de datos";
}else{
    return $conexion;
}
?>
