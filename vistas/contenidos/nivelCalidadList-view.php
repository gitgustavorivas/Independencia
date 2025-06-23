<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; NIVEL DE CALIDAD List.
    </h3>
    <p class="text-center">
    YERBA MATE INDEPENDENCIA...
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
            <a href="<?php echo SERVERURL;?>nivelCalidadNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR NIVEL DE CALIDAD</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>nivelCalidadList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTAR NIVEL DE CALIDAD</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>nivelCalidadSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR NIVEL DE CALIDAD</a>
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
                    <th>DESCRIPCION</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>KILO GRAMO</td>
                    <td>
                        <a href="nivelCalidadUpdate" class="btn btn-success">
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
                <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>GRAMO</td>
                    <td>
                        <a href="nivelCalidadUpdate" class="btn btn-success">
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