<!-- Page header -->
<?php
if ($_SESSION['privilegio'] != 1) {
    echo $LC->forzar_cierre_controlador();
    exit();
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MATERIA PRIMA
    </h3>
    <p class="text-justify">
    POR FAVOR INGRESE TODOS LOS VALORES REQUERIDOS SIN DEJAR NINGUN ESPACIO EN BLANCO.
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
            <a class="active" href="<?php echo SERVERURL;?>matPrimaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MATERIA PRIMA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>matPrimaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MATERIA PRIMA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>matPrimaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR MATERIA PRIMA</a>
        </li>
    </ul>
</div>

<!-- Content here-->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/matPrimaAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matprima_nombreInsumo" class="bmd-label-floating">Nombre Insumo</label><br>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,100}" class="form-control"
                                name="matprima_nombre_reg" id="matprima_nombre" maxlength="100">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matprima_costounitario" class="bmd-label-floating">Costo Unitario</label><br>
                            <input type="number" class="form-control" name="matprima_costounitario_reg"
                            id="matprima_costounitario">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="matprima_unimedida" class="bmd-label-floating">Unidad Medida</label><br>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control"
                                name="matprima_unimedida_reg" id="matprima_unimedida" maxlength="40">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="matprima_loteproveedor" class="bmd-label-floating">Lote Proveedor</label><br>
                            <input type="num" pattern="[0-9]{1,100}" class="form-control" 
                            name="matprima_loteproveedor_reg" id="matprima_loteproveedor" maxlength="100">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="matprima_fechaingreso" class="bmd-label-floating">Fecha De Ingreso.</label><br>
                            <input type="date" class="form-control" name="matprima_fechaingreso_reg"
                            id="matprima_fechaingreso">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matprima_totalcompra" class="bmd-label-floating">Total Compra</label><br>
                            <input type="text" pattern="[0-9]{1,100}" class="form-control" name="matprima_totalcompra_reg"
                            id="matprima_totalcompra" maxlength="100">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matprima_stockactual" class="bmd-label-floating">Stock Actual KG.</label><br>
                            <input type="number" class="form-control" name="matprima_stockactual_reg"
                            id="matprima_stockactual">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matprima_stockminimo" class="bmd-label-floating">Stock Minimo KG.</label><br>
                            <input type="number" class="form-control" name="matprima_stockminimo_reg"
                            id="matprima_stockminimo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matprima_proveedor" class="bmd-label-floating">Proveedor</label><br>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,100}" class="form-control" name="matprima_proveedor_reg"
                            id="matprima_proveedor" maxlength="100">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp;
                LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp;
                GUARDAR</button>
        </p>
    </form>
</div>

