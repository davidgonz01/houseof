<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_asistencia_general extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
                $this->load->model('m_asistencia_general');
	}

	public function _example_output($output = null)
	{
	$this->load->view('v_tabla.php');
	$this->load->view('v_clases1.php');
        $this->load->view('row-fluid.php',$output);
        $this->load->view('v_final.php'); 

	}
        
        
        public function _example_output2($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
          public function _example_output3($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
          public function _example_output4($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
          public function _example_output5($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
          public function _example_output6($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
        
          public function _example_output7($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
          public function _example_output8($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
          public function _example_output9($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
          public function _example_output10($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
            public function _example_output66($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
           public function _example_output11($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
        public function mostrarpagina()
	{
              
		 $this->load->view('v_tabla.php');
		 $this->load->view('v_clases1.php');
                 $this->examenesmultigrids();
                 $this->load->view('v_final.php');           
	}

	     public function v_clasesmultigrids()
	{
               	
                 $this->clasesmultigrids();
                           
	}
             public function v_examenesmultigrids()
	{
               	
                 $this->examenesmultigrids();
                           
	}

	    public function v_asistenciasmultigrids()
	{
                 $this->asistenciasmultigrids();
	}
        
            public function v_asistencias_ideal_smultigrids()
	{
                //$this->log_user_after_insert2();
                 $this->asistencias_ideal_multigrids();
                 
	}

	 public function v_alumnosmultigrids()
	{
               	
				
                 $this->alumnosmultigrids();
                     
	}
        
         public function v_usuariosmultigrids()
	{			
                 $this->usuariosmultigrids();          
	}

	 public function v_cuentamultigrids()
	{
               	
		
                 $this->cuentamultigrids();
                          
	}


	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		  $this->alumnosmultigrids();

	}

	public function alumnos2()
	{
		try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('alumnos');
            $crud->columns('nombre','apellido','nro_documento', 'telefono','localidad','fecha_nacimiento','id_tipo_documento','id_pais','id_tipo_alumno');
             $crud->unset_columns('telefono','fecha_nacimiento' );
            $crud->set_rules('nro_documento','Nro Documento','numeric');
           
            $crud->display_as('id_tipo_documento','Tipo Documento');
             $crud->display_as('id_pais','Pais');
             $crud->display_as('id_tipo_alumno','Tipo de Alumnos')
                ->display_as('nombre','Nombres')
				->display_as('apellido','Apellidos');
            $crud->set_subject('alumnos');
            $crud->required_fields('telefono');
            $crud->set_relation('id_tipo_documento','tipo_documentos','{descripcion_tipo_documentos}');
            $crud->set_relation('id_pais','paises','{descripcion_pais}');
        
            $crud->set_relation('id_tipo_alumno','tipo_alumnos','{descripcion}');
            $crud->callback_add_field('apellido',array($this,'add_field_callback_2'));
            $output = $crud->render();

			$this->_example_output($output);
	

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        
        public function alumnos()
	{
		try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('alumnos');
            $crud->columns('nombre','apellido','nro_documento', 'telefono','localidad','fecha_nacimiento','id_tipo_documento','id_pais','id_tipo_alumno');
             $crud->unset_columns('telefono','fecha_nacimiento' );
            $crud->set_rules('nro_documento','Nro Documento','numeric');
           
            $crud->display_as('id_tipo_documento','Tipo Documento');
             $crud->display_as('id_pais','Pais');
             $crud->display_as('id_tipo_alumno','Tipo de Alumnos')
                ->display_as('nombre','Nombres')
				->display_as('apellido','Apellidos');
            $crud->set_subject('alumnos');
            $crud->required_fields('telefono');
            $crud->set_relation('id_tipo_documento','tipo_documentos','{descripcion_tipo_documentos}');
            $crud->set_relation('id_pais','paises','{descripcion_pais}');
        
            $crud->set_relation('id_tipo_alumno','tipo_alumnos','{descripcion}');
            $crud->callback_add_field('apellido',array($this,'add_field_callback_2'));
           
            $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
            $output = $crud->render();
		if($crud->getState() != 'list') {

			$this->_example_output($output);
		} else {
			return $output;
		}
             
             }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
	}
        
        
        public function usuarios(){
            try{
                $crud = new grocery_CRUD();
            $crud->set_table('usuarios');
            $crud->columns('usuario','contraseña');
            $crud->set_subject('usuarios');
            $crud->required_fields('usuario', 'contraseña');

            $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
            $output = $crud->render();
		if($crud->getState() != 'list') {

			$this->_example_output($output);
		} else {
			return $output;
		}
             
             }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
     
        }
        
        
        public function clases()
        {
            try{
	                $crud = new grocery_CRUD();	 
	                $crud->set_theme('datatables');
	            	$crud->set_table('clases');
	            	$crud->columns('descripcion_clase','cantidad_hs'); 
	            	$crud->set_rules('cantidad_hs','Cantidad de Hs','numeric');
	            	$crud->set_subject('clases');
	            	$crud->required_fields('descripcion_clase');   
                        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

			$output = $crud->render();

						if($crud->getState() != 'list') 
						{
							$this->_example_output($output);
						} else {
							return $output;
						}
             
            	}catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
     
        }
        
        
        
        public function asistencia(){
            try{
                	$crud = new grocery_CRUD();
		 
                                     $crud->set_theme('datatables');
			            $crud->set_table('asistencia_general');
			            $crud->columns('id_alumno','id_clase','cant_febrero','cant_marzo', 'cant_abril','cant_mayo','cant_junio','cant_julio','cant_agosto','cant_septiembre','cant_octubre','cant_noviembre','cant_diciembre','cantidad_clases','cantidad_ausencia','porcentaje_asistencia');
			             
			            $crud->set_rules('cant_febrero','FEB','numeric');
			            $crud->set_rules('cant_marzo','MAR','numeric');
			            $crud->set_rules('cant_abril','APR','numeric');
			            $crud->set_rules('cant_mayo','MAY','numeric');
			            $crud->set_rules('cant_junio','JUN','numeric');
			            $crud->set_rules('cant_julio','JUL','numeric');
			            $crud->set_rules('cant_agosto','AUG','numeric');
			            $crud->set_rules('cant_septiembre','SEP','numeric');
			            $crud->set_rules('cant_octubre','OCT','numeric');
			            $crud->set_rules('cant_noviembre','NOV','numeric');
			            $crud->set_rules('cant_diciembre','DEC','numeric');
           
          		 		$crud->display_as('id_alumno','alumnos')
              		 	  	->display_as('id_clase','clases')
             
               		 	  ->display_as('cant_febrero','FEB')
               		 	  ->display_as('cant_febrero','FEB')
	                      ->display_as('cant_febrero','FEB')
	                      ->display_as('cant_marzo','MAR')
	                      ->display_as('cant_abril','APR')
	                      ->display_as('cant_mayo','MAY')
	                      ->display_as('cant_junio','JUN')
	                      ->display_as('cant_julio','JUL')
	                      ->display_as('cant_agosto','AUG')
	                      ->display_as('cant_septiembre','SEP')
	                      ->display_as('cant_octubre','OCT')
	                      ->display_as('cant_noviembre','NOV')
	                      ->display_as('cant_diciembre','DEC')
	                      ->display_as('cantidad_clases','Total')
	                      ->display_as('cantidad_ausencia','Aus')
                        ->display_as('porcentaje_asistencia','%')
						->display_as('apellido','Apellidos');
           
				            $crud->set_subject('asisencia_general');
				            $crud->required_fields('febrero');
				            $crud->set_relation('id_alumno','alumnos','{nombre}');
				            $crud->set_relation('id_clase','clases','{descripcion_clase}');
        

                                            
						$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                                                 $crud->callback_after_insert(array($this, 'log_user_after_insert'));
                                            
						$output = $crud->render();
                                                
           
						if($crud->getState() != 'list') {
					
						} else {
							return $output;
						}
             
            	}catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
             	}
     
        }
        
        
        
        
         public function examenes(){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes');
            $crud->columns('id_alumno','id_clase','r_w','listening', 'speaking','class_part','nota','fecha_examen','id_etapa');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
           
            
              $crud->display_as('id_etapa','Etapa');
              $crud->display_as('id_clase','clase');
              
            $crud->set_subject('examenes');
            $crud->required_fields('r_w');
            $crud->set_relation('id_alumno','alumnos','{nombre}');
           $crud->set_relation('id_etapa','etapas','{descripcion_etapa}');
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
        
            
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
             
             }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
     
        }
        
        
         public function examenes2(){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes');
            $crud->columns('id_alumno','id_clase','r_w','listening', 'speaking','class_part','nota','fecha_examen','id_etapa');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
           
            
              $crud->display_as('id_etapa','Etapa');
              $crud->display_as('id_clase','clase');
              
            $crud->set_subject('examenes');
            $crud->required_fields('r_w');
            $crud->set_relation('id_alumno','alumnos','{nombre}');
           $crud->set_relation('id_etapa','etapas','{descripcion_etapa}');
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
        
            
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
             
             }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
     
        }
        
        
        
            public function cuenta(){
            try{
                $crud = new grocery_CRUD();
		 
                   
                    $crud->set_table('cuenta');
                    $crud->columns('id_cuenta','id_alumno', 'id_tutor', 'debito_cuenta', 'credito_cuenta','saldo_cuenta' );


                      $crud->set_rules('debito_cuenta','debito','numeric');
                      $crud->set_rules('credito_cuenta','credito','numeric');
                      $crud->set_rules('saldo_cuenta','saldo','numeric');


                       $crud->display_as('debito_cuenta','Debito');
                       $crud->display_as('credito_cuenta','Credito');
                       $crud->display_as('saldo_cuenta','Saldo');
                       
                       $crud->unset_add();
						$crud->unset_delete();
						$crud->unset_edit();
						

                         $crud->set_relation('id_alumno','alumnos','{nombre}');
                       $crud->set_subject('cuenta');

                        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
             
             }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
     
        }
        
        
        
        
            public function cuentadetalle(){
            try{
                $crud = new grocery_CRUD();
		 
                    //$crud->set_theme('datatables');
                    $crud->set_table('cuenta_detalle');
                    $crud->columns('id_cuenta','nro_comprobante', 'concepto_detalle', 'debito_detalle', 'credito_detalle','saldo_detalle' ,'fecha_detalle'  );


                      $crud->set_rules('debito_detalle','debito','numeric');
                      $crud->set_rules('credito_detalle','credito','numeric');
                      $crud->set_rules('saldo_detalle','saldo','numeric');


                       $crud->display_as('debito_detalle','Debito');
                       $crud->display_as('credito_detalle','Credito');
                       $crud->display_as('saldo_detalle','Saldo');
                       
                           $crud->set_relation('id_cuenta','cuenta','{id_cuenta}');
                       $crud->set_subject('cuenta_detalle');

                        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
             
             }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
     
        }
        
        
        
        function add_field_callback_2()
        {
                return '<input type="text" maxlength="50" value=""  minlength="4">';
        }
        

	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->alumnos();

		//$output3 = $this->employees_management2();

		//$output3 = $this->customers_management2();

		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1>List 1</h1>".$output1->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

        
        
        function clasesmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->clases();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1>List 1</h1>".$output1->output;

		$this->_example_output2((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
        
          
        function asistenciasmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->asistencia();

		//$output3 = $this->employees_management2();

		//$output3 = $this->customers_management2();

		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Asistencia General </h1>".$output1->output;


		$this->_example_output6((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));

	}
        
         function examenesmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->examenes();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1>List 1</h1>".$output1->output;

		$this->_example_output7((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}



    function alumnosmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->alumnos();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1>List 1</h1>".$output1->output;

		$this->_example_output11((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

         function usuariosmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->usuarios();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1>List 1</h1>".$output1->output;

		$this->_example_output9((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');
                
                
		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}
        
        
        
        function cuentamultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->cuenta();

		$output2 = $this->cuentadetalle();

		$js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output;

		

		$this->_example_output8((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
        
        
	public function customers_management2()
	{

		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}
        
          
        public function asistencias_ideal(){
            try{
                	$crud = new grocery_CRUD();
		 
                                     $crud->set_theme('datatables');
			               $crud->set_table('asistencias_ideal');
			            $crud->columns('id_clase','cant_febrero','cant_marzo', 'cant_abril','cant_mayo','cant_junio','cant_julio','cant_agosto','cant_septiembre','cant_octubre','cant_noviembre','cant_diciembre','cantidad_clases');
			             
			            $crud->set_rules('cant_febrero','FEB','numeric');
			            $crud->set_rules('cant_marzo','MAR','numeric');
			            $crud->set_rules('cant_abril','APR','numeric');
			            $crud->set_rules('cant_mayo','MAY','numeric');
			            $crud->set_rules('cant_junio','JUN','numeric');
			            $crud->set_rules('cant_julio','JUL','numeric');
			            $crud->set_rules('cant_agosto','AUG','numeric');
			            $crud->set_rules('cant_septiembre','SEP','numeric');
			            $crud->set_rules('cant_octubre','OCT','numeric');
			            $crud->set_rules('cant_noviembre','NOV','numeric');
			            $crud->set_rules('cant_diciembre','DEC','numeric');
           
          		 		$crud->display_as('id_alumno','alumnos')
              		 	  	->display_as('id_clase','clases')
             
               		 	  ->display_as('cant_febrero','FEB')
               		 	  ->display_as('cant_febrero','FEB')
	                      ->display_as('cant_febrero','FEB')
	                      ->display_as('cant_marzo','MAR')
	                      ->display_as('cant_abril','APR')
	                      ->display_as('cant_mayo','MAY')
	                      ->display_as('cant_junio','JUN')
	                      ->display_as('cant_julio','JUL')
	                      ->display_as('cant_agosto','AUG')
	                      ->display_as('cant_septiembre','SEP')
	                      ->display_as('cant_octubre','OCT')
	                      ->display_as('cant_noviembre','NOV')
	                      ->display_as('cant_diciembre','DEC')
	                      ->display_as('cantidad_clases','Total');
	                     
                        
						
           
				            $crud->set_subject('asisencias_ideal');
				            $crud->required_fields('febrero');
				            
				            $crud->set_relation('id_clase','clases','{descripcion_clase}');
        

						$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                                                $crud->callback_after_insert(array($this, 'log_user_after_insert2'));
                                                $crud->callback_after_update(array($this, 'log_user_after_insert2'));
						$output = $crud->render();

						if($crud->getState() != 'list') {
						//		 $this->load->view('v_tabla.php');
				// $this->load->view('v_clases1.php');
        // $this->load->view('row-fluid.php',$output);
         // $this->load->view('v_final.php'); 

							//$this->_example_output($output);
						} else {
							return $output;
						}
             
            	}catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
             	}
     
        }
        
        
      function asistencias_ideal_multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->asistencias_ideal();
               // $this->log_user_after_insert2();
		//$output3 = $this->employees_management2();

		//$output3 = $this->customers_management2();

		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1>Asistencia Ideal</h1>".$output1->output;


		$this->_example_output66((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));

	}
             
        
                  
 function log_user_after_insert($post_array,$primary_key)
{
     
     
        $this->m_asistencia_general->actualizardatos($primary_key);
        $this->m_asistencia_general->actualizardatos_completo();
            return true;
}
  
 function log_user_after_insert2()
{
     
     
        $this->m_asistencia_general->actualizardatos_ideal();
            return true;
}
        
        
        

}



           
