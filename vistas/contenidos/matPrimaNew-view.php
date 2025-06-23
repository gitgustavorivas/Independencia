<!-- Page header -->
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
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matPrima_nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control"
                                name="cliente_nombre_reg" id="cliente_nombre" maxlength="40">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="matPrima_descripcion" class="bmd-label-floating">Descripcion</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control"
                                name="matPrima_descripcion_reg" id="matPrima_descripcion" maxlength="40">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_dni" class="bmd-label-floating">Stock/Actual: Kg.</label>
                            <input type="num" pattern="[0-9]{1,27}" class="form-control" name="cliente_dni_reg"
                                id="cliente_dni" maxlength="27">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_telefono" class="bmd-label-floating">Stock/Minimo: Kg.</label>
                            <input type="num" pattern="[0-9]{1,20}" class="form-control" name="cliente_telefono_reg"
                                id="cliente_telefono" maxlength="20">
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