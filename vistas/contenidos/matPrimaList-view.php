<!-- Page header -->
 <?php 
    if ($_SESSION['privilegio']!=1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MATERIA PRIMA
    </h3>
    <p class="text-justify">
    La yerba mate es una planta originaria de las selvas subtropicales de Sudamérica, que se 
    caracteriza 
    por sus hojas secas trituradas y sus propiedades energéticas y estimulantes
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
            <a href="<?php echo SERVERURL;?>matPrimaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MATERIA PRIMA</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>matPrimaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MATERIA PRIMA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>matPrimaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR MATERIA PRIMA</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <?php 
        require_once "./controladores/matPrimaControlador.php";
        $ins_matPrima = new matPrimaControlador();
        echo $ins_matPrima-> paginador_matPrima_controlador($pagina[1],15,$_SESSION['privilegio'], 
        $_SESSION['id'], $pagina[0], "");
        
    ?>
</div>