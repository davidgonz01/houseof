<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>House of English</title>
                <base href="<?php echo base_url() ?>" />
		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							House of English
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-ok"></i>
									4 Tasks to complete
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini progress-danger">
											<div style="width:35%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini progress-warning">
											<div style="width:15%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-success progress-striped active">
											<div style="width:90%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									8 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Diego
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						<a href='<?php echo site_url('examples/v_clasesmultigrids')?>'>
					
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Clases </span>
		s				</a>
					</li>

					<li>
						<a href='<?php echo site_url('c_asistencia_general/v_asistenciasmultigrids')?>' class="dropdown-toggle">
								<i class="icon-text-width"></i>
							<span class="menu-text"> Asistencia </span>
						</a>
					</li>
                                        
                                        <li>
						<a href='<?php echo site_url('c_asistencia_general/v_asistencias_ideal_smultigrids')?>' class="dropdown-toggle">
								<i class="icon-text-width"></i>
							<span class="menu-text"> Asistencia Ideal  </span>
						</a>
					</li>

					<li>
							<a href='<?php echo site_url('examples/v_asistenciasmultigrids')?>' class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Alumnos </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
									<a href='<?php echo site_url('examples/v_alumnosmultigrids')?>'>
									<i class="icon-double-angle-right"></i>
									Regular
								</a>
							</li>

							<li>
								<a href="buttons.html">
									<i class="icon-double-angle-right"></i>
									Personalizado
								</a>
							</li>

							<li>
								<a href="treeview.html">
									<i class="icon-double-angle-right"></i>
									Tipo de Alumno
								</a>
							</li>

							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Three Level Menu
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="#">
											<i class="icon-leaf"></i>
											Item #1
										</a>
									</li>

									<li>
										<a href="#" class="dropdown-toggle">
											<i class="icon-pencil"></i>

											4th level
											<b class="arrow icon-angle-down"></b>
										</a>

										<ul class="submenu">
											<li>
												<a href="#">
													<i class="icon-plus"></i>
													Add Product
												</a>
											</li>

											<li>
												<a href="#">
													<i class="icon-eye-open"></i>
													View Products
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="active">
						<a href="tables.html">
							<i class="icon-list"></i>
							<span class="menu-text"> Tables </span>
						</a>
					</li>

					<li>
                                            
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span class="menu-text"> Examenes </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
									<a href='<?php echo site_url('examples/v_examenesmultigrids')?>' class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Primera Etapa
								</a>
							</li>

							<li>
								<a href='<?php echo site_url('examples/v_examenesmultigrids')?>' class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Segunda Etapa
								</a>
							</li>

							<li>
								<a href='<?php echo site_url('c_examenes/v_examenes_global_multigrids')?>' class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>
									Global
								</a>
							</li>
						</ul>
					</li>

					<li>
						<a href='<?php echo site_url('examples/v_cuentamultigrids')?>'>
							<i class="icon-list-alt"></i>
							<span class="menu-text"> Cuenta </span>
						</a>
					</li>

					<li>
						<a href="calendar.html">
							<i class="icon-calendar"></i>

							<span class="menu-text">
								Calendar
								<span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
									<i class="icon-warning-sign red bigger-130"></i>
								</span>
							</span>
						</a>
					</li>

					<li>
						<a href='<?php echo site_url('examples/v_usuariosmultigrids')?>'>
							<i class="icon-picture"></i>
							<span class="menu-text"> Usuarios </span>
						</a>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-tag"></i>
							<span class="menu-text"> Persona </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="profile.html">
									<i class="icon-double-angle-right"></i>
									Profesor
								</a>
							</li>

							<li>
								<a href="pricing.html">
									<i class="icon-double-angle-right"></i>
									Tutor
								</a>
							</li>

							<li>
								<a href="invoice.html">
									<i class="icon-double-angle-right"></i>
									Invoice
								</a>
							</li>

							<li>
								<a href="login.html">
									<i class="icon-double-angle-right"></i>
									Login &amp; Register
								</a>
							</li>
						</ul>
					</li>


					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Variables del Sitema </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="elements.html">
									<i class="icon-double-angle-right"></i>
									Bancos
								</a>
							</li>

							<li>
								<a href="buttons.html">
									<i class="icon-double-angle-right"></i>
									Forma de Pago
								</a>
							</li>

							<li>
								<a href="buttons.html">
									<i class="icon-double-angle-right"></i>
									Tipo Personas
								</a>
							</li>

							<li>
								<a href="treeview.html">
									<i class="icon-double-angle-right"></i>
									Rango - Notas
								</a>
							</li>

							<li>
								<a href="treeview.html">
									<i class="icon-double-angle-right"></i>
									Tipo Documentos
								</a>
							</li>

							<li>
								<a href="treeview.html">
									<i class="icon-double-angle-right"></i>
									Paises
								</a>
							</li>

							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-double-angle-right"></i>

									Clases - alumnos
									<b class="arrow icon-angle-down"></b>
								</a>

								<ul class="submenu">
									<li>
										<a href="#">
											<i class="icon-leaf"></i>
											Etapas
										</a>
									</li>

									<li>
										<a href="#" class="dropdown-toggle">
											<i class="icon-pencil"></i>

											Tipo Documentos
											<b class="arrow icon-angle-down"></b>
										</a>

										<ul class="submenu">
											<li>
												<a href="#">
													<i class="icon-plus"></i>
													Add Product
												</a>
											</li>

											<li>
												<a href="#">
													<i class="icon-eye-open"></i>
													View Products
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-file-alt"></i>

							<span class="menu-text">
								Other Pages
								<span class="badge badge-primary ">4</span>
							</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="error-404.html">
									<i class="icon-double-angle-right"></i>
									Error 404
								</a>
							</li>

							<li>
								<a href="error-500.html">
									<i class="icon-double-angle-right"></i>
									Error 500
								</a>
							</li>

							<li>
								<a href="grid.html">
									<i class="icon-double-angle-right"></i>
									Grid
								</a>
							</li>

							<li>
								<a href="blank.html">
									<i class="icon-double-angle-right"></i>
									Blank Page
								</a>
							</li>
						</ul>
					</li>
				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
			
					