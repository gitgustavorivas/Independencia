<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR NUEVA ORDEN DE PRODUCCION.
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA... 
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeProduction/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p> 
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL;?>ordProductionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ORDEN DE PRODUCCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>ordProductionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA ORDEN DE PRODUCCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>ordProductionSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ORDEN DE PRODUCCION</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; INFORMACION ORDEN DE PRODUCCION</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_nombre" class="bmd-label">Fecha</label>
                            <input type="date" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="item_nombre_reg" id="item_nombre" maxlength="140">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock" class="bmd-label-floating">Cantidad</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_stock_reg"
                                id="item_stock" maxlength="9">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="Descripcion" class="bmd-label-floating">Descripcion</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="item_nombre_reg" id="descripcion" maxlength="140">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="item_estado" class="bmd-label-floating">Id-Pedido A produccion</label>
                            <select class="form-control" name="item_estado_reg" id="item_estado">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="Habilitado">Habilitado</option>
                                <option value="Deshabilitado">Deshabilitado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="item_estado" class="bmd-label-floating">Id-Pedido de Venta</label>
                            <select class="form-control" name="item_estado_reg" id="item_estado">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="Habilitado">Habilitado</option>
                                <option value="Deshabilitado">Deshabilitado</option>
                            </select>
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