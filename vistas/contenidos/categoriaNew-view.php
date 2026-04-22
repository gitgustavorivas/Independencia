<!-- Page header -->
<?php
if ($_SESSION['privilegio'] != 1) {
    echo $LC->forzar_cierre_controlador();
    exit();
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CATEGORIA
    </h3>
    <p class="text-justify">
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>homeReferencias/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL; ?>categoriaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CATEGORIA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>categoriaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CATEGORIA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>categoriaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CATEGORIA</a>
        </li>
    </ul>
</div>

<!-- Content here-->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/categoriaAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="categoria_nombre" class="bmd-label-floating">Nombre Categoria</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,100}" class="form-control"
                                name="categoria_nombre_reg" id="categoria_nombre" maxlength="100" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="categoria_descripcion" class="bmd-label-floating">Descripcion</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,200}" class="form-control"
                                name="categoria_descrip_reg" id="categoria_descrip" maxlength="200" required="">
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