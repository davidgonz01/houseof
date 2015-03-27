<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_alumnos extends CI_Controller {
    function __construct()
    {
        parent::__construct();
	$this->load->database();
	$this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('m_alumnos');
       
    }
    
     // Función index. Comprueba si existe la sesión de usuario
    public function index()
    {
         /// 
    }
	
    public function getById( $id ) {
	if( isset( $id ) )
            echo json_encode( $this->m_alumnos->getById( $id ) );
    }
	
    public function create() {
	if( !empty( $_POST ) ) {
            $this->m_alumnos->create();
	}
    }
	
    public function read() {
	echo json_encode( $this->m_alumnos->getAll() );
    }
	
    public function update() {
	if( !empty( $_POST ) ) {
            $this->m_alumnos->update();
            echo 'Registro actualizado correctamente!';
	}
    }
	
 public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id not provided.';
			return;
		}
       
           $this->m_alumnos->delete( $id );
            echo 'Registro borrado correctamente!';
	
		
	
    }
    
   
}