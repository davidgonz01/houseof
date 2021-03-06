<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_asistencia_general extends CI_Controller {
   static $idcuenta_alumno = 2; 

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
                $this->load->model('m_asistencia_general');
                $this->load->model('m_cuenta');
                
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
        
         public function _example_output88($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
        $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
         public function _example_output_pp($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
        // $this->load->view('v_cuenta.php',$output);
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
        
           public function _example_output20($output = null)
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
  

           public function v_asistenciasmultigrids1()
	{   
                 $this->asistenciasmultigrids_parametrizado('Kids  Tue & Thu');
	}
           public function v_asistenciasmultigrids2()
	{
                 $this->asistenciasmultigrids_parametrizado('kids 1');
	}
           public function v_asistenciasmultigrids3()
	{
                 $this->asistenciasmultigrids_parametrizado('Kids 1 Tue & Thu');
	}
           public function v_asistenciasmultigrids4()
	{
                 $this->asistenciasmultigrids_parametrizado('kids 2');
	}
           public function v_asistenciasmultigrids5()
	{
                 $this->asistenciasmultigrids_parametrizado('Kids 3A');
	}
           public function v_asistenciasmultigrids6()
                   
	{
               $clase = 'kids 3B';
                 $this->asistenciasmultigrids_parametrizado($clase);
	}
           public function v_asistenciasmultigrids7()
	{
                 $this->asistenciasmultigrids_parametrizado('kids 3C');
	}
           public function v_asistenciasmultigrids8()
	{
                 $this->asistenciasmultigrids_parametrizado('kids 4');
	}
           public function v_asistenciasmultigrids9()
	{
                 $this->asistenciasmultigrids_parametrizado('kids 5');
	}
           public function v_asistenciasmultigrids10()
	{
                 $this->asistenciasmultigrids_parametrizado('pre teens');
	}
           public function v_asistenciasmultigrids11()
	{
                 $this->asistenciasmultigrids_parametrizado('preschool 3');
	}
           public function v_asistenciasmultigrids12()
	{
                 $this->asistenciasmultigrids_parametrizado('teens 1');
	}
          public function v_asistenciasmultigrids13()
	{
                 $this->asistenciasmultigrids_parametrizado('teens 2');
	}
          public function v_asistenciasmultigrids14()
	{
                 $this->asistenciasmultigrids_parametrizado('teens 3');
	}
          public function v_asistenciasmultigrids15()
	{
                 $this->asistenciasmultigrids_parametrizado('teens 4');
	}
          public function v_asistenciasmultigrids16()
	{
                 $this->asistenciasmultigrids_parametrizado('young adults 1');
	}
          public function v_asistenciasmultigrids17()
	{
                 $this->asistenciasmultigrids_parametrizado('young adults 2');
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

            public function v_cuentamultigrids_parametrizado()
	{
               	
		
              //  $where = $this->input->post( 'textidCuenta', true );
            //     $this->cuentamultigrids_parametrizado($where);
                
                 $this->cuentamultigrids();
                          
	}
        
        
        
         public function v_cuentamultigrids_personalizado()
	{
               	
		
                 $this->cuentamultigrids_personalizado();
                          
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
          function asistenciasmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		
                $output1 = $this->asistencias_ideal();
		$output2 = $this->asistencia();

		/**$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Asistencia General </h1>".$output1->output;*/
                
                $js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
		$output = "<h1> Asistencia Ideal    </h1>".$output1->output."<h1> Asistencia </h1>".$output2->output;



		$this->_example_output6((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));

	}
        
        
         function asistenciasmultigrids_parametrizado($where)
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		
                $output1 = $this->asistencias_ideal_parametrizado($where);
		$output2 = $this->asistencia_parametrizado($where);

		/**$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Asistencia General </h1>".$output1->output;*/
                
                $js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
		$output = "<h1> Asistencia Ideal    </h1>".$output1->output."<h1> Asistencia </h1>".$output2->output;



		$this->_example_output6((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));

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
				            $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
				            $crud->set_relation('id_clase','clases','{descripcion_clase}');
                                                $crud->field_type('cantidad_ausencia','invisible');
                                                $crud->field_type('cantidad_clases','invisible');
                                                $crud->field_type('porcentaje_asistencia','invisible');
                                            
						$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                                                $crud->callback_before_insert(array($this,'checking_post_code'));
                                                $crud->callback_before_update(array($this,'checking_post_code'));
                                                $crud->callback_after_insert(array($this, 'log_user_after_insert'));
                                                $crud->callback_after_update(array($this, 'log_user_after_insert'));
                                            
						$output = $crud->render();
                                                
           
						if($crud->getState() != 'list') {
					
						} else {
							return $output;
						}
             
            	}catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
             	}
     
        }
        
        
         public function asistencia_parametrizado($where){
            try{
                	$crud = new grocery_CRUD();
		 
                                     $crud->set_theme('datatables');
			            $crud->set_table('asistencia_general');
                                    $crud->where('descripcion_clase',$where);
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
				            $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
				            $crud->set_relation('id_clase','clases','{descripcion_clase}');
                                                $crud->field_type('cantidad_ausencia','invisible');
                                                $crud->field_type('cantidad_clases','invisible');
                                                $crud->field_type('porcentaje_asistencia','invisible');
                                            
						$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                                                $crud->callback_before_insert(array($this,'checking_post_code'));
                                                $crud->callback_before_update(array($this,'checking_post_code'));
                                                $crud->callback_after_insert(array($this, 'log_user_after_insert'));
                                                $crud->callback_after_update(array($this, 'log_user_after_insert'));
                                            
						$output = $crud->render();
                                                
           
						if($crud->getState() != 'list') {
					
						} else {
							return $output;
						}
             
            	}catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
             	}
     
        }
        
                function checking_post_code($post_array)
                {
                    //if(empty($post_array['cantidad_clases']))
                    //{
                        $post_array['cantidad_clases'] = $post_array['cant_febrero'] + $post_array['cant_marzo']+ $post_array['cant_abril'] + $post_array['cant_mayo']+ $post_array['cant_junio'] + $post_array['cant_julio'] + $post_array['cant_agosto'] + $post_array['cant_septiembre'] + $post_array['cant_octubre'] + $post_array['cant_noviembre'] + $post_array['cant_diciembre'];
                   // }
                    return $post_array;
                }
                
                function checking_precio_hora($post_array)
                {
                    if($post_array['credito']==NULL){
                        $post_array['credito'] =0;
                    }
                    if( $post_array['cant_horas']== null OR   $post_array['precio_hora'] == null ){
                        $post_array['debito'] = 0;
                    }  else {
                          $post_array['debito'] = $post_array['cant_horas'] * $post_array['precio_hora'];
                    }
                      

                    return $post_array;
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
            $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
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
            $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
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
		 
                   
                    $crud->set_theme('datatables');
                    $crud->set_table('cuenta');
                 //   $crud->where('id_cuenta',$where);
                    $crud->columns('id_cuenta','id_alumno', 'id_tutor','saldo_cuenta' );


                      $crud->set_rules('debito_cuenta','debito','numeric');
                      $crud->set_rules('credito_cuenta','credito','numeric');
                      $crud->set_rules('saldo_cuenta','saldo','numeric');


                       $crud->display_as('id_cuenta','Codigo');
                   
                       $crud->display_as('saldo_cuenta','Saldo');
                       
                       $crud->unset_add();
						$crud->unset_delete();
						//$crud->unset_edit();
						

                         $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
                          $crud->set_relation('id_tutor','tutor','{nombre} {apellido}');
                           $crud->field_type('saldo_cuenta','invisible');
                       
                           $crud->field_type('debito_cuenta','invisible');
                           $crud->field_type('credito_cuenta','invisible');
                           $crud->field_type('id_cuenta','invisible');
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
        
          public function cuenta_parametrizado($where){
            try{
                $crud = new grocery_CRUD();
		 
                   
                    $crud->set_theme('datatables');
                    $crud->set_table('cuenta');
                 $crud->where('id_cuenta',$where);
                    $crud->columns('id_cuenta','id_alumno', 'id_tutor','saldo_cuenta' );


                      
                      $crud->set_rules('saldo_cuenta','saldo','numeric');


                       $crud->display_as('id_cuenta','id');
                       $crud->display_as('id_alumno','idalumno');
                   
                       $crud->display_as('saldo_cuenta','Saldo');
                       
                       $crud->unset_add();
                       $crud->unset_print();
						$crud->unset_delete();
						$crud->unset_edit();
                                             //   $crud->unse
						

                         $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
                       $crud->set_subject('cuenta');

                        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                      //  $crud->add_action('ver', '', '','ui-icon-image',array($this,'just_a_test'));
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
        
        function just_a_test($primary_key , $row)
{
   
}
   
        
            public function cuentadetalle(){
            try{
                $crud = new grocery_CRUD();
		 
                    $crud->set_theme('datatables');
                    $crud->set_table('cuenta_detalle');
                    $crud->columns('id_cuenta_detalle','id_cuenta','nro_comprobante', 'concepto_detalle', 'debito_detalle', 'credito_detalle','saldo_detalle' ,'fecha_detalle'  );


                      $crud->set_rules('debito_detalle','debito','numeric');
                      $crud->set_rules('credito_detalle','credito','numeric');
                      $crud->set_rules('saldo_detalle','saldo','numeric');

                       $crud->display_as('id_cuenta','Codigo');
                       $crud->display_as('debito_detalle','Debito');
                       
                       $crud->display_as('credito_detalle','Credito');
                       $crud->display_as('saldo_detalle','Saldo');
                       
                        $crud->set_relation('id_cuenta','cuenta','{id_cuenta}' );
                        $crud->field_type('saldo_detalle','invisible');
                       $crud->set_subject('cuenta_detalle');
                       $crud->unset_edit();
                       $crud->unset_delete();
                         //$crud->callback_before_delete(array($this, 'log_user_before_delete_cuenta_regular'));
                         $crud->callback_after_insert(array($this, 'log_user_after_insert_cuenta_regular'));
                        
                         //$crud->callback_before_delete(array($this, 'log_user_after_insert_cuenta_regular'));
                         
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
        
          public function cuentadetalle_parametrizado($where){
            try{
                $crud = new grocery_CRUD();
		 
                    $crud->set_theme('datatables');
                    $crud->set_table('cuenta_detalle');
                   $crud->where('id_cuenta',$where);
                    $crud->columns('id_cuenta_detalle','id_cuenta','nro_comprobante', 'concepto_detalle', 'debito_detalle', 'credito_detalle','saldo_detalle' ,'fecha_detalle'  );


                      $crud->set_rules('debito_detalle','debito','numeric');
                      $crud->set_rules('credito_detalle','credito','numeric');
                      $crud->set_rules('saldo_detalle','saldo','numeric');

                       $crud->display_as('id_cuenta','Codigo');
                       $crud->display_as('debito_detalle','Debito');
                       
                       $crud->display_as('credito_detalle','Credito');
                       $crud->display_as('saldo_detalle','Saldo');
                       
                        //$crud->set_relation('id_cuenta','cuenta','{id_cuenta}');
                        $crud->field_type('saldo_detalle','invisible');
                       $crud->set_subject('cuenta_detalle');
                       $crud->unset_edit();
                       $crud->unset_delete();
                       $crud->unset_print();
                      //$crud->field_type('id_cuenta','invisible');
                        $crud->callback_before_insert(array($this, 'log_user_before_insert_cuenta_regular'));
                         $crud->callback_after_insert(array($this, 'log_user_after_insert_cuenta_regular'));
                        
                       
                         
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
        
        
         public function cuentadetalle_personalizado(){
            try{
                $crud = new grocery_CRUD();
		 
                    $crud->set_theme('datatables');
                    $crud->set_table('cuenta_detalle_personalizado');
                    $crud->columns('id_cuenta_detalle_personalizado', 'id_cuenta', 'id_clase','cant_horas','precio_hora', 'debito', 'credito','saldo' ,'fecha' ,'nro_comprobante' );


                      $crud->set_rules('debito','debito','numeric');
                      $crud->set_rules('credito','credito','numeric');
                      $crud->set_rules('saldo','saldo','numeric');

                      $crud->display_as('cant_hora','cant');
                       $crud->display_as('debito','Debito');
                       $crud->display_as('credito','Credito');
                       $crud->display_as('saldo','Saldo');
                       $crud->display_as('id_cuenta_detalle_personalizado','ID');
                       
                         $crud->unset_edit();
                       $crud->unset_delete();
                           $crud->set_relation('id_clase','clases','{descripcion_clase}');
                           $crud->set_relation('id_cuenta','cuenta','{id_cuenta}');
                          // $crud->edit_fields('id_cuenta', 'id_clase','cant_horas','precio_hora', 'credito' ,'nro_comprobante');
                       $crud->set_subject('cuenta_detalle_personalizado');

                        $crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                        
                        $crud->callback_before_insert(array($this,'checking_precio_hora'));
                        //$crud->callback_before_update(array($this,'checking_precio_hora'));
                      
                         $crud->callback_after_insert(array($this, 'log_user_after_insert_cuenta_personalizado'));
                         
                         //$crud->callback_after_update(array($this, 'log_user_after_insert_cuenta_personalizado'));
                        
                        
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
        

	
	

         function examenesmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->examenes();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Examenes </h1>".$output1->output;

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
		$output = "<h1> Alumnos</h1>".$output1->output;

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
		$output = "<h1> Usuarios </h1>".$output1->output;

		$this->_example_output9((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
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
		$output = "<h1>Cuenta por Alumnos</h1>".$output1->output."<h1> Detalles de las cuentas </h1>".$output2->output;

		

		$this->_example_output8((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
        
         function cuentamultigrids_parametrizado($where)
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->cuenta_parametrizado($where);

		$output2 = $this->cuentadetalle_parametrizado($where);

		$js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
                
                
		$output = "<h1>Cuenta por Alumnos</h1>".$output1->output."<h1> Detalles de las cuentas </h1>".$output2->output;
                
		//$js_files = $output1->js_files;
		//$css_files = $output1->css_files;
                
                
		//$output = "<h1>Cuenta por Alumnos</h1>".$output1->output."<h1> Detalles de las cuentas </h1>";
                
		

		$this->_example_output88((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
        
        
        
         function cuentamultigrids_personalizado()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->cuenta();

		$output2 = $this->cuentadetalle_personalizado();

		$js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
		$output = "<h1>Cuentas de Alumnos Personalizados </h1>".$output1->output."<h1> Detalles de la Cuenta</h1>".$output2->output;

		

		$this->_example_output8((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
        
        
	
        
          
        public function asistencias_ideal(){
            try{
                	$crud = new grocery_CRUD();
		 
                                     $crud->set_theme('datatables');
                                    // $id = 'kids 5';
                                    // $crud->where('descripcion_clase',$id);
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
	                      ->display_as('cant_diciembre','DEC');
	                      
	                     
                        
						
           
				            $crud->set_subject('asisencias_ideal');
                                            $crud->field_type('cantidad_clases','invisible');
				            $crud->required_fields('febrero');
				            // $crud->edit_fields('id_clase','cant_febrero','cant_marzo', 'cant_abril','cant_mayo','cant_junio','cant_julio','cant_agosto','cant_septiembre','cant_octubre','cant_noviembre','cant_diciembre');
				            $crud->set_relation('id_clase','clases','{descripcion_clase}');
                                             

						$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                                                $crud->callback_before_insert(array($this,'checking_post_code'));
                                                $crud->callback_before_update(array($this,'checking_post_code'));
                                                
                                                
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
               // $output = $crud->render();
     
        }
        
        public function asistencias_ideal_parametrizado($where){
            try{
                	$crud = new grocery_CRUD();
		 
                                     $crud->set_theme('datatables');
                                     $id = 'kids 5';
                                     $crud->where('descripcion_clase',$where);
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
	                      ->display_as('cant_diciembre','DEC');
	                      
	                     
                        
						
           
				            $crud->set_subject('asisencias_ideal');
                                            $crud->field_type('cantidad_clases','invisible');
				            $crud->required_fields('febrero');
				            // $crud->edit_fields('id_clase','cant_febrero','cant_marzo', 'cant_abril','cant_mayo','cant_junio','cant_julio','cant_agosto','cant_septiembre','cant_octubre','cant_noviembre','cant_diciembre');
				            $crud->set_relation('id_clase','clases','{descripcion_clase}');
                                             

						$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                                                $crud->callback_before_insert(array($this,'checking_post_code'));
                                                $crud->callback_before_update(array($this,'checking_post_code'));
                                                $crud->callback_after_update(array($this, 'log_user_after_insert'));
                                                $crud->callback_after_insert(array($this, 'log_user_after_insert'));
                                                
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
               // $output = $crud->render();
     
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
     
     
      //  $this->m_asistencia_general->actualizardatos($primary_key);
        $this->m_asistencia_general->actualizardatos_completo();
            return true;
}
  
 function log_user_after_insert2()
{
     
     
        $this->m_asistencia_general->actualizardatos_ideal();
            return true;
}
 
 function log_user_after_insert_cuenta_personalizado($post_array,$primary_key)
{
   
     
        $this->m_cuenta->actualizardatos_cuenta($primary_key);
            return true;
}

 function log_user_after_insert_cuenta_regular($post_array,$primary_key)
{
        $this->m_cuenta->actualizardatos_cuenta_regular($primary_key);
         
            return true;
}
 

 function log_user_before_delete_cuenta_regular($post_array,$primary_key)
{
        
        $this->m_cuenta->eliminando($primary_key);        
            return true;
}
   
function log_where($post_array,$primary_key)
{
     
     ///$idcuenta_alumno = $primary_key;
     //   $this->cuentadetalle_parametrizado($idcuenta_alumno);
            return true;
}
        


  function log_user_before_insert_cuenta_regular($post_array,$primary_key)
        {
             $post_array['id_cuenta'] = 89;
        return $post_array;

        }

}



           
