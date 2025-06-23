<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR DETALLE DE PRODUCCION
    </h3>
    <p class="text-justify">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeProduction/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>detProductionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DETALLE DE PRODUCCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>detProductionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DETALLE DE PRODUCCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>detProductionSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR DETALLE DE PRODUCCION</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; Información del item</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_codigo" class="bmd-label-floating">Códido</label>
                            <input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="item_codigo_up"
                                id="item_codigo" maxlength="45">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="item_nombre_up" id="item_nombre" maxlength="140">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Stock</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_stock_up"
                                id="item_stock" maxlength="9">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="item_estado" class="bmd-label-floating">Estado</label>
                            <select class="form-control" name="item_estado_up" id="item_estado">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="Habilitado">Habilitado</option>
                                <option value="Deshabilitado">Deshabilitado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="item_detalle" class="bmd-label-floating">Detalle</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control"
                                name="item_detalle_up" id="item_detalle" maxlength="190">
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
</div>