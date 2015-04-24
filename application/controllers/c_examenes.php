<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_examenes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
                $this->load->model('m_asistencia_general');
                $this->load->model('m_cuenta');
                $this->load->model('m_examenes');
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
        
        
             public function v_examenesmultigrids()
	{
               	
                 $this->examenesmultigrids();
                           
	}
        
        
        

           public function v_examenesmultigrids1()
	{   
                 $this->examenesmultigrids_parametrizado('Kids  Tue & Thu');
	}
           public function v_examenesmultigrids2()
	{
                 $this->examenesmultigrids_parametrizado('kids 1');
	}
           public function v_examenesmultigrids3()
	{
                 $this->examenesmultigrids_parametrizado('Kids 1 Tue & Thu');
	}
           public function v_examenesmultigrids4()
	{
                 $this->examenesmultigrids_parametrizado('kids 2');
	}
           public function v_examenesmultigrids5()
	{
                 $this->examenesmultigrids_parametrizado('Kids 3A');
	}
           public function v_examenesmultigrids6()
                   
	{
               $clase = 'kids 3B';
                 $this->examenesmultigrids_parametrizado($clase);
	}
           public function v_examenesmultigrids7()
	{
                 $this->examenesmultigrids_parametrizado('kids 3C');
	}
           public function v_examenesmultigrids8()
	{
                 $this->examenesmultigrids_parametrizado('kids 4');
	}
           public function v_examenesmultigrids9()
	{
                 $this->examenesmultigrids_parametrizado('kids 5');
	}
           public function v_examenesmultigrids10()
	{
                 $this->examenesmultigrids_parametrizado('pre teens');
	}
           public function v_examenesmultigrids11()
	{
                 $this->examenesmultigrids_parametrizado('preschool 3');
	}
           public function v_examenesmultigrids12()
	{
                 $this->examenesmultigrids_parametrizado('teens 1');
	}
          public function v_examenesmultigrids13()
	{
                 $this->examenesmultigrids_parametrizado('teens 2');
	}
          public function v_examenesmultigrids14()
	{
                 $this->examenesmultigrids_parametrizado('teens 3');
	}
          public function v_examenesmultigrids15()
	{
                 $this->examenesmultigrids_parametrizado('teens 4');
	}
          public function v_examenesmultigrids16()
	{
                 $this->examenesmultigrids_parametrizado('young adults 1');
	}
          public function v_examenesmultigrids17()
	{
                 $this->examenesmultigrids_parametrizado('young adults 2');
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
            //$crud->where('descripcion_clase',$where);
            $crud->columns('id_alumno','id_clase','r_w','listening', 'speaking','class_part','fecha_examen','id_etapa');
          
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
         $crud->field_type('id_nota','invisible');
            
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                
                 // $crud->callback_after_delete_insert(array($this, 'log_user_after_insert_examen_global'));
                $crud->callback_after_insert(array($this, 'log_user_after_insert_examen_global'));
                
                
                
                
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
        
        
          public function examenes_parametrizado($where){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes');
            $crud->where('descripcion_clase',$where);
            $crud->order_by('id_alumno','asc');
            $crud->order_by('id_etapa','asc');
            $crud->columns('id_alumno','id_clase','r_w','listening', 'speaking','class_part','fecha_examen','id_etapa');
          
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
         $crud->field_type('id_nota','invisible');
            
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));
                
                 // $crud->callback_after_delete_insert(array($this, 'log_user_after_insert_examen_global'));
                $crud->callback_after_insert(array($this, 'log_user_after_insert_examen_global'));
                
                
                
                
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
        
         function log_user_after_insert_cuenta_crear($post_array,$primary_key)
        {
     
             $this->m_cuenta->crear_cuenta($primary_key);
            return true;
        }
        
          function log_user_after_insert_examen_global($post_array,$primary_key)
        {
            $id_alumno =  $post_array['id_alumno'];
             $id_clase = $post_array['id_clase'];
             if($post_array['id_etapa'] == 1){
                    $this->m_examenes->crear_examen_global($id_alumno, $id_clase);
                    $this->m_examenes->modificacion1();
             }
             if ($post_array['id_etapa'] == 2){
                 $this->m_examenes->modificacion1();
                 $this->m_examenes->modificacion2();
             }
            return true;
        }
        
        
         public function examenes_ideal(){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes_ideal');
            
            $crud->columns('id_clase','r_w','listening', 'speaking','class_part','fecha_examen','id_etapa');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
           
            
              $crud->display_as('id_etapa','Etapa');
              $crud->display_as('id_clase','clase');
              
            $crud->set_subject('examenes Ideal');
            $crud->required_fields('r_w');
            
           $crud->set_relation('id_etapa','etapas','{descripcion_etapa}');
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
          $crud->field_type('id_nota','invisible');
            
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
        
         public function examenes_ideal_parametrizado($where){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes_ideal');
            $crud->where('descripcion_clase',$where);
           
            $crud->order_by('id_etapa','asc');
            $crud->columns('id_clase','r_w','listening', 'speaking','class_part','fecha_examen','id_etapa');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
           
            
              $crud->display_as('id_etapa','Etapa');
              $crud->display_as('id_clase','clase');
              
            $crud->set_subject('examenes Ideal');
            $crud->required_fields('r_w');
            
           $crud->set_relation('id_etapa','etapas','{descripcion_etapa}');
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
          $crud->field_type('id_nota','invisible');
            
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
            $crud->columns('id_alumno', 'id_clase','r_w','listening', 'speaking','class_part', 'global_logro', 'id_nota');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
              $crud->set_rules('global_logro','global_logro','numeric');
            
              
              $crud->display_as('id_clase','clase'); 
              $crud->display_as('id_nota','Notas');
              
            $crud->set_subject('examenes_global');
            $crud->required_fields('r_w');
            $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
           
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
             $crud->set_relation('id_nota','notas','{descripcion_nota}');
             
               
               $crud->field_type('r_w','invisible');
               $crud->field_type('listening','invisible');
                $crud->field_type('speaking','invisible');
                $crud->field_type('class_part','invisible');
                 
            $crud->unset_add();
           // $crud->unset_edit();
            $crud->unset_delete();
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
        
         public function examenes_global_parametrizado($where){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes_global');
            $crud->where('descripcion_clase',$where);
            $crud->columns('id_alumno', 'id_clase','r_w','listening', 'speaking','class_part', 'global_logro', 'id_nota');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
              $crud->set_rules('global_logro','global_logro','numeric');
            
              
              $crud->display_as('id_clase','clase'); 
              $crud->display_as('id_nota','Notas');
              
            $crud->set_subject('examenes_global');
            $crud->required_fields('r_w');
            $crud->set_relation('id_alumno','alumnos','{nombre} {apellido}');
           
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
             $crud->set_relation('id_nota','notas','{descripcion_nota}');
             
               
               $crud->field_type('r_w','invisible');
               $crud->field_type('listening','invisible');
                $crud->field_type('speaking','invisible');
                $crud->field_type('class_part','invisible');
                 
            $crud->unset_add();
           // $crud->unset_edit();
            $crud->unset_delete();
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



           
     function examenesmultigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->examenes_ideal();
                $output2 = $this->examenes();
		$js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
		$output = "<h1> Examen Ideal    </h1>".$output1->output."<h1>Examen </h1>".$output2->output;

                /*
		$output1 = $this->examenes();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Resultado Global </h1>".$output1->output;*/
		
                
                

		$this->_example_output7((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}
        
        function examenesmultigrids_parametrizado($where)
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->examenes_ideal_parametrizado($where);
                $output2 = $this->examenes_parametrizado($where);
		$js_files = $output1->js_files + $output2->js_files;
		$css_files = $output1->css_files + $output2->css_files;
		$output = "<h1> Examen Ideal    </h1>".$output1->output."<h1>Examen </h1>".$output2->output;

                /*
		$output1 = $this->examenes();
		$js_files = $output1->js_files;
		$css_files = $output1->css_files;
		$output = "<h1> Resultado Global </h1>".$output1->output;*/
		
                
                

		$this->_example_output7((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

 function log_user_after_insert2()
{
     
     
       // $this->m_asistencia_general->actualizardatos_ideal();
            return true;
}
        
        
        

}



           
