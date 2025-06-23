<!-- Page header -->
<?php 
    if ($_SESSION['privilegio']!=1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>home/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>userNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>userList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
            USUARIOS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>userSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <?php 
        require_once "./controladores/usuarioControlador.php";
        $ins_usuario = new usuarioControlador();
        echo $ins_usuario-> paginador_usuario_controlador($pagina[1],15,$_SESSION['privilegio'], 
        $_SESSION['id'], $pagina[0], "");
        
    ?>
</div>