<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fab fa-dashcube fa-fw"></i> &nbsp; PANEL DE DATOS
    </h3>
    <p class="text-center">
        DATOS REFERENCIALES PARA PRODUCCION Y SALIDA DE PRODUCTOS...
    </p>

    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeProduction/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<!-- Content -->
<div class="full-box tile-container">
    <a href="<?php echo SERVERURL;?>matPrimaList/" class="tile">
        <div class="tile-tittle">materia prima</div>
        <div class="tile-icon">
            <i class="fas fa-seedling fa-fw"></i>
            <p>5 Registrados</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>etapProductionList/" class="tile">
        <div class="tile-tittle">etapa produccion</div>
        <div class="tile-icon">
            <i class="fas fa-retweet fa-fw"></i>
            <p>9 Registrados</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>presentacionList/" class="tile">
        <div class="tile-tittle">presentaciones</div>
        <div class="tile-icon">
            <i class="fas fa-stream fa-fw"></i>
            <p>30 Registradas</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>nivelCalidadList/" class="tile">
        <div class="tile-tittle">nivel de calidad</div>
        <div class="tile-icon">
            <i class="fas fa-award fa-fw"></i>
            <p>700 Registrados</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>loteList/" class="tile">
        <div class="tile-tittle">lote de produccion</div>
        <div class="tile-icon">
            <i class="fas fa-table fa-fw"></i>
            <p>1205</i></p>
        </div>
    </a>
        <?php
        require_once "./controladores/categoriaControlador.php";
        $ins_categoria = new categoriaControlador();
        $total_categoria = $ins_categoria->datos_categoria_controlador("Conteo",0);
    ?>
    <a href="<?php echo SERVERURL;?>categoriaList/" class="tile">
        <div class="tile-tittle">categoria</div>
        <div class="tile-icon">
            <i class="fa fa-sitemap fa-fw" ></i>
            <p><?php echo $total_categoria->rowCount();?> Registrados</i></p>
        </div>
    </a>
</div>