<!-- Page header -->
<?php
if ($LC->encryption($_SESSION['id']) != $pagina[1]) {
    if ($_SESSION['privilegio'] != 1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CATEGORIA
    </h3>
    <p class="text-center"> YERBA MATE INDEPENDENCIA...</p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>homeReferencias/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL; ?>categoriaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CATEGORIA</a>
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
    <?php
    require_once "./controladores/categoriaControlador.php";
    $ins_categoria = new categoriaControlador();
    $datos_categoria = $ins_categoria->datos_categoria_controlador("Unico", $pagina[1]);

    if ($datos_categoria->rowCount() == 1) {
        $campos = $datos_categoria->fetch();

        ?>
        <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/categoriaAjax.php" method="POST"
            data-form="update" autocomplete="off">
            <input type="hidden" name="categoria_id_up" value="<?php echo $pagina[1]; ?>">
            <fieldset>
                <legend><i class="fas fa-user"></i> &nbsp; ACTUALIZANDO DATOS CATEGORIA</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="categoria_nombre_up" class="bmd-label-floating">Nombre</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control"
                                    name="categoria_nombre_up" id="categoria_nombre_up" maxlength="100"
                                    value="<?php echo $campos['nombre']; ?>" required="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="categoria_descripcion_up" class="bmd-label-floating">Descripcion</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}" class="form-control"
                                    name="categoria_descripcion_up" id="categoria_descripcion_up" maxlength="40"
                                    value="<?php echo $campos['descripcion']; ?>" required="">
                            </div>
                        </div>

                    </div>
                </div>
                <fieldset>
                    <p class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de
                        usuario y
                        contraseña</p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="usuario_admin" class="bmd-label-floating">Nombre de usuario</label>
                                    <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_admin"
                                        id="usuario_admin" maxlength="35" required="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="clave_admin" class="bmd-label-floating">Contraseña</label>
                                    <input type="password" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}" class="form-control"
                                        name="clave_admin" id="clave_admin" maxlength="200" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <?php if ($LC->encryption($_SESSION['privilegio']) != $pagina[1]) { ?>
                    <input type="hidden" name="tipo_cuenta" value="Impropia">
                <?php } else { ?>
                    <input type="hidden" name="tipo_cuenta" value="Propia">
                <?php } ?>
                <p class="text-center" style="margin-top: 40px;">
                    <button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp;
                        ACTUALIZAR</button>
                </p>
        </form>
    <?php } else { ?>
        <div class="alert alert-danger text-center" role="alert">
            <p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
            <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
            <p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
        </div>
    <?php } ?>
</div>