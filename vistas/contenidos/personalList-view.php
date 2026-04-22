<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONALES
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
            <a href="<?php echo SERVERURL;?>personalNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PERSONAL</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>personalList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONALES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>personalSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONAL</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <?php 
        require_once "./controladores/personalControlador.php";
        $ins_personal = new personalControlador();
        echo $ins_personal-> paginador_personal_controlador($pagina[1],15,$_SESSION['privilegio'], 
        $_SESSION['id'], $pagina[0], "");
        
    ?>
</div>
