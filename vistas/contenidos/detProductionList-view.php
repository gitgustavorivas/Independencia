<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DETALLE DE PRODUCCION
    </h3>
    <p class="text-center">
YERBA MATE INDEPENDENCIA... 
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeProduction/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i>volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>detProductionNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR DETALLE DE PRODUCCION</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>detProductionList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTAR DETALLE DE PRODUCCION</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>detProductionSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR DETALLE DE PRODUCCION</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>STOCK</th>
                    <th>CATEGORIA</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>YERBA MATE</td>
                    <td>250gr. TRADICIONAL</td>
                    <td>20</td>
                    <td>YERBA MATE</td>
                    <td>
                        <a href="detProductionUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
 
                <tr class="text-center">
                    <td>1</td>
                    <td>COSIDO QUEMADO</td>
                    <td>PRESENTACION 50gr.</td>
                    <td>1000</td>
                    <td>COSIDO QUEMADO</td>
                    <td>
                        <a href="detProductionUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                </tr>
                <tr class="text-center">
                    <td>1</td>
                    <td>YERBA MATE</td>
                    <td>250gr. Tradicional</td>
                    <td>20</td>
                    <td>Yerba Mate</td>
                    <td>
                        <a href="detProductionUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <tr class="text-center">
                    <td>1</td>
                    <td>YERBA MATE</td>
                    <td>250gr. Tradicional</td>
                    <td>20</td>
                    <td>Yerba Mate</td>
                    <td>
                        <a href="detProductionUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                </tr>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Prevista</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>