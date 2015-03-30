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
    
    
     public function actualizardatos_completo() {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id ); 
           try{
                    $consulta = "update asistencia_general ag, asistencias_ideal ai set ag.cantidad_ausencia =(ai.cantidad_clases - ag.cantidad_clases) , ag.porcentaje_asistencia = ( ag.cantidad_clases * 100 / ai.cantidad_clases ) where ag.id_clase = ai.id_clase";
                    
                      $cuenta = $this->db->query($consulta);
                      
                  
        
                      
           }catch ( Exception $e )
            {
            $this->load->view('welcome_message');
              // show_error($e);
            }
    } 
    
    public function actualizardatos_ideal() {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        
           try{
                    $consulta = "UPDATE asistencias_ideal SET cantidad_clases = asistencias_ideal.cant_febrero + asistencias_ideal.cant_marzo + asistencias_ideal.cant_abril + asistencias_ideal.cant_mayo + asistencias_ideal.cant_junio + asistencias_ideal.cant_julio + asistencias_ideal.cant_agosto + asistencias_ideal.cant_septiembre + asistencias_ideal.cant_octubre + asistencias_ideal.cant_noviembre + asistencias_ideal.cant_diciembre WHERE id_asistencia_ideal = id_asistencia_ideal";
       
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

