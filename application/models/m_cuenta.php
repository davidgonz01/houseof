<?php

class m_cuenta extends CI_Model {
    
    
    
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
                       ex.id_etapa = 1 ';
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
                    $consulta = "update cuenta cu, cuenta_detalle_personalizado cp set cu.saldo_cuenta =(cu.saldo_cuenta + (cp.debito - cp.credito)), cu.debito_cuenta =  cu.debito_cuenta + cp.debito, cu.credito_cuenta = cu.credito_cuenta + cp.credito, cp.saldo = (cu.saldo_cuenta + (cp.debito - cp.credito)) where cp.id_cuenta = cu.id_cuenta and cp.id_cuenta =  = '$id' LIMIT 1";
       
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
    
    
     public function actualizardatos_cuenta($id) {
         /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id ); 
           try{
                    $consulta = "update cuenta cu, cuenta_detalle_personalizado cp 
set cu.saldo_cuenta =(cu.saldo_cuenta + (cp.debito - cp.credito)), 
cu.debito_cuenta =  cu.debito_cuenta + cp.debito, 
cu.credito_cuenta = cu.credito_cuenta + cp.credito,
cp.saldo = (cu.saldo_cuenta + (cp.debito - cp.credito)) 
where cp.id_cuenta = cu.id_cuenta and cp.id_cuenta_detalle_personalizado = '$id' ";
       
                      $cuenta = $this->db->query($consulta);
                      
                  
        
                      
           }catch ( Exception $e )
            {
            $this->load->view('welcome_message');
              // show_error($e);
            }
    } //
    
    
     public function actualizardatos_cuenta_regular($id) {
         /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id ); 
           try{
                    $consulta = "update cuenta cu, cuenta_detalle cp 
set cu.saldo_cuenta =(cu.saldo_cuenta + (cp.debito_detalle - cp.credito_detalle)), 
cu.debito_cuenta =  cu.debito_cuenta + cp.debito_detalle, 
cu.credito_cuenta = cu.credito_cuenta + cp.credito_detalle,
cp.saldo_detalle = (cu.saldo_cuenta + (cp.debito_detalle - cp.credito_detalle)) 
where cp.id_cuenta = cu.id_cuenta and cp.id_cuenta_detalle = '$id' ";
       
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


