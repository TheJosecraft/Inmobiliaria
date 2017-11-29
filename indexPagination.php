<?php
    require'../classes/AutoLoad.php';
    $db = new DataBase();
    $gestor = new ManagerContactoTelefono($db);
    $page = Request::read('page');
    $session = new Session('sesion');
    $user = $session->getUser();
    echo Util::varDump($user);
    if($page === null){
        $page = 1;
    }
    $rows = $gestor->countRegistros();
    $rpp = 3;
    $pagination = new Pagination($rows , $page , $rpp);

    $listaDeContactosTelefonos = $gestor->getAllLimit($pagination->getOffset() , $pagination->getRpp());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Gestion de contactos y telefonos</h1>
    <h1>
        <?php
            if($user === null){
                echo 'no eres nadie';
            }else{
                echo 'Eres ' . $user->getUsuario();
            }
        ?>
    </h1>
    <h3><a href="../ruta_login/actiondologon.php">Cerrar sesión</a></h3>
    <table border="1">
        <thead>
            <tr>
                <td>Numero</td>
                <td>Nombre</td>
                <td>Telefono</td>
                <td>Descripcion</td>
            </tr>
        </thead>
        <tbody>
    <?php
    //echo Util::varDump($listaDeContactosTelefonos);
        foreach ($listaDeContactosTelefonos as $key => $contactoTelefono) {
            $contacto = $contactoTelefono['contacto'];
            $telefono = $contactoTelefono['telefono'];
            ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><a href="action_viewEdit.php?idcontacto=<?php echo $contacto->getId(); ?>"><?php echo $contacto->getNombre(); ?></a></td>
                <td><a href="action_viewEditTelefono.php?idtelefono=<?php echo $telefono->getId(); ?>"><?php echo $telefono->getTelefono(); ?></a></td>
                <td><?php echo $telefono->getDescripcion(); ?></td>
                <td><a href="action_viewEdit.php?idcontacto=<?php echo $contacto->getId(); ?>&idtelefono=<?php echo $telefono->getId(); ?>">Editar</a></td>
                <td><a href="action_viewDelete.php?idcontacto=<?php echo $contacto->getId(); ?>&idtelefono=<?php echo $telefono->getId(); ?>">Borrar</a></td>
            </tr>

            <?php
        }
    ?>
            <tr>
                <td colspan=5>
                    <a href='?page=<?php echo $pagination->getFirst(); ?>'>&lt;&lt;</a>
                    <a href='?page=<?php echo $pagination->getPrevius(); ?>'>&lt;</a>
                    <?php
                        $rango = $pagination->getRange();
                        foreach ($rango as $pagina) {
                            echo '<a href="?page=' . $pagina . '"> ' . $pagina . '</a>';
                        }
                    ?>
                    <a href='?page=<?php echo $pagination->getNext(); ?>'>&gt;</a>
                    <a href='?page=<?php echo $pagination->getLast(); ?>'>&gt;&gt;</a>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="action_viewInsert.php">insertar contacto o telefono</a>
    <br>
</body>
</html>
<?php
$db->closeConnection();
