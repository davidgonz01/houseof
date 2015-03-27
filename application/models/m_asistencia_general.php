<?php

class m_asistencia_general extends CI_Model {
    
    
    
    public function getById( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id_alumno', $id )->limit( 1 )->get( 'alumnos' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    
    public function getAll() {
        //get all records from users table
         $vista = 'SELECT alumnos.id_alumno,alumnos.nombre,alumnos.apellido FROM alumnos ';
        $query = $this->db->query($vista);
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
   
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'alumnos', array( 'id_alumno' => $id ) );
    } //end delete
    
    
     public function actualizardatos( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id ); 
           try{
                    $consulta = "UPDATE asistencia_general SET cantidad_clases = asistencia_general.cant_febrero + asistencia_general.cant_marzo + asistencia_general.cant_abril + asistencia_general.cant_mayo + asistencia_general.cant_junio + asistencia_general.cant_julio + asistencia_general.cant_agosto + asistencia_general.cant_septiembre + asistencia_general.cant_octubre + asistencia_general.cant_noviembre + asistencia_general.cant_diciembre WHERE id_asistencia_general = '$id' LIMIT 1";
       
                      $cuenta = $this->db->query($consulta);
        
                      
           }catch ( Exception $e )
            {
            $this->load->view('welcome_message');
              // show_error($e);
            }
    } //
    
} //end class


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

