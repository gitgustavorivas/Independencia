<!-- Page header -->
<?php
if ($_SESSION['privilegio'] != 1) {
    echo $LC->forzar_cierre_controlador();
    exit();
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ITEM
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...</p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>home/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL; ?>itemNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR
                ITEM</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>itemList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
                ITEMS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>itemSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ITEM</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <?php
    require_once("./controladores/itemControlador.php");
    $object = new itemControlador();
    $object2 = new itemControlador();
    $categorias = $object->combolistcategoria();
    $lotes = $object2->combolistlote();
    ?>
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/itemAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; INFORMACION DEL ITEM</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_nombre_reg" class="bmd-label-floating">Nombre Item</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                name="item_nombre_reg" id="item_nombre_reg" maxlength="140">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_descripcion_reg" class="bmd-label-floating">Descripcion</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,240}" class="form-control"
                                name="item_descripcion_reg" id="item_descripcion_reg" maxlength="150">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_preciouni_reg" class="bmd-label-floating">Precio Uni</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_preciouni_reg"
                                id="item_preciouni_reg" maxlength="9">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_preciocant_reg" class="bmd-label-floating">Precio Cant</label>
                            <input type="num" pattern="[0-9]{1,9}" class="form-control" name="item_preciocant_reg"
                                id="item_preciocant_reg" maxlength="9">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_stock_reg" class="bmd-label-floating">Stock</label>
                            <input type="num" pattern="[0-9]{1,15}" class="form-control" name="item_stock_reg"
                                id="item_stock_reg" maxlength="9">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="item_lote_reg" class="bmd-label-floating">Lote</label>
                                    <select class="form-control" name="item_lote_reg" id="item_lote_reg">
                                        <option selected disabled value="">SELECCIONE LOTE.</option>
                                        <?php foreach ($lotes as $lote) { ?>
                                            <option value="<?= $lote['idLote'] ?>"><?= $lote['fechaProduccion'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">seleccione un elemento válido!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="item_categoria_reg" class="bmd-label-floating">Categoria</label>
                                    <select class="form-control" name="item_categoria_reg" id="item_categoria_reg">
                                        <option selected disabled value="">SELECCIONE UNA CATEGORIA.</option>
                                        <?php foreach ($categorias as $categoria) { ?>
                                            <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['nombre'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">seleccione un elemento válido!</div>
                                </div>
                            </div>
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