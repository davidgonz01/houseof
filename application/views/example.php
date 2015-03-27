<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
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

		
</head>
<body>
    
	<div>

		<a href='<?php echo site_url('examples/asistenciasmultigrids')?>'>Asistencias</a> |
		<a href='<?php echo site_url('examples/clasesmultigrids')?>'>Clases</a> |
		<a href='<?php echo site_url('examples/examenesmultigrids')?>'>Examenes</a> |
		<a href='<?php echo site_url('examples/cuentamultigrids')?>'>Cuenta</a> | 
		<a href='<?php echo site_url('examples/mostrarpagina')?>'>pagina</a> |		 
		<a href='<?php echo site_url('examples/pruebasimple')?>'>pruebasimple</a> |
		<a href='<?php echo site_url('examples/multigrids')?>'>Nuevo Alumno [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div>

		<?php echo $output; ?>
    </div>
         <div>

             <p> datos </p>
    </div>
</body>
</html>
