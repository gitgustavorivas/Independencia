<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR DIRECCION
    </h3>
    <p class="text-justify">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeVentas/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>direccionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DIRECCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>direccionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DIRECCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>direccionSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR DIRECCION</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; INFORMACION DE DIRECCIONES</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_codigo" class="bmd-label-floating">Códido</label>
                            <input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="item_codigo_reg"
                                id="item_codigo" maxlength="45">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Ciudad</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="item_nombre_reg" id="item_nombre" maxlength="140">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Barrio</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="9">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Avenida</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="9">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Comentario</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="9">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="submit" class="btn btn-raised btn-success btn-sm">
                <i class="fas fa-sync-alt"></i> &nbsp;
                ACTUALIZAR</button>
        </p>
    </form>

    <div class="alert alert-danger text-center" role="alert">
        <p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
        <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
        <p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
    </div>
    </form>
</div>
