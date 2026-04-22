		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="<?php echo SERVERURL ?>vistas/assets/avatar/Avatar2.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?> <br><small class="roboto-condensed-light"><?php echo $_SESSION['usuario'];?></small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="<?php echo SERVERURL;?>home/"><i class="fab fa-dashcube fa-fw"></i> &nbsp; PANEL INICIO</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL;?>clientNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>clientList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>clientSearch"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar cliente</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Items <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL;?>itemNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar item</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>itemList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de items</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>itemSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar item</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-light fa-cash-register"></i> &nbsp; Cajas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL;?>cajaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Caja</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>cajaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Cajas</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>cajaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Caja</a>
								</li>
							</ul>
						</li>
						<?php 
							if ($_SESSION['privilegio']==1) {
						?>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL;?>userNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>userList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>userSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
								</li>
							</ul>
						</li>
						<?php } ?>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user-tie fa-fw"></i> &nbsp; Personales <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL;?>personalNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Personal</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>personalList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Personales</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL;?>personalSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Personal</a>
								</li>
							</ul>
						</li>

						<hr style="border: 0; height: 3px; background-color:rgba(7, 167, 44, 0.8);">

						<li>
							<a href="<?php echo SERVERURL;?>homeProduction/"><i class="fas fa-industry fa-fw"></i> &nbsp; PRODUCCION</a>
						</li>
						<li>
							<a href="<?php echo SERVERURL;?>homeVentas/"><i class="fas fa-chart-pie fa-fw"></i> &nbsp; VENTAS</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>