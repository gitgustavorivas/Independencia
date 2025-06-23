<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DIRECCION.
    </h3>
    <p class="text-center">
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
            <a class="active" href="<?php echo SERVERURL;?>direccionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DIRECCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>direccionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE DIRECCIONES</a>
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
            <legend><i class="far fa-plus-square"></i> &nbsp; INFORMACION DE DIRECCION</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_codigo" class="bmd-label-floating">Códido</label>
                            <input type="num" pattern="[0-9]{1,4500}" class="form-control" name="item_codigo_reg"
                                id="item_codigo" maxlength="4500">
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
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="150">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Avenida</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="150">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Comentario</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="150">
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