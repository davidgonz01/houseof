<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_examenes extends CI_Controller {

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

	
             public function v_examenes_global_multigrids()
	{
               	
                 $this->examenes_globalmultigrids();
                           
	}

	public function index()
	{
		  $this->alumnosmultigrids();

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
        
        
         public function examenes_global(){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes_global');
            $crud->columns('id_alumno','id_clase','r_w','listening', 'speaking','class_part', 'global_logro', 'nota','fecha_examen','id_etapa');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
              $crud->set_rules('global_logro','global_logro','numeric');
            
              $crud->display_as('id_etapa','Etapa');
              $crud->display_as('id_clase','clase');
              
            $crud->set_subject('examenes_global');
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
        
        
        
        
        function add_field_callback_2()
        {
                return '<input type="text" maxlength="50" value=""  minlength="4">';
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
        
          
      
        
         function examenes_globalmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->examenes_global();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Resultado Global </h1>".$output1->output;

		$this->_example_output7((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
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



           
