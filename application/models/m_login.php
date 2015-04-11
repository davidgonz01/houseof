<?php

class m_login extends  ci_model {
	function  ValidarUsuario($email,$password){			//	Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
		$query = "SELECT COUNT(*)FROM usuarios WHERE usuario = '$email' and password = '$password' ";
                     if($query=='0'){
                        return FALSE;
                    }else{
                        return TRUE;
                    }
			
	}
        
        function ConsultaId($email,$password){			//	Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
		 $consulta = "SELECT id FROM usuarios WHERE usuario = '$email' and password = '$password' ";
                 //  $query = $this->db->query($consulta);
                   $cuenaretornar = 1;
                   
                        return $cuenaretornar;	//	Devolvemos al controlador la fila que coincide con la b�squeda. (FALSE en caso que no existir coincidencias)
	
                    
        }
        
       
           function logout() {
       
        $this->session->sess_destroy();
      //  $this->session->set_flashdata("message",  popup_msg("You have logged out"));
         $this->load->view('v_login');
      //  redirect('/admin/login');    
    }
 
  
} //end class
