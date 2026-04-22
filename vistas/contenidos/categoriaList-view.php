<!-- Page header -->
<?php 
    if ($_SESSION['privilegio']!=1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CATEGORIAS
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
            <a href="<?php echo SERVERURL;?>categoriaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CATEGORIA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>categoriaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTAR CATEGORIA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>categoriaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CATEGORIA</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <?php 
        require_once "./controladores/categoriaControlador.php";
        $ins_categoria = new categoriaControlador();
        echo $ins_categoria-> paginador_categoria_controlador($pagina[1],15,$_SESSION['privilegio'], 
        $_SESSION['id'], $pagina[0], "");
        
    ?>
</div>