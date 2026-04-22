<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fab fa-dashcube fa-fw"></i> &nbsp; PANEL
    </h3>
    <p class="text-justify">
    La yerba mate es una planta originaria de las selvas subtropicales de Sudamérica, que se 
    caracteriza por sus hojas secas trituradas y sus propiedades energéticas y estimulantes
    </p>
</div>

<!-- Content -->
<div class="full-box tile-container">

    <?php
        require_once "./controladores/clienteControlador.php";
        $ins_cliente = new clienteControlador();
        $total_cliente = $ins_cliente->datos_cliente_controlador("Conteo",0);
    ?>
    <a href="<?php echo SERVERURL;?>clientList/" class="tile">
        <div class="tile-tittle">Clientes</div>
        <div class="tile-icon">
            <i class="fas  fa-user-secret fa-fw"></i>
            <p><?php echo $total_cliente->rowCount(); ?> Registrados</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>itemList/" class="tile">
        <div class="tile-tittle">Items</div>
        <div class="tile-icon">
            <i class="fas fa-pallet fa-fw"></i>
            <p>9 Registrados</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>cajaList/" class="tile">
        <div class="tile-tittle">Cajas</div>
        <div class="tile-icon">
            <i class="fas fa-light fa-cash-register"></i>
            <p>30 Registradas</p>
        </div>
    </a>

    <?php if ($_SESSION['privilegio']==1) { 
        require_once "./controladores/usuarioControlador.php";
        $ins_usuario = new usuarioControlador();
        $total_usuario = $ins_usuario->datos_usuario_controlador("Conteo",0);
        ?>
    <a href="<?php echo SERVERURL;?>userList/" class="tile">
        <div class="tile-tittle">Ususarios</div>
        <div class="tile-icon">
            <i class="fas  fa-user-secret fa-fw"></i>
            <p><?php echo $total_usuario->rowCount(); ?> Registrados</p>
        </div>
    </a>
    <?php }?>

    <a href="<?php echo SERVERURL;?>personalList/" class="tile">
        <div class="tile-tittle">Personales</div>
        <div class="tile-icon">
            <i class="fas fa-user-tie fa-fw"></i>
            <p>700 Registrados</p>
        </div>
    </a>

    <a href="<?php echo SERVERURL;?>homeProduction" class="tile">
        <div class="tile-tittle">produccion</div>
        <div class="tile-icon">
            <i class="fas fa-industry fa-fw"></i>
            <p>9 Registrados</p>
        </div>
    </a>

    
    <a href="<?php echo SERVERURL;?>homeVentas" class="tile">
        <div class="tile-tittle">ventas</div>
        <div class="tile-icon">
            <i class="fas fa-chart-pie fa-fw"></i>
            <p>30 Registradas</p>
        </div>
    </a>
</div>