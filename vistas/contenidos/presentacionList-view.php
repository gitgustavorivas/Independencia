<?php 
    if ($_SESSION['privilegio']!=1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRESENTACIONES
    </h3>
    <p class="text-center">
    YERBA MATE INDEPENDENCIA... 
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeReferencias/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div> 

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>presentacionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PRESENTACION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>presentacionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTAR PRESENTACION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>presentacionSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PRESENTACION</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <?php 
        require_once "./controladores/presentacionControlador.php";
        $ins_presentacion = new presentacionControlador();
        echo $ins_presentacion-> paginador_presentacion_controlador($pagina[1],15,$_SESSION['privilegio'], 
        $_SESSION['id'], $pagina[0], "");
        
    ?>
</div>