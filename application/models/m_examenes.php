<?php

class m_examenes extends CI_Model {
    
    
    
    public function getById( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id_alumno', $id )->limit( 1 )->get( 'alumnos' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    
    public function modificacion1() {
        //get all records from users table
        
                try{
                                $vista = 'update examenes_global eg, examenes_ideal ei, examenes ex 
                       set
                       eg.r_w = ( ex.r_w * 100 / ei.r_w ) ,
                       eg.listening = ( ex.listening  * 100 / ei.listening ),
                       eg.speaking =  ( ex.speaking * 100 / ei.speaking ),
                       eg.class_part = ( ex.class_part * 100 / ei.class_part ),
                       eg.global_logro = ( (  ( ex.r_w * 100 / ei.r_w ) + ( ex.listening  * 100 / ei.listening ) +
                                              ( ex.speaking * 100 / ei.speaking ) +  ( ex.class_part * 100 / ei.class_part )  
                                           ) / 4)


                       where eg.id_clase = ei.id_clase and
                       eg.id_clase = ex.id_clase and
                       eg.id_alumno = ex.id_alumno AND
                       ex.id_etapa = 1';
        $query = $this->db->query($vista);
        
         $query = $this->db->query($vista);
        
        
                    
           }catch ( Exception $e )
            {
            $this->load->view('welcome_message');
              // show_error($e);
            }
       
    } //end getAll
     public function modificacion2() {
        try{
                                $vista =  'update examenes_global eg, examenes_ideal ei, examenes ex 
                       set
                       eg.r_w =  (eg.r_w +( ex.r_w * 100 / ei.r_w ))/2,
                       eg.listening =  (eg.listening + ( ex.listening  * 100 / ei.listening ))/2,
                       eg.speaking =  (eg.speaking +( ex.speaking * 100 / ei.speaking )) /2,
                       eg.class_part = (eg.class_part + ( ex.class_part * 100 / ei.class_part ))/2,
                       eg.global_logro = (eg.global_logro + ( (  ( ex.r_w * 100 / ei.r_w ) + ( ex.listening  * 100 / ei.listening ) +
                                              ( ex.speaking * 100 / ei.speaking ) +  ( ex.class_part * 100 / ei.class_part )  
                                           ) / 4))/2


                       where eg.id_clase = ei.id_clase and
                       eg.id_clase = ex.id_clase and
                       eg.id_alumno = ex.id_alumno AND
                       ex.id_etapa = 2';
        $query = $this->db->query($vista);
        
        
                    
           }catch ( Exception $e )
            {
            $this->load->view('welcome_message');
              // show_error($e);
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
    
    
    public function crear_examen_global($id_alumno, $id_clase)
    {
         try{
                 
       
            $data = array(
             'id_alumno' => $id_alumno,
             'id_clase' => $id_clase,
              'r_w ' => 0,
              'listening' => 0,
              'speaking ' => 0,
              'class_part'=> 0,
              'global_logro' => 0,
              'id_nota' => 1,
              'id_etapa' => 3
            );
            $this->db->insert('examenes_global', $data);
           
           }catch ( Exception $e )
            {
            $this->load->view('welcome_message');
              // show_error($e);
            }
        
    }
    
    
    
} //end class


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


