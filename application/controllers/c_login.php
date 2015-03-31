<?php 
class c_login extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}
  function login()
	{
             $this->load->helper(array('url', 'form'));
		$this->load->helper('form');
                $this->load->library('session');
                $this->load->library('form_validation');
		if(!isset($_POST['username'])){	//	Si no recibimos ning�n valor proveniente del formulario, significa que el usuario reci�n ingresa.	
			$this->load->view('interfaces/v_login_estilo');		//	Por lo tanto le presentamos la pantalla del formulario de ingreso.
		}
		else{							//	Si el usuario ya pas� por la pantalla inicial y presion� el bot�n "Ingresar"
			$this->form_validation->set_rules('username','Username','required');		//	Configuramos las validaciones ayudandonos con la librer�a form_validation del Framework Codeigniter
			$this->form_validation->set_rules('password','password','required');
			if(($this->form_validation->run()==FALSE)){				//	Verificamos si el usuario super� la validaci�n
				$this->load->view('v_login');							//	En caso que no, volvemos a presentar la pantalla de login
			}
			else{													//	Si ambos campos fueron correctamente rellanados por el usuario,
				$this->load->model('m_login');
				$ExisteUsuarioyPassoword=$this->m_login->ValidarUsuario($_POST['username'],$_POST['password']);	//	comprobamos que el usuario exista en la base de datos y la password ingresada sea correcta
				if($ExisteUsuarioyPassoword){	// La variable $ExisteUsuarioyPassoword recibe valor TRUE si el usuario existe y FALSE en caso que no. Este valor lo determina el modelo.
				//	echo "Validacion Ok<br><br><a href=''>Volver</a>";
                                //			Si el usuario ingres� datos de acceso v�lido, imprimos un mensaje de validaci�n exitosa en pantalla
                                      
                                    
                                        $data['error']="Nombre de usuario o contraseña incorrecta, por favor vuelva a intentar";
                                            // $this->session->set_userdata($datasession);
                                       // $id = intval( $id );
                                        $datoPregunta = intval( $this->m_login->ConsultaId($_POST['username'],$_POST['password']));
                                      
                                            $datasession = array(
                                              'usuario_id'  => $datoPregunta,
                                              'login_ok' => TRUE
                                        );
                                             $this->session->set_userdata($datasession);

                                             $this->v_examenesmultigrids();
                                           //$this->load->view('v_menu.php');
                                       
                                       
                                        
                                }
				else{	//	Si no logr� validar
					$data['error']="Nombre de usuario o contraseña incorrecta, por favor vuelva a intentar";
					$this->load->view('v_login',$data);	//	Lo regresamos a la pantalla de login y pasamos como par�metro el mensaje de error a presentar en pantalla
				}
			}
		}
	}
        
        
               public function v_examenesmultigrids()
	{
               	
                 $this->examenesmultigrids();
                           
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
        
        
        public function examenes(){
            try{
                $crud = new grocery_CRUD();
		 
              $crud->set_theme('datatables');
            $crud->set_table('examenes');
            $crud->columns('id_alumno','id_clase','r_w','listening', 'speaking','class_part','id_nota','fecha_examen','id_etapa');
          
            $crud->set_rules('r_w','R_W','numeric');
             $crud->set_rules('listening','Listening','numeric');
              $crud->set_rules('speaking','Speaking','numeric');
              $crud->set_rules('class_part','Class_part','numeric');
           
            
              $crud->display_as('id_etapa','Etapa');
              $crud->display_as('id_clase','clase');
              $crud->display_as('id_nota','Nota');
              
            $crud->set_subject('examenes');
            $crud->required_fields('r_w');
            $crud->set_relation('id_alumno','alumnos','{nombre}');
           $crud->set_relation('id_etapa','etapas','{descripcion_etapa}');
            $crud->set_relation('id_clase','clases','{descripcion_clase}');
            $crud->set_relation('id_nota','notas','{descripcion_nota}');
            
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
        
         public function index2()
	{
	$this->load->view('v_tabla.php');
	$this->load->view('v_clases1.php');
        $this->load->view('row-fluid.php',$output);
        $this->load->view('v_final.php'); 

	}
        
        function logout() {
       
        $this->session->sess_destroy();
        $this->session->set_flashdata("message",  popup_msg("You have logged out"));
        //redirect('/admin/login');    
    }
    
      public function _example_output7($output = null)
	{
          $this->load->view('v_tabla.php');
	  $this->load->view('v_clases1.php');
         $this->load->view('row-fluid.php',$output);
          $this->load->view('v_final.php'); 
	}
        
    
      public function v_usuariosmultigrids()
	{			
               //  $this->usuariosmultigrids();   
              $this->load->view('v_login.php');
	}

	
}