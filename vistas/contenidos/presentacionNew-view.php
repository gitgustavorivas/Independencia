<!-- Page header -->
<?php
if ($_SESSION['privilegio'] != 1) {
    echo $LC->forzar_cierre_controlador();
    exit();
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA PRESENTACION.
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>homeReferencias/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL; ?>presentacionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp;
                AGREGAR PRESENTACIONES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>presentacionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                LISTAR PRESENTACIONES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>presentacionSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
                PRESENTACIONES</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/presentacionAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; NUEVA PRESENTACION</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="descrip_presentacion" class="bmd-label-floating">DESCRIPCION</label>
                            <input type="text" pattern="[a-zA-Z0-9- ]{1,45}" class="form-control"
                                name="descrip_presentacion_reg" id="descrip_presentacion" maxlength="45">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="uni_med_presentacion" class="bmd-label-floating">UNIDAD MEDIDA</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="uni_med_Descripcion_reg" id="uni_med_Descripcion" maxlength="140">
                        </div>
                    </div>
        <fieldset>
        <br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp;
                LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp;
                GUARDAR</button>
        </p>
    </form>
</div>