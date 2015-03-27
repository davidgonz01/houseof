<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<!--basic styles-->
		
<div class="row-fluid">
    
		    <div>
				<a href='<?php echo site_url('examples/asistenciasmultigrids')?>'>Asistencias</a> |
				
			</div>
		<div style='height:20px;'></div>  
						    <div>

								<?php echo $output; ?>
						    </div>
         <div>

             <p> datos </p>
    </div>
    
							
						

							