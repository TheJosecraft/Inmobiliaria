<?php
function sesiones($permiso = false){
    session_start();

    if(isset($_COOKIE['datos'])){
        session_decode($_COOKIE['datos']);
    }

    $datos_sesion = session_encode();

    if(isset($_SESSION['login_remember']) && $_SESSION['login_remember'] == true){
        echo "<script>console.log( 'Debug Objects: " . $_SESSION['login_remember'] . "' );</script>";
        setcookie('datos', $datos_sesion, time()+(365*24*60*60), '/');

    }

    if($permiso == false && $_SESSION['usuario'] != "admin"){
        header("location:/index.php");
    }

}
?>
